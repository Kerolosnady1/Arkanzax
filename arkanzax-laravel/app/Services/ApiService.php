<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ApiService
{
    protected string $baseUrl;
    protected array $headers;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('api.base_url'), '/');
        $this->headers = [
            'X-API-KEY' => config('api.key'),
            'X-Tenant-ID' => config('api.tenant_id'),
            'Accept' => 'application/json',
        ];
    }

    public function get(string $endpoint, array $query = [], int $cacheTtl = 0): ?array
    {
        $cacheKey = 'api_' . md5($endpoint . json_encode($query));

        if ($cacheTtl > 0) {
            return Cache::remember($cacheKey, $cacheTtl, function () use ($endpoint, $query) {
                return $this->makeGetRequest($endpoint, $query);
            });
        }

        return $this->makeGetRequest($endpoint, $query);
    }

    protected function makeGetRequest(string $endpoint, array $query = []): ?array
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->withoutVerifying()
                ->timeout(15)
                ->retry(2, 500)
                ->get($this->baseUrl . '/' . ltrim($endpoint, '/'), $query);

            if ($response->successful()) {
                return $response->json();
            }

            Log::warning('API request failed', [
                'endpoint' => $endpoint,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('API request exception', [
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    public function post(string $endpoint, array $data = []): ?array
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->withoutVerifying()
                ->timeout(15)
                ->post($this->baseUrl . '/' . ltrim($endpoint, '/'), $data);

            return $response->json();
        } catch (\Exception $e) {
            Log::error('API POST exception', [
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    public function postMultipart(string $endpoint, array $data = [], array $files = []): ?array
    {
        try {
            $request = Http::withHeaders($this->headers)
                ->withoutVerifying()
                ->timeout(30);

            foreach ($files as $key => $file) {
                $request = $request->attach($key, file_get_contents($file->getPathname()), $file->getClientOriginalName());
            }

            $response = $request->post($this->baseUrl . '/' . ltrim($endpoint, '/'), $data);

            return $response->json();
        } catch (\Exception $e) {
            Log::error('API multipart POST exception', [
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    public function put(string $endpoint, array $data = []): ?array
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->withoutVerifying()
                ->timeout(15)
                ->put($this->baseUrl . '/' . ltrim($endpoint, '/'), $data);

            return $response->json();
        } catch (\Exception $e) {
            Log::error('API PUT exception', [
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    public function delete(string $endpoint): ?array
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->withoutVerifying()
                ->timeout(15)
                ->delete($this->baseUrl . '/' . ltrim($endpoint, '/'));

            return $response->json();
        } catch (\Exception $e) {
            Log::error('API DELETE exception', [
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }
}
