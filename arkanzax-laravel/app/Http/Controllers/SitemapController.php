<?php

namespace App\Http\Controllers;

use App\Services\ApiService;

class SitemapController extends Controller
{
    public function index(ApiService $api)
    {
        $sitemap = $api->get('generate-sitemap', [], 0);

        // The API returns XML directly, pass it through
        return response($sitemap ?? '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>')
            ->header('Content-Type', 'text/xml');
    }
}
