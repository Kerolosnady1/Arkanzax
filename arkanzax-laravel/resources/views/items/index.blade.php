@extends('layouts.app')
@section('title', 'Items | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge" data-en="Our Products" data-ar="منتجاتنا">Our Products</span>
                <h2 class="section-title" data-en="Items & Products" data-ar="المنتجات والعناصر">Items & Products</h2>
            </div>

            <form action="{{ route('items.index') }}" method="GET" style="max-width:500px;margin:0 auto 40px;">
                <div style="display:flex;gap:10px;">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search items..."
                        style="flex:1;padding:12px 16px;border:1px solid rgba(0,0,0,.1);border-radius:8px;font-size:1rem;">
                    <button type="submit" class="btn btn-primary" style="padding:12px 24px;">Search</button>
                </div>
            </form>

            <div class="products-grid">
                @forelse($items as $item)
                    <div class="product-showcase-card reveal-card">
                        @if(!empty($item['banner_en']))
                            <img src="{{ $item['banner_en'] }}" alt="{{ $item['title_en'] ?? '' }}"
                                style="width:100%;height:180px;object-fit:cover;border-radius:12px;margin-bottom:16px;">
                        @elseif(!empty($item['galleries']) && count($item['galleries']) > 0)
                            <img src="{{ $item['galleries'][0]['image'] ?? '' }}" alt="{{ $item['title_en'] ?? '' }}"
                                style="width:100%;height:180px;object-fit:cover;border-radius:12px;margin-bottom:16px;">
                        @else
                            <div class="product-showcase-icon"><i class="fas fa-box"></i></div>
                        @endif
                        <h3>{{ $item['title_en'] ?? $item['title_ar'] ?? '' }}</h3>
                        <p>{{ Str::limit(strip_tags($item['description_en'] ?? $item['description_ar'] ?? ''), 150) }}</p>
                        @if(!empty($item['price']))
                            <p style="font-size:1.4rem;font-weight:700;color:var(--primary);margin:10px 0;">{{ $item['price'] }}
                                {{ $item['currency'] ?? 'EGP' }}
                            </p>
                        @endif
                        <a href="{{ !empty($item['slug_en']) ? route('items.show', $item['slug_en']) : (!empty($item['slug_ar']) ? route('items.show', $item['slug_ar']) : '#') }}"
                            class="btn-product-learn"><span>View Details</span> <i class="fas fa-arrow-right"></i></a>
                    </div>
                @empty
                    <div style="text-align:center;color:#666;grid-column:1/-1;padding:60px 0;">
                        <i class="fas fa-box-open" style="font-size:3rem;margin-bottom:20px;display:block;opacity:.4;"></i>
                        <p>No items available at this time.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection