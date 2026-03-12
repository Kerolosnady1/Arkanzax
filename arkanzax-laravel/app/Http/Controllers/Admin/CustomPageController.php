<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/custom-pages', [
            'page' => $request->get('page', 1)
        ]);

        $pagesData = $response;
        $pages = $pagesData['data'] ?? [];

        return view('admin.custom-pages.index', compact('pages', 'pagesData'));
    }

    public function create()
    {
        return view('admin.custom-pages.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.custom-pages.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.custom-pages.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.custom-pages.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.custom-pages.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
