<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(ApiService $api, Request $request)
    {
        $search = $request->query('search', '');
        
        $catRes = $api->get('portfolio-categories', []);
        $categories = $catRes['data']['data'] ?? $catRes['data'] ?? [];

        $portRes = $api->get('portfolios', ['search' => $search]);
        $portfolios = $portRes['data']['data'] ?? $portRes['data'] ?? [];

        return view('portfolios.index', compact('categories', 'portfolios', 'search'));
    }

    public function show(ApiService $api, string $slug)
    {
        $res = $api->get("portfolio/{$slug}", []);
        $portfolio = $res['data'] ?? $res;
        
        if (!$portfolio)
            abort(404);

        return view('portfolios.show', compact('portfolio'));
    }
}
