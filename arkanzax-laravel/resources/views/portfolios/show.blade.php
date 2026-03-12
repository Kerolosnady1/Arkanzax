@extends('layouts.app')
@section('title', ($portfolio['name_en'] ?? 'Portfolio') . ' | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:900px;">
            <a href="{{ route('portfolios.index') }}"
                style="color:var(--primary);text-decoration:none;display:inline-flex;align-items:center;gap:8px;margin-bottom:30px;"><i
                    class="fas fa-arrow-left"></i> Back to Portfolio</a>
            <h1 style="font-size:2.5rem;margin-bottom:16px;">{{ $portfolio['name_en'] ?? $portfolio['name_ar'] ?? '' }}</h1>
            @if(!empty($portfolio['banner_en']))
                <img src="{{ $portfolio['banner_en'] }}" alt="{{ $portfolio['name_en'] ?? '' }}"
                    style="width:100%;border-radius:16px;margin-bottom:30px;max-height:450px;object-fit:cover;">
            @endif
            @if(!empty($portfolio['galleries']))
                <div
                    style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:12px;margin-bottom:30px;">
                    @foreach($portfolio['galleries'] as $img)
                        <img src="{{ $img['image'] ?? '' }}" alt="Gallery"
                            style="width:100%;height:220px;object-fit:cover;border-radius:12px;cursor:pointer;"
                            onclick="window.open(this.src)">
                    @endforeach
                </div>
            @endif
            <div style="font-size:1.1rem;line-height:1.8;color:#333;">
                {!! $portfolio['description_en'] ?? $portfolio['description_ar'] ?? '' !!}</div>
        </div>
    </section>
@endsection