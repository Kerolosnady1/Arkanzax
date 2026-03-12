<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(ApiService $api)
    {
        $paymentMethods = $api->get('payment-methods', [], 600) ?? [];
        $countries = $api->get('countries', [], 600) ?? [];

        return view('checkout.index', compact('paymentMethods', 'countries'));
    }

    public function getStates(ApiService $api, int $countryId)
    {
        $states = $api->get("states/{$countryId}", [], 600) ?? [];
        return response()->json($states);
    }

    public function getCities(ApiService $api, int $stateId)
    {
        $cities = $api->get("cities/{$stateId}", [], 600) ?? [];
        return response()->json($cities);
    }

    public function checkCoupon(ApiService $api, Request $request)
    {
        $result = $api->post('check-coupon', [
            'items' => $request->items,
            'coupon_code' => $request->coupon_code,
        ]);

        return response()->json($result);
    }

    public function process(ApiService $api, Request $request)
    {
        $result = $api->post('checkout', $request->all());
        return response()->json($result);
    }

    public function uploadReceipt(ApiService $api, Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'transaction_token' => 'required|string',
            'receipt' => 'required|file|max:5120',
        ]);

        $result = $api->postMultipart('upload-receipt', [
            'order_id' => $request->order_id,
            'transaction_token' => $request->transaction_token,
        ], ['receipt' => $request->file('receipt')]);

        return response()->json($result);
    }

    public function orderDetails(ApiService $api, int $id)
    {
        $order = $api->get("order/{$id}", [], 0);
        if (!$order)
            abort(404);

        return view('checkout.order', compact('order'));
    }
}
