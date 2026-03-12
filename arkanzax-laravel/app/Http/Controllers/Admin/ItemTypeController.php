<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/item-types', [
            'page' => $request->get('page', 1)
        ]);

        $typesData = $response;
        $types = $typesData['data'] ?? [];

        return view('admin.item_types.index', compact('types', 'typesData'));
    }

    public function create()
    {
        return view('admin.item_types.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.item-types.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.item_types.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.item-types.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.item-types.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
