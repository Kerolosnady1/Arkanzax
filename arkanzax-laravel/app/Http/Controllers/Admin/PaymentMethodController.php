<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/payment-methods', [
            'page' => $request->get('page', 1)
        ]);

        $methodsData = $response;
        $methods = $methodsData['data'] ?? [];

        return view('admin.payment-methods.index', compact('methods', 'methodsData'));
    }

    public function create()
    {
        return view('admin.payment-methods.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.payment-methods.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.payment-methods.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.payment-methods.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.payment-methods.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
