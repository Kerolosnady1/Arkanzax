<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/leads', [
            'page' => $request->get('page', 1)
        ]);

        $leadsData = $response;
        $leads = $leadsData['data'] ?? [];

        return view('admin.leads.index', compact('leads', 'leadsData'));
    }

    public function show($id)
    {
        $response = $this->apiService->get("/leads/{$id}");
        $lead = $response['data'] ?? $response ?? [];
        return view('admin.leads.show', compact('lead'));
    }

    public function destroy($id)
    {
        return redirect()->route('admin.leads.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
