<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/sliders');

        // Sliders structure usually unwrapped data array or { data: [...] }
        $sliders = $response['data'] ?? $response ?? [];

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.sliders.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.sliders.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.sliders.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.sliders.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
