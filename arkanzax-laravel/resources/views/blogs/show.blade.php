@extends('layouts.app')
@section('title', ($blog['meta_title_en'] ?? $blog['title_en'] ?? 'Blog') . ' | Arkanzax')
@section('meta_description', $blog['meta_description_en'] ?? $blog['short_description_en'] ?? '')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:800px;">
            <a href="{{ route('blogs.index') }}"
                style="color:var(--primary);text-decoration:none;display:inline-flex;align-items:center;gap:8px;margin-bottom:30px;">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
            @if(!empty($blog['category']['title_en']))
                <span class="sub-badge"
                    style="margin-bottom:16px;display:inline-block;">{{ $blog['category']['title_en'] }}</span>
            @endif
            <h1 style="font-size:2.5rem;margin-bottom:16px;line-height:1.2;">
                {{ $blog['title_en'] ?? $blog['title_ar'] ?? '' }}</h1>
            <div style="color:rgba(100,100,100,.8);margin-bottom:30px;display:flex;gap:20px;flex-wrap:wrap;">
                <span><i class="fas fa-calendar-alt"></i> {{ $blog['created_at'] ?? '' }}</span>
                @if(!empty($blog['meta_keywords_en']))
                    <span><i class="fas fa-tags"></i> {{ $blog['meta_keywords_en'] }}</span>
                @endif
            </div>
            @if(!empty($blog['banner_en']))
                <img src="{{ $blog['banner_en'] }}" alt="{{ $blog['title_en'] ?? '' }}"
                    style="width:100%;border-radius:16px;margin-bottom:30px;max-height:400px;object-fit:cover;">
            @endif
            <div class="blog-content" style="font-size:1.1rem;line-height:1.8;color:#333;">
                {!! $blog['description_en'] ?? $blog['description_ar'] ?? '' !!}
            </div>
        </div>
    </section>
@endsection