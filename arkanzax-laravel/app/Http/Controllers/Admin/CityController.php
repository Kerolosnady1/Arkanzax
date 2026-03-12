<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/cities', [
            'page' => $request->get('page', 1)
        ]);

        $citiesData = $response;
        $cities = $citiesData['data'] ?? [];

        return view('admin.cities.index', compact('cities', 'citiesData'));
    }

    public function create()
    {
        $response = $this->apiService->get('/states');
        $states = $response['data'] ?? $response ?? [];
        return view('admin.cities.create', compact('states'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.cities.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        $response = $this->apiService->get('/states');
        $states = $response['data'] ?? $response ?? [];
        return view('admin.cities.edit', compact('id', 'states'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.cities.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.cities.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
