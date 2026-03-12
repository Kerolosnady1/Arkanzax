<?php
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$api = app(ApiService::class);
$baseUrl = rtrim(config('api.base_url'), '/');
$headers = [
    'X-API-KEY' => config('api.key'),
    'X-Tenant-ID' => config('api.tenant_id'),
    'Accept' => 'application/json',
];

echo "Listing Portfolio Categories...\n";
$res = $api->get('portfolio-categories');
echo json_encode($res, JSON_PRETTY_PRINT);
