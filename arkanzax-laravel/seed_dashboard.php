<?php

use App\Services\ApiService;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$apiService = app(ApiService::class);

echo "Starting seeding process...\n";

function safePost($apiService, $endpoint, $data) {
    echo "POSTING TO $endpoint...\n";
    $response = $apiService->post($endpoint, $data);
    if (!$response || (isset($response['code']) && $response['code'] != 200 && $response['code'] != 201)) {
        echo "FAILED: " . json_encode($response) . "\n";
    } else {
        echo "SUCCESS: " . json_encode($response) . "\n";
    }
    return $response;
}

// 1. Create Portfolio Category for Brands
$catResponse = safePost($apiService, '/portfolio-categories', [
    'name_en' => 'Clients',
    'name_ar' => 'العملاء',
    'status' => 1
]);
$clientCatId = $catResponse['data']['id'] ?? $catResponse['id'] ?? null;

// 2. Create Item Type for Products
$typeResponse = safePost($apiService, '/item-types', [
    'title_en' => 'Software Products',
    'title_ar' => 'منتجات البرمجيات',
    'status' => 1
]);
$productTypeId = $typeResponse['data']['id'] ?? $typeResponse['id'] ?? null;

// 3. Add Brands (Portfolios)
$brands = [
    ['name' => 'TechCorp', 'image' => 'assets/clients/client-1.jpg'],
    ['name' => 'Novex', 'image' => 'assets/clients/client-2.jpg'],
    ['name' => 'Brandify', 'image' => 'assets/clients/client-3.jpg'],
    ['name' => 'Nexura', 'image' => 'assets/clients/client-4.jpg'],
];

foreach ($brands as $index => $brand) {
    safePost($apiService, '/portfolios', [
        'name_en' => $brand['name'],
        'name_ar' => $brand['name'],
        'short_description_en' => 'Client brand',
        'short_description_ar' => 'علامة تجارية للعميل',
        'description_en' => 'Client brand description',
        'description_ar' => 'وصف العلامة التجارية للعميل',
        'slug_en' => strtolower($brand['name']) . '-' . time(),
        'slug_ar' => strtolower($brand['name']) . '-' . time(),
        'category_id' => $clientCatId ?? 3, // Fallback if 1 fails
        'status' => 1,
        'order' => $index + 1
    ]);
}

// 4. Add Products (Items)
$products = [
    [
        'title_en' => 'Property Management',
        'title_ar' => 'إدارة العقارات',
        'short_description_en' => 'A comprehensive platform for real estate professionals to manage listings, tenants, and contracts with ease.',
        'short_description_ar' => 'منصة شاملة لمحترفي العقارات لإدارة القوائم والمستأجرين والعقود بسهولة.',
        'description_en' => 'Detailed property management solution.',
        'description_ar' => 'وصف تفصيلي لحل إدارة العقارات.',
        'price' => 'Contact Us'
    ],
    // ... other products
];

foreach ($products as $index => $product) {
    safePost($apiService, '/items', array_merge($product, [
        'slug_en' => str_replace(' ', '-', strtolower($product['title_en'])) . '-' . time(),
        'slug_ar' => str_replace(' ', '-', strtolower($product['title_en'])) . '-' . time(),
        'type_item_id' => $productTypeId ?? 2, // Fallback
        'status' => 1,
        'is_feature' => 1,
        'order' => $index + 1
    ]));
}

echo "Seeding completed!\n";
