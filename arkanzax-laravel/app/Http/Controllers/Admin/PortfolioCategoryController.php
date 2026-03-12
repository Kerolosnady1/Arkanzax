<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/portfolio-categories', [
            'page' => $request->get('page', 1)
        ]);

        $categoriesData = $response;
        $categories = $categoriesData['data'] ?? [];

        return view('admin.portfolio-categories.index', compact('categories', 'categoriesData'));
    }

    public function create()
    {
        return view('admin.portfolio-categories.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.portfolio-categories.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.portfolio-categories.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.portfolio-categories.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.portfolio-categories.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
