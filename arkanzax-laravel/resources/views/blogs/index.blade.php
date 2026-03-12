@extends('layouts.app')
@section('title', 'Blog | Arkanzax')
@section('meta_description', 'Read the latest insights on software development, AI, and technology from Arkanzax.')

@section('content')
    <section class="blog-section" id="blog" style="padding-top: 160px;">
        <div class="container">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge light" data-en="Our Blog" data-ar="مدونتنا">Our Blog</span>
                <h2 class="section-title light" data-en="Latest Articles & Insights" data-ar="أحدث المقالات والرؤى">Latest
                    Articles & Insights</h2>
            </div>

            {{-- Search --}}
            <form action="{{ route('blogs.index') }}" method="GET" style="max-width:500px;margin:0 auto 40px;">
                <div class="form-group" style="display:flex;gap:10px;">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search articles..."
                        style="flex:1;padding:12px 16px;border:1px solid rgba(255,255,255,.2);border-radius:8px;background:rgba(255,255,255,.05);color:#fff;font-size:1rem;">
                    <button type="submit" class="btn btn-primary" style="padding:12px 24px;">Search</button>
                </div>
            </form>

            {{-- Categories --}}
            @if(!empty($categories))
                <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-bottom:40px;">
                    <a href="{{ route('blogs.index') }}" class="btn btn-outline-white"
                        style="padding:8px 18px;font-size:.85rem;">All</a>
                    @foreach($categories as $cat)
                        @if(isset($cat['id']))
                            <a href="{{ route('blogs.category', $cat['id']) }}" class="btn btn-outline-white"
                                style="padding:8px 18px;font-size:.85rem;">{{ $cat['title_en'] ?? $cat['title_ar'] ?? 'Category' }}</a>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="blog-grid">
                @forelse($blogs as $blog)
                    <article class="blog-card reveal-card">
                        <div class="blog-img">
                            @if(!empty($blog['banner_en']))
                                <img src="{{ $blog['banner_en'] }}" alt="{{ $blog['title_en'] ?? '' }}"
                                    style="width:100%;height:200px;object-fit:cover;">
                            @else
                                <div class="blog-img-placeholder"><i class="fas fa-newspaper"></i></div>
                            @endif
                            @if(!empty($blog['category']['title_en']))
                                <span class="blog-category">{{ $blog['category']['title_en'] }}</span>
                            @endif
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta"><span><i class="fas fa-calendar-alt"></i>
                                    {{ $blog['created_at'] ?? '' }}</span></div>
                            <h3 class="blog-title">{{ $blog['title_en'] ?? $blog['title_ar'] ?? '' }}</h3>
                            <p>{{ $blog['short_description_en'] ?? Str::limit(strip_tags($blog['description_en'] ?? ''), 120) }}
                            </p>
                            <a href="{{ !empty($blog['slug_en']) ? route('blogs.show', $blog['slug_en']) : (!empty($blog['slug_ar']) ? route('blogs.show', $blog['slug_ar']) : '#') }}"
                                class="blog-link">Read Article →</a>
                        </div>
                    </article>
                @empty
                    <div style="text-align:center;color:rgba(255,255,255,.6);grid-column:1/-1;padding:60px 0;">
                        <i class="fas fa-inbox" style="font-size:3rem;margin-bottom:20px;display:block;"></i>
                        <p data-en="No blog posts found." data-ar="لا توجد مقالات.">No blog posts found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection