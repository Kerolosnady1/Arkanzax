<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        // For a real-world scenario, we might want to cache these counts or have a single stats endpoint
        // For now, we fetch from individual endpoints as they are expected by the migrated dashboard view
        
        $stats = [
            'blogs' => $this->getCount('blogs'),
            'offers' => $this->getCount('offers'),
            'items' => $this->getCount('items'),
            'leads' => $this->getCount('leads'),
            'orders' => $this->getCount('orders'),
            'subscribers' => $this->getCount('subscribers'),
            'contact_messages' => $this->getCount('contact-messages'),
            'custom_pages' => $this->getCount('custom-pages'),
        ];

        // Fetch settings if available, otherwise use default
        $settingsResponse = $this->apiService->get('settings');
        $settings = $settingsResponse['data'] ?? [];
        if (is_array($settings)) {
            $settings = collect($settings)->pluck('value', 'key')->toArray();
        }

        return view('admin.dashboard', compact('stats', 'settings'));
    }

    private function getCount($endpoint)
    {
        try {
            $response = $this->apiService->get($endpoint);
            
            // Check for different response structures based on Postman collection
            // ApiService already unwraps the 'data' key, so we check the response directly
            if (isset($response['total'])) {
                return $response['total'];
            }
            
            if (isset($response[$endpoint . '_count'])) {
                return $response[$endpoint . '_count'];
            }
            
            if (isset($response['blogs_count']) && $endpoint === 'blogs') {
                return $response['blogs_count'];
            }

            if (isset($response['items_count']) && $endpoint === 'items') {
                return $response['items_count'];
            }

            if (isset($response['offers_count']) && $endpoint === 'offers') {
                return $response['offers_count'];
            }

            if (is_array($response)) {
                return count($response);
            }

            return 0;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
