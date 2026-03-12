<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class OfferTypeController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/offer-types', [
            'page' => $request->get('page', 1)
        ]);

        $typesData = $response;
        $types = $typesData['data'] ?? [];

        return view('admin.type_offers.index', compact('types', 'typesData'));
    }

    public function create()
    {
        return view('admin.type_offers.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.type-offers.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.type_offers.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.type-offers.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.type-offers.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
