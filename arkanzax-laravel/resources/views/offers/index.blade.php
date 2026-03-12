@extends('layouts.app')
@section('title', 'Offers | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge" data-en="Special Offers" data-ar="عروض خاصة">Special Offers</span>
                <h2 class="section-title" data-en="Our Offers" data-ar="عروضنا">Our Offers</h2>
            </div>

            <form action="{{ route('offers.index') }}" method="GET" style="max-width:500px;margin:0 auto 40px;">
                <div style="display:flex;gap:10px;">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search offers..."
                        style="flex:1;padding:12px 16px;border:1px solid rgba(0,0,0,.1);border-radius:8px;font-size:1rem;">
                    <button type="submit" class="btn btn-primary" style="padding:12px 24px;">Search</button>
                </div>
            </form>

            <div class="products-grid">
                @forelse($offers as $offer)
                    <div class="product-showcase-card reveal-card">
                        @if(!empty($offer['banner_en']))
                            <img src="{{ $offer['banner_en'] }}" alt="{{ $offer['title_en'] ?? '' }}"
                                style="width:100%;height:180px;object-fit:cover;border-radius:12px;margin-bottom:16px;">
                        @else
                            <div class="product-showcase-icon"><i class="fas fa-tag"></i></div>
                        @endif
                        <h3>{{ $offer['title_en'] ?? $offer['title_ar'] ?? '' }}</h3>
                        <p>{{ Str::limit(strip_tags($offer['description_en'] ?? $offer['description_ar'] ?? ''), 150) }}</p>
                        @if(!empty($offer['price']))
                            <p style="font-size:1.4rem;font-weight:700;color:var(--primary);margin:10px 0;">{{ $offer['price'] }}
                                {{ $offer['currency'] ?? 'EGP' }}
                            </p>
                        @endif
                        <a href="{{ !empty($offer['slug_en']) ? route('offers.show', $offer['slug_en']) : (!empty($offer['slug_ar']) ? route('offers.show', $offer['slug_ar']) : '#') }}"
                            class="btn-product-learn"><span>View Offer</span> <i class="fas fa-arrow-right"></i></a>
                    </div>
                @empty
                    <div style="text-align:center;color:#666;grid-column:1/-1;padding:60px 0;">
                        <i class="fas fa-tags" style="font-size:3rem;margin-bottom:20px;display:block;opacity:.4;"></i>
                        <p>No offers available at this time.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection