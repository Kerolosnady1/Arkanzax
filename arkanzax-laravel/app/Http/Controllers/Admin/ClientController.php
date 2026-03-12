<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/clients', [
            'page' => $request->get('page', 1)
        ]);

        $clientsData = $response;
        $clients = $clientsData['data'] ?? [];

        return view('admin.clients.index', compact('clients', 'clientsData'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.clients.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.clients.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.clients.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.clients.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
