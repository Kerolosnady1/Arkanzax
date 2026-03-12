<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/countries', [
            'page' => $request->get('page', 1)
        ]);

        $countriesData = $response;
        $countries = $countriesData['data'] ?? [];

        return view('admin.countries.index', compact('countries', 'countriesData'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.countries.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.countries.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.countries.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.countries.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
