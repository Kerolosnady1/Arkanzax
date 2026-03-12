<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/jobs', [
            'page' => $request->get('page', 1)
        ]);

        $jobsData = $response;
        $jobs = $jobsData['data'] ?? [];

        return view('admin.jobs.index', compact('jobs', 'jobsData'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.jobs.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.jobs.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.jobs.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.jobs.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
