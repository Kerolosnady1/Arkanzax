<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $response = $this->apiService->get('/members', [
            'page' => $request->get('page', 1)
        ]);

        $membersData = $response;
        $members = $membersData['data'] ?? [];

        return view('admin.members.index', compact('members', 'membersData'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.members.index')->with('info', 'Create operation will be linked to API soon.');
    }

    public function edit($id)
    {
        return view('admin.members.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.members.index')->with('info', 'Update operation will be linked to API soon.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.members.index')->with('info', 'Delete operation will be linked to API soon.');
    }
}
