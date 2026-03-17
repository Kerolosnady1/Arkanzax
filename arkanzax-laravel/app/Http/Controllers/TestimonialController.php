<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(ApiService $api)
    {
        $res = $api->get('testimonials', []) ?? [];
        $allTestimonials = data_get($res, 'data.data') ?? data_get($res, 'data', []);
        if (!is_array($allTestimonials)) $allTestimonials = [];
        $testimonials = array_values(array_filter($allTestimonials, fn($t) => ($t['status'] ?? 0) == 1));
        return view('testimonials.index', compact('testimonials'));
    }

    public function store(ApiService $api, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'testimonial' => 'required|string|max:2000',
            'image' => 'nullable|image|max:2048',
        ]);

        $files = $request->hasFile('image') ? ['image' => $request->file('image')] : [];

        $result = $api->postMultipart('testimonials', [
            'name' => $request->name,
            'email' => $request->email,
            'testimonial' => $request->testimonial,
        ], $files);

        if ($result && ($result['code'] ?? 0) == 201) {
            return back()->with('success', 'Testimonial submitted successfully!');
        }

        return back()->with('error', 'Failed to submit testimonial.')->withInput();
    }
}
