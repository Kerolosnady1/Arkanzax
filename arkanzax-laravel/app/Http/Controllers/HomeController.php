<?php

namespace App\Http\Controllers;

use App\Services\ApiService;

class HomeController extends Controller
{
    public function index(ApiService $api)
    {
        // Sliders
        $slidersRes = $api->get('sliders') ?? [];
        $slidersAll = $slidersRes['data']['data'] ?? $slidersRes['data'] ?? [];
        $sliders = array_values(array_filter($slidersAll, fn($s) => ($s['status'] ?? 0) == 1));

        // Featured Blogs
        $featuredBlogsRes = $api->get('blogs-features', ['number' => 3]) ?? [];
        $featuredBlogsData = $featuredBlogsRes['data']['blogs']['data'] ?? $featuredBlogsRes['data'] ?? [];
        $featuredBlogs = array_values(array_filter($featuredBlogsData, fn($b) => ($b['status'] ?? 0) == 1));

        // Featured Items
        $featuredItemsRes = $api->get('items-features', ['number' => 6]) ?? [];
        $featuredItemsData = $featuredItemsRes['data']['items']['data'] ?? $featuredItemsRes['data'] ?? [];
        $featuredItems = array_values(array_filter($featuredItemsData, fn($i) => ($i['status'] ?? 0) == 1));

        // Testimonials
        $testimonialsRes = $api->get('testimonials') ?? [];
        $testimonialsAll = $testimonialsRes['data']['data'] ?? $testimonialsRes['data'] ?? [];
        $testimonialsList = array_values(array_filter($testimonialsAll, fn($t) => ($t['status'] ?? 0) == 1));

        // Recent Blogs
        $blogsRes = $api->get('blogs', ['number' => 3]);
        $blogsAll = $blogsRes['data']['blogs']['data'] ?? $blogsRes['data'] ?? [];
        $blogsList = array_values(array_filter($blogsAll, fn($b) => ($b['status'] ?? 0) == 1));

        // Pixel/Analytics Scripts
        $pixelsRes = $api->get('pixels-scripts') ?? [];
        $pixels = $pixelsRes['data']['data'] ?? $pixelsRes['data'] ?? [];

        // Portfolios (Brands)
        $portfoliosRes = $api->get('portfolios') ?? [];
        $allClients = $portfoliosRes['data']['portfolios'] ?? $portfoliosRes['data']['data'] ?? $portfoliosRes['data'] ?? [];
        $clients = array_values(array_filter($allClients, fn($c) => ($c['status'] ?? 0) == 1));

        // Unified Items Handling (Products, Services, Challenges)
        $itemsRes = $api->get('items') ?? [];
        $allItemsList = $itemsRes['data']['items']['data'] ?? $itemsRes['data'] ?? [];
        $activeItems = array_values(array_filter($allItemsList, fn($i) => ($i['status'] ?? 0) == 1));

        $productsList = array_values(array_filter($activeItems, fn($i) => ($i['order'] ?? 0) < 100));
        $servicesList = array_values(array_filter($activeItems, fn($i) => ($i['order'] ?? 0) >= 100 && ($i['order'] ?? 0) < 200));
        $challengesList = array_values(array_filter($activeItems, fn($i) => ($i['order'] ?? 0) >= 200));

        return view('home', compact(
            'sliders',
            'featuredBlogs',
            'featuredItems',
            'testimonialsList',
            'blogsList',
            'pixels',
            'clients',
            'productsList',
            'servicesList',
            'challengesList'
        ));
    }
}
