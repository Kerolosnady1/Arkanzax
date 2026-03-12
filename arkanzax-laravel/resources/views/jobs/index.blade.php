@extends('layouts.app')
@section('title', 'Careers | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge" data-en="Join Our Team" data-ar="انضم لفريقنا">Join Our Team</span>
                <h2 class="section-title" data-en="Open Positions" data-ar="الوظائف الشاغرة">Open Positions</h2>
            </div>

            <div style="max-width:800px;margin:0 auto;">
                @forelse($careers as $career)
                    <div class="product-showcase-card reveal-card" style="margin-bottom:20px;">
                        <div style="display:flex;justify-content:space-between;align-items:start;flex-wrap:wrap;gap:16px;">
                            <div style="flex:1;">
                                <h3 style="margin-bottom:8px;">{{ $career['title_en'] ?? $career['title_ar'] ?? '' }}</h3>
                                @if(!empty($career['career_type']['title_en']))
                                    <span
                                        style="background:rgba(17,164,212,.1);color:var(--primary);padding:4px 12px;border-radius:20px;font-size:.85rem;font-weight:600;">{{ $career['career_type']['title_en'] }}</span>
                                @endif
                                <p style="margin-top:12px;color:#666;">
                                    {{ Str::limit(strip_tags($career['description_en'] ?? ''), 200) }}</p>
                            </div>
                            <a href="{{ !empty($career['slug_en']) ? route('jobs.show', $career['slug_en']) : (!empty($career['slug_ar']) ? route('jobs.show', $career['slug_ar']) : '#') }}"
                                class="btn btn-primary" style="white-space:nowrap;">View & Apply</a>
                        </div>
                    </div>
                @empty
                    <div style="text-align:center;color:#666;padding:60px 0;">
                        <i class="fas fa-briefcase" style="font-size:3rem;margin-bottom:20px;display:block;opacity:.4;"></i>
                        <p data-en="No open positions at this time." data-ar="لا توجد وظائف شاغرة حالياً.">No open positions at
                            this time. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection