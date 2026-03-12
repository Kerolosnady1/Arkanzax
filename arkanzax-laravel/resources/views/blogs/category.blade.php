@extends('layouts.app')
@section('title', 'Category: ' . ($data['category']['title_en'] ?? 'Blog') . ' | Arkanzax')

@section('content')
    <section class="blog-section" style="padding-top:160px;">
        <div class="container">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge light">{{ $data['category']['title_en'] ?? 'Category' }}</span>
                <h2 class="section-title light">{{ $data['category']['title_en'] ?? 'Blog Posts' }}</h2>
            </div>
            <div style="text-align:center;margin-bottom:40px;">
                <a href="{{ route('blogs.index') }}" class="btn btn-outline-white">← All Articles</a>
            </div>
            <div class="blog-grid">
                @forelse($data['blogs'] ?? [] as $blog)
                    <article class="blog-card reveal-card">
                        <div class="blog-img">
                            @if(!empty($blog['banner_en']))
                                <img src="{{ $blog['banner_en'] }}" alt="{{ $blog['title_en'] ?? '' }}"
                                    style="width:100%;height:200px;object-fit:cover;">
                            @else
                                <div class="blog-img-placeholder"><i class="fas fa-newspaper"></i></div>
                            @endif
                        </div>
                        <div class="blog-body">
                            <h3 class="blog-title">{{ $blog['title_en'] ?? '' }}</h3>
                            <p>{{ Str::limit(strip_tags($blog['description_en'] ?? ''), 120) }}</p>
                            <a href="{{ route('blogs.show', $blog['slug_en'] ?? '') }}" class="blog-link">Read Article →</a>
                        </div>
                    </article>
                @empty
                    <div style="text-align:center;color:rgba(255,255,255,.6);grid-column:1/-1;padding:60px 0;">
                        <p>No blog posts in this category.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection