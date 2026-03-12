@extends('layouts.app')
@section('title', 'Portfolio | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge" data-en="Our Work" data-ar="أعمالنا">Our Work</span>
                <h2 class="section-title" data-en="Portfolio" data-ar="الأعمال">Portfolio</h2>
            </div>

            @if(!empty($categories))
                <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:40px;">
                    @foreach($categories as $cat)
                        @if(isset($cat['id']))
                            <a href="{{ route('portfolios.index', ['category' => $cat['id']]) }}" class="btn btn-outline-white"
                                style="padding:8px 18px;font-size:.85rem;border-color:var(--primary);color:var(--primary);">{{ $cat['title_en'] ?? 'Category' }}</a>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="products-grid" style="grid-template-columns:repeat(auto-fill,minmax(300px,1fr));">
                @forelse($portfolios as $portfolio)
                    <div class="product-showcase-card reveal-card" style="overflow:hidden;">
                        @if(!empty($portfolio['banner_en']))
                            <img src="{{ $portfolio['banner_en'] }}" alt="{{ $portfolio['name_en'] ?? '' }}"
                                style="width:100%;height:220px;object-fit:cover;border-radius:12px;margin-bottom:16px;">
                        @elseif(!empty($portfolio['galleries']) && count($portfolio['galleries']) > 0)
                            <img src="{{ $portfolio['galleries'][0]['image'] ?? '' }}" alt="{{ $portfolio['name_en'] ?? '' }}"
                                style="width:100%;height:220px;object-fit:cover;border-radius:12px;margin-bottom:16px;">
                        @else
                            <div class="product-showcase-icon"><i class="fas fa-images"></i></div>
                        @endif
                        <h3>{{ $portfolio['name_en'] ?? $portfolio['name_ar'] ?? '' }}</h3>
                        <p>{{ Str::limit(strip_tags($portfolio['description_en'] ?? ''), 120) }}</p>
                        <a href="{{ !empty($portfolio['slug_en']) ? route('portfolios.show', $portfolio['slug_en']) : (!empty($portfolio['slug_ar']) ? route('portfolios.show', $portfolio['slug_ar']) : '#') }}"
                            class="btn-product-learn"><span>View Project</span> <i class="fas fa-arrow-right"></i></a>
                    </div>
                @empty
                    <div style="text-align:center;color:#666;grid-column:1/-1;padding:60px 0;">
                        <i class="fas fa-images" style="font-size:3rem;margin-bottom:20px;display:block;opacity:.4;"></i>
                        <p>Portfolio is being updated. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection