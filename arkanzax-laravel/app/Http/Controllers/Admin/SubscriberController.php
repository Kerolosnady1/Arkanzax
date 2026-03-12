<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/subscribers', [
            'page' => $request->get('page', 1)
        ]);

        $subscribersData = $response;
        $subscribers = $subscribersData['data'] ?? [];

        return view('admin.subscribers.index', compact('subscribers', 'subscribersData'));
    }

    public function destroy($id)
    {
        return redirect()->route('admin.subscribers.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
