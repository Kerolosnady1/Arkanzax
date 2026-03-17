<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(ApiService $api, Request $request)
    {
        $search = $request->query('search', '');
        
        $catRes = $api->get('portfolio-categories', []) ?? [];
        $categories = data_get($catRes, 'data.data') ?? data_get($catRes, 'data', []);
        if (!is_array($categories)) $categories = [];

        $portRes = $api->get('portfolios', ['search' => $search]) ?? [];
        $portfolios = data_get($portRes, 'data.portfolios.data') ?? data_get($portRes, 'data.data') ?? data_get($portRes, 'data', []);
        if (!is_array($portfolios)) $portfolios = [];

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
