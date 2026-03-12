<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(ApiService $api, Request $request)
    {
        $search = $request->query('search', '');
        
        $typeRes = $api->get('offer-types', []);
        $offerTypes = $typeRes['data']['data'] ?? $typeRes['data'] ?? [];

        $offersRes = $api->get('offers', ['search' => $search]);
        $offers = $offersRes['data']['offers']['data'] ?? $offersRes['data'] ?? [];

        return view('offers.index', compact('offerTypes', 'offers', 'search'));
    }

    public function show(ApiService $api, string $slug)
    {
        $res = $api->get("offer/{$slug}", []);
        $offer = $res['data'] ?? $res;
        
        if (!$offer)
            abort(404);

        return view('offers.show', compact('offer'));
    }
}
