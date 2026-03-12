<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(ApiService $api, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        $result = $api->post('contact-us', [
            'extra_key' => '',
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        if ($result && ($result['code'] ?? 0) == 201) {
            return back()->with('success', $result['message'] ?? 'Message sent successfully!');
        }

        return back()->with('error', $result['message'] ?? 'Failed to send message.')->withInput();
    }

    public function subscribe(ApiService $api, Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $result = $api->post('subscribes', [
            'extra_key' => '',
            'email' => $request->email,
        ]);

        if ($result && ($result['code'] ?? 0) == 201) {
            return back()->with('subscribe_success', $result['message'] ?? 'Subscribed successfully!');
        }

        return back()->with('subscribe_error', $result['message'] ?? 'Subscription failed.');
    }
}
