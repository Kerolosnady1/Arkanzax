<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(ApiService $api, Request $request)
    {
        $search = $request->query('search', '');
        
        $typeRes = $api->get('item-types', []) ?? [];
        $itemTypesAll = data_get($typeRes, 'data.data') ?? data_get($typeRes, 'data', []);
        if (!is_array($itemTypesAll)) $itemTypesAll = [];
        $itemTypes = array_values(array_filter($itemTypesAll, fn($t) => ($t['status'] ?? 0) == 1));
        
        $itemsRes = $api->get('items', ['search' => $search]) ?? [];
        $allItems = data_get($itemsRes, 'data.items.data') ?? data_get($itemsRes, 'data', []);
        if (!is_array($allItems)) $allItems = [];
        $items = array_values(array_filter($allItems, fn($i) => ($i['status'] ?? 0) == 1));

        return view('items.index', compact('itemTypes', 'items', 'search'));
    }

    public function show(ApiService $api, string $slug)
    {
        $res = $api->get("item/{$slug}", []);
        $item = $res['data'] ?? $res;
        
        if (!$item)
            abort(404);

        return view('items.show', compact('item'));
    }
}
