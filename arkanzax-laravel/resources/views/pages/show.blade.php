@extends('layouts.app')
@section('title', ($page['meta_title_en'] ?? $page['title_en'] ?? 'Page') . ' | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:800px;">
            <h1 style="font-size:2.5rem;margin-bottom:24px;">{{ $page['title_en'] ?? $page['title_ar'] ?? '' }}</h1>
            <div style="font-size:1.1rem;line-height:1.8;color:#333;">
                {!! $page['description_en'] ?? $page['description_ar'] ?? '' !!}
            </div>
        </div>
    </section>
@endsection
