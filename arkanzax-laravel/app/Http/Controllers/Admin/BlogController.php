<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/blogs', [
            'page' => $request->get('page', 1)
        ]);

        // ApiService already unwraps 'data' top level
        // Blogs response structure: { blogs_count: ..., blogs: { current_page: ..., data: [...] } }
        $blogsData = $response['blogs'] ?? [];
        $blogs = $blogsData['data'] ?? [];

        return view('admin.blogs.index', compact('blogs', 'blogsData'));
    }

    public function create()
    {
        $response = $this->apiService->get('/categories');
        $categories = $response['data'] ?? $response ?? [];
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.blogs.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        $response = $this->apiService->get('/categories');
        $categories = $response['data'] ?? $response ?? [];
        return view('admin.blogs.edit', compact('id', 'categories'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.blogs.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.blogs.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
