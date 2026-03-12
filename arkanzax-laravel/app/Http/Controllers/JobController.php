<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(ApiService $api, Request $request)
    {
        $search = $request->query('search', '');
        $careers = $api->get('careers', ['search' => $search], 60);

        return view('jobs.index', compact('careers', 'search'));
    }

    public function show(ApiService $api, string $slug)
    {
        $career = $api->get("career/{$slug}", [], 60);
        if (!$career)
            abort(404);

        return view('jobs.show', compact('career'));
    }

    public function apply(ApiService $api, Request $request)
    {
        $request->validate([
            'career_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $result = $api->postMultipart('apply-jobs', [
            'career_id' => $request->career_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ], ['cv' => $request->file('cv')]);

        if ($result && ($result['code'] ?? 0) == 201) {
            return back()->with('success', $result['message'] ?? 'Application submitted successfully.');
        }

        return back()->with('error', $result['message'] ?? 'Failed to submit application.')->withInput();
    }
}
