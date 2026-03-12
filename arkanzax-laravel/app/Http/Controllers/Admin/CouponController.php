<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/coupons', [
            'page' => $request->get('page', 1)
        ]);

        $couponsData = $response;
        $coupons = $couponsData['data'] ?? [];

        return view('admin.coupons.index', compact('coupons', 'couponsData'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.coupons.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.coupons.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.coupons.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.coupons.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
