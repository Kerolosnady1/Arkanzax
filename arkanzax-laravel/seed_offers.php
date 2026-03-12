<?php
use App\Services\ApiService;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$apiService = app(ApiService::class);

echo "Seeding Offers (Services)...\n";

function safePost($apiService, $endpoint, $data) {
    echo "POSTING TO $endpoint...\n";
    $response = $apiService->post($endpoint, $data);
    echo "RESPONSE: " . json_encode($response) . "\n";
    return $response;
}

$services = [
    [
        'title_en' => 'Web Development & Technical SEO',
        'title_ar' => 'تطوير الويب وتحسين محركات البحث التقني',
        'short_description_en' => 'Build high-performance, scalable web applications using modern frameworks and optimized for speed, security, and search visibility.',
        'short_description_ar' => 'بناء تطبيقات ويب عالية الأداء وقابلة للتوسع باستخدام أطر عمل حديثة ومحسنة للسرعة والأمان وظهور البحث.',
        'description_en' => 'Detailed Web Dev description.',
        'description_ar' => 'وصف تفصيلي لتطوير الويب.',
        'icon' => 'fa-code',
        'slug_en' => 'web-dev-seo',
        'slug_ar' => 'web-dev-seo-ar',
        'status' => 1
    ],
    [
        'title_en' => 'Custom Software & Cloud',
        'title_ar' => 'البرمجيات المخصصة والسحابية',
        'short_description_en' => 'Tailor-made software solutions and robust cloud infrastructure to streamline your business operations and ensure 99.9% uptime.',
        'short_description_ar' => 'حلول برمجية مخصصة وبنية تحتية سحابية قوية لتبسيط عملياتك التجارية وضمان وقت تشغيل بنسبة 99.9٪.',
        'description_en' => 'Detailed Custom Software description.',
        'description_ar' => 'وصف تفصيلي للبرمجيات المخصصة.',
        'icon' => 'fa-server',
        'slug_en' => 'custom-software-cloud',
        'slug_ar' => 'custom-software-cloud-ar',
        'status' => 1
    ],
    [
        'title_en' => 'Mobile App Development',
        'title_ar' => 'تطوير تطبيقات الجوال',
        'short_description_en' => 'Create stunning iOS and Android applications with native-like performance and user-centric features that keep your users coming back.',
        'short_description_ar' => 'إنشاء تطبيقات iOS و Android مذهلة بأداء يشبه التطبيقات الأصلية وميزات تركز على المستخدم تجعل مستخدميك يعودون مرة أخرى.',
        'description_en' => 'Detailed Mobile App description.',
        'description_ar' => 'وصف تفصيلي لتطوير تطبيقات الجوال.',
        'icon' => 'fa-mobile-alt',
        'slug_en' => 'mobile-app-dev',
        'slug_ar' => 'mobile-app-dev-ar',
        'status' => 1
    ],
    [
        'title_en' => 'API & System Integration',
        'title_ar' => 'تكامل الأنظمة وواجهة برمجة التطبيقات',
        'short_description_en' => 'Connect your disparate systems and automate workflows with seamless API integrations that save time and eliminate data silos.',
        'short_description_ar' => 'قم بتوصيل أنظمتك المتباينة وأتمتة سير العمل من خلال تكاملات واجهة برمجة التطبيقات السلسة التي توفر الوقت وتزيل صوامع البيانات.',
        'description_en' => 'Detailed API Integration description.',
        'description_ar' => 'وصف تفصيلي لتكامل الأنظمة.',
        'icon' => 'fa-sync-alt',
        'slug_en' => 'api-integration',
        'slug_ar' => 'api-integration-ar',
        'status' => 1
    ],
    [
        'title_en' => 'AI & Data Engineering',
        'title_ar' => 'الذكاء الاصطناعي وهندسة البيانات',
        'short_description_en' => 'Leverage machine learning and advanced data pipelines to turn your raw data into predictive insights and automated intelligence.',
        'short_description_ar' => 'استفد من التعلم الآلي وخطوط أنابيب البيانات المتقدمة لتحويل بياناتك الخام إلى رؤى تنبؤية وذكاء مبرمج.',
        'description_en' => 'Detailed AI/Data description.',
        'description_ar' => 'وصف تفصيلي للذكاء الاصطناعي.',
        'icon' => 'fa-brain',
        'slug_en' => 'ai-data-engineering',
        'slug_ar' => 'ai-data-engineering-ar',
        'status' => 1
    ],
    [
        'title_en' => 'UI/UX Design & Brand identity',
        'title_ar' => 'تصميم واجهة المستخدم وهوية العلامة التجارية',
        'short_description_en' => 'Design digital products that are not only beautiful but also intuitive, accessible, and perfectly aligned with your users\' needs.',
        'short_description_ar' => 'تصميم منتجات رقمية ليست جميلة فحسب، بل بديهية وسهلة الوصول ومتوافقة تماماً مع احتياجات مستخدميك.',
        'description_en' => 'Detailed UI/UX description.',
        'description_ar' => 'وصف تفصيلي لتصميم الواجهة.',
        'icon' => 'fa-vector-square',
        'slug_en' => 'ui-ux-design',
        'slug_ar' => 'ui-ux-design-ar',
        'status' => 1
    ]
];

foreach ($services as $service) {
    safePost($apiService, '/offers', $service);
}

echo "Seeding completed!\n";
