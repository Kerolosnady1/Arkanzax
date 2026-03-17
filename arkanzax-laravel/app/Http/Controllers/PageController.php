<?php

namespace App\Http\Controllers;

use App\Services\ApiService;

class PageController extends Controller
{
    public function show(ApiService $api, string $slug)
    {
        $pages = $api->get('custom-pages', [], 300) ?? [];
        $page = collect($pages)->firstWhere('slug', $slug);
        if (!$page)
            abort(404);

        return view('pages.show', compact('page'));
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
    public function terms()
    {
        return view('pages.terms');
    }
    public function cookies()
    {
        return view('pages.cookies');
    }

    // Static product/service pages
    public function productPms(ApiService $api)
    {
        return view('pages.product-pms', $this->getCommonData($api));
    }
    public function productMarketing(ApiService $api)
    {
        return view('pages.product-marketing', $this->getCommonData($api));
    }
    public function productEcommerce(ApiService $api)
    {
        return view('pages.product-ecommerce', $this->getCommonData($api));
    }
    public function hostingDomain(ApiService $api)
    {
        return view('pages.hosting-domain', $this->getCommonData($api));
    }
    public function seoContent(ApiService $api)
    {
        return view('pages.seo-content', $this->getCommonData($api));
    }
    public function paidAds(ApiService $api)
    {
        return view('pages.paid-ads', $this->getCommonData($api));
    }
    public function socialMedia(ApiService $api)
    {
        return view('pages.social-media', $this->getCommonData($api));
    }
    public function emailMarketing(ApiService $api)
    {
        return view('pages.email-marketing', $this->getCommonData($api));
    }
    public function analytics(ApiService $api)
    {
        return view('pages.analytics', $this->getCommonData($api));
    }
    public function brandingDesign(ApiService $api)
    {
        return view('pages.branding-design', $this->getCommonData($api));
    }
    public function productCrmPos(ApiService $api)
    {
        return view('pages.product-crm-pos', $this->getCommonData($api));
    }
    public function sovlowGid1(ApiService $api)
    {
        return view('pages.sovlow-gid1', $this->getCommonData($api));
    }

    private function getCommonData(ApiService $api)
    {
        $testimonialsRes = $api->get('testimonials') ?? [];
        $testimonialsAll = data_get($testimonialsRes, 'data.data') ?? data_get($testimonialsRes, 'data', []);
        if (!is_array($testimonialsAll)) $testimonialsAll = [];
        $testimonialsList = array_values(array_filter($testimonialsAll, fn($t) => ($t['status'] ?? 0) == 1));

        $blogsRes = $api->get('blogs', ['number' => 3]) ?? [];
        $blogsAll = data_get($blogsRes, 'data.blogs.data') ?? data_get($blogsRes, 'data', []);
        if (!is_array($blogsAll)) $blogsAll = [];
        $blogsList = array_values(array_filter($blogsAll, fn($b) => ($b['status'] ?? 0) == 1));

        return compact('testimonialsList', 'blogsList');
    }
}
