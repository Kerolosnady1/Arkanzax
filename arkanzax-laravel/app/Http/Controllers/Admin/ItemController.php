<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/items', [
            'page' => $request->get('page', 1)
        ]);

        // Items structure: { items_count: ..., items: { current_page: ..., data: [...] } }
        $itemsData = $response['items'] ?? [];
        $items = $itemsData['data'] ?? [];

        return view('admin.items.index', compact('items', 'itemsData'));
    }

    public function create()
    {
        $response = $this->apiService->get('/item-types');
        $types = $response['data'] ?? $response ?? [];
        return view('admin.items.create', compact('types'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.items.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        $response = $this->apiService->get('/item-types');
        $types = $response['data'] ?? $response ?? [];
        return view('admin.items.edit', compact('id', 'types'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.items.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.items.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
