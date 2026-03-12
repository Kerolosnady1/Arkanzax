<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class LeadMagnetController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/lead-magnets', [
            'page' => $request->get('page', 1)
        ]);

        $magnetsData = $response;
        $magnets = $magnetsData['data'] ?? [];

        return view('admin.lead-magnets.index', compact('magnets', 'magnetsData'));
    }

    public function create()
    {
        $response = $this->apiService->get('/lead-magnet-types');
        $types = $response['data'] ?? $response ?? [];
        return view('admin.lead-magnets.create', compact('types'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.lead-magnets.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        $response = $this->apiService->get('/lead-magnet-types');
        $types = $response['data'] ?? $response ?? [];
        return view('admin.lead-magnets.edit', compact('id', 'types'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.lead-magnets.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.lead-magnets.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
