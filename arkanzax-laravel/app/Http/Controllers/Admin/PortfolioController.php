<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/portfolios', [
            'page' => $request->get('page', 1)
        ]);

        // Portfolios structure usually: { data: { current_page: ..., data: [...] } }
        // Or sometimes unwrapped
        $portfoliosData = $response;
        $portfolios = $portfoliosData['data'] ?? [];

        return view('admin.portfolios.index', compact('portfolios', 'portfoliosData'));
    }

    public function create()
    {
        $response = $this->apiService->get('/portfolio-categories');
        $categories = $response['data'] ?? $response ?? [];
        return view('admin.portfolios.create', compact('categories'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.portfolios.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        $response = $this->apiService->get('/portfolio-categories');
        $categories = $response['data'] ?? $response ?? [];
        return view('admin.portfolios.edit', compact('id', 'categories'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.portfolios.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.portfolios.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
