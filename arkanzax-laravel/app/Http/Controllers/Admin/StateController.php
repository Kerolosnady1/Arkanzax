<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class StateController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/states', [
            'page' => $request->get('page', 1)
        ]);

        $statesData = $response;
        $states = $statesData['data'] ?? [];

        return view('admin.states.index', compact('states', 'statesData'));
    }

    public function create()
    {
        $response = $this->apiService->get('/countries');
        $countries = $response['data'] ?? $response ?? [];
        return view('admin.states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.states.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        $response = $this->apiService->get('/countries');
        $countries = $response['data'] ?? $response ?? [];
        return view('admin.states.edit', compact('id', 'countries'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.states.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.states.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
