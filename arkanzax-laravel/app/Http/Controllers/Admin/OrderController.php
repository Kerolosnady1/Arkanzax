<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/orders', [
            'page' => $request->get('page', 1)
        ]);

        $ordersData = $response;
        $orders = $ordersData['data'] ?? [];

        return view('admin.orders.index', compact('orders', 'ordersData'));
    }

    public function show($id)
    {
        $response = $this->apiService->get("/orders/{$id}");
        $order = $response['data'] ?? $response ?? [];
        return view('admin.orders.show', compact('order'));
    }

    public function destroy($id)
    {
        return redirect()->route('admin.orders.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
