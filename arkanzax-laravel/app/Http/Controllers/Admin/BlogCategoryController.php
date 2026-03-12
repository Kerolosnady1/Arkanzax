<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/categories', [
            'page' => $request->get('page', 1)
        ]);

        // ApiService already unwraps 'data' if it's there, 
        // but if 'data' was { current_page: ..., data: [...] }, then $response is that object
        $categoriesData = $response;
        $categories = $categoriesData['data'] ?? [];

        return view('admin.blog-categories.index', compact('categories', 'categoriesData'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        // For now, redirect with info that write operations are not fully linked yet
        // In a real scenario, we'd call $this->apiService->post('/categories', $request->all())
        return redirect()->route('admin.blog-categories.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        // In a real scenario, we'd fetch the category by ID
        return view('admin.blog-categories.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.blog-categories.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.blog-categories.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
