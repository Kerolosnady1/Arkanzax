<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/offers', [
            'page' => $request->get('page', 1)
        ]);

        // Offers structure: { offers_count: ..., offers: { current_page: ..., data: [...] } }
        $offersData = $response['offers'] ?? [];
        $offers = $offersData['data'] ?? [];

        return view('admin.offers.index', compact('offers', 'offersData'));
    }

    public function create()
    {
        $response = $this->apiService->get('/offer-types');
        $types = $response['data'] ?? $response ?? [];
        return view('admin.offers.create', compact('types'));
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.offers.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        $response = $this->apiService->get('/offer-types');
        $types = $response['data'] ?? $response ?? [];
        return view('admin.offers.edit', compact('id', 'types'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.offers.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.offers.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
