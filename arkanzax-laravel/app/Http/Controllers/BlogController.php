<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(ApiService $api, Request $request)
    {
        $search = $request->query('search', '');
        
        $catRes = $api->get('categories', []);
        $categoriesAll = $catRes['data']['data'] ?? $catRes['data'] ?? [];
        $categories = array_values(array_filter($categoriesAll, fn($c) => ($c['status'] ?? 0) == 1));
        
        $blogsRes = $api->get('blogs', ['search' => $search]);
        // Standard mapping for blogs: $res['data']['blogs']['data'] or $res['data']
        $allBlogs = $blogsRes['data']['blogs']['data'] ?? $blogsRes['data'] ?? [];
        $blogs = array_values(array_filter($allBlogs, fn($b) => ($b['status'] ?? 0) == 1));

        return view('blogs.index', compact('categories', 'blogs', 'search'));
    }

    public function show(ApiService $api, string $slug)
    {
        $res = $api->get("blog/{$slug}", []);
        $blog = $res['data'] ?? $res;
        
        if (!$blog)
            abort(404);

        return view('blogs.show', compact('blog'));
    }

    public function byCategory(ApiService $api, int $id)
    {
        $res = $api->get("category-blogs/{$id}", []);
        $data = $res['data'] ?? $res;
        
        if (!$data)
            abort(404);

        return view('blogs.category', compact('data'));
    }
}
