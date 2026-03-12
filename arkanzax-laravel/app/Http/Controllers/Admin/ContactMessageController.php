<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/contact-messages', [
            'page' => $request->get('page', 1)
        ]);

        $messagesData = $response;
        $messages = $messagesData['data'] ?? [];

        return view('admin.contact-messages.index', compact('messages', 'messagesData'));
    }

    public function show($id)
    {
        $response = $this->apiService->get("/contact-messages/{$id}");
        $message = $response['data'] ?? $response ?? [];
        return view('admin.contact-messages.show', compact('message'));
    }

    public function destroy($id)
    {
        return redirect()->route('admin.contact-messages.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
