<?php

namespace App\Http\Controllers;

use App\Services\ApiService;

class HomeController extends Controller
{
    public function index(ApiService $api)
    {
        // Sliders — API returns data: [] when empty, or data.data when populated
        $slidersRes = $api->get('sliders') ?? [];
        $slidersAll = data_get($slidersRes, 'data.data') ?? data_get($slidersRes, 'data', []);
        if (!is_array($slidersAll)) $slidersAll = [];
        $sliders = array_values(array_filter($slidersAll, fn($s) => ($s['status'] ?? 0) == 1));

        // Testimonials — structure: data.data (pagination)
        $testimonialsRes = $api->get('testimonials') ?? [];
        $testimonialsAll = data_get($testimonialsRes, 'data.data', []);
        $testimonialsList = array_values(array_filter($testimonialsAll, fn($t) => ($t['status'] ?? 0) == 1));

        // Recent Blogs — structure: data.blogs.data
        $blogsRes = $api->get('blogs', ['number' => 3]) ?? [];
        $blogsAll = data_get($blogsRes, 'data.blogs.data', []);
        $blogsList = array_values(array_filter($blogsAll, fn($b) => ($b['status'] ?? 0) == 1));

        // Featured Blogs — structure: data.blogs.data (same endpoint, different number)
        $featuredBlogsRes = $api->get('blogs-features', ['number' => 3]) ?? [];
        $featuredBlogsData = data_get($featuredBlogsRes, 'data.blogs.data') ?? 
                             (isset($featuredBlogsRes['data'][0]) ? $featuredBlogsRes['data'] : []);
        if (!is_array($featuredBlogsData)) $featuredBlogsData = [];
        $featuredBlogs = array_values(array_filter($featuredBlogsData, fn($b) => ($b['status'] ?? 0) == 1));

        // Featured Items — structure: flat array at data level (data.[0,1,2])
        $featuredItemsRes = $api->get('items-features', ['number' => 6]) ?? [];
        $featuredItemsData = data_get($featuredItemsRes, 'data.0') !== null 
            ? ($featuredItemsRes['data'] ?? [])
            : data_get($featuredItemsRes, 'data.items.data', []);
        $featuredItems = array_values(array_filter($featuredItemsData, fn($i) => ($i['status'] ?? 0) == 1));

        // Pixel/Analytics Scripts
        $pixelsRes = $api->get('pixels-scripts') ?? [];
        $pixels = data_get($pixelsRes, 'data.data') ?? data_get($pixelsRes, 'data', []);
        if (!is_array($pixels)) $pixels = [];

        // Portfolios (Brands) — structure: data.portfolios.data (paginated) OR data.portfolios (flat array)
        $portfoliosRes = $api->get('portfolios') ?? [];
        $portfoliosNode = data_get($portfoliosRes, 'data.portfolios', []);
        $allClients = data_get($portfoliosNode, 'data') ?? (isset($portfoliosNode[0]) ? $portfoliosNode : []);
        if (!is_array($allClients)) $allClients = [];
        $clients = array_values(array_filter($allClients, fn($c) => ($c['status'] ?? 0) == 1));

        // Unified Items Handling (Products, Services, Challenges) — structure: data.items.data
        $itemsRes = $api->get('items') ?? [];
        $allItemsList = data_get($itemsRes, 'data.items.data', []);
        $activeItems = array_values(array_filter($allItemsList, fn($i) => ($i['status'] ?? 0) == 1));

        // Separate by item_type name — use type name if available, else fallback to order
        $productsList   = array_values(array_filter($activeItems, fn($i) => strtolower(data_get($i, 'item_type.name_en', '')) === 'products' || (isset($i['order']) && (int)$i['order'] < 100)));
        $servicesList   = array_values(array_filter($activeItems, fn($i) => strtolower(data_get($i, 'item_type.name_en', '')) === 'services' || (isset($i['order']) && (int)$i['order'] >= 100 && (int)$i['order'] < 200)));
        $challengesList = array_values(array_filter($activeItems, fn($i) => strtolower(data_get($i, 'item_type.name_en', '')) === 'challenges' || (isset($i['order']) && (int)$i['order'] >= 200)));

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
