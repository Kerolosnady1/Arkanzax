<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/testimonials', [
            'page' => $request->get('page', 1)
        ]);

        $testimonialsData = $response;
        $testimonials = $testimonialsData['data'] ?? [];

        return view('admin.testimonials.index', compact('testimonials', 'testimonialsData'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.testimonials.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.testimonials.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.testimonials.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.testimonials.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
