@extends('layouts.app')
@section('title', ($item['meta_title_en'] ?? $item['title_en'] ?? 'Item') . ' | Arkanzax')

@section('content')
    @include('partials.product_sub_header')
    <section class="item-details-section" style="padding-top:80px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:900px;">
            <a href="{{ route('items.index') }}"
                style="color:var(--primary);text-decoration:none;display:inline-flex;align-items:center;gap:8px;margin-bottom:30px;"><i
                    class="fas fa-arrow-left"></i> Back to Items</a>
            <h1 style="font-size:2.5rem;margin-bottom:16px;">{{ $item['title_en'] ?? $item['title_ar'] ?? '' }}</h1>

            @if(!empty($item['banner_en']))
                <img src="{{ $item['banner_en'] }}" alt="{{ $item['title_en'] ?? '' }}"
                    style="width:100%;border-radius:16px;margin-bottom:30px;max-height:400px;object-fit:cover;">
            @endif

            {{-- Gallery --}}
            @if(!empty($item['galleries']))
                <div
                    style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:12px;margin-bottom:30px;">
                    @foreach($item['galleries'] as $img)
                        <img src="{{ $img['image'] ?? '' }}" alt="Gallery"
                            style="width:100%;height:200px;object-fit:cover;border-radius:12px;cursor:pointer;"
                            onclick="window.open(this.src)">
                    @endforeach
                </div>
            @endif

            @if(!empty($item['price']))
                <div
                    style="background:linear-gradient(135deg,var(--primary),#1a6ec5);color:#fff;padding:20px 30px;border-radius:12px;margin-bottom:30px;font-size:1.3rem;font-weight:700;display:inline-block;">
                    {{ $item['price'] }} {{ $item['currency'] ?? 'EGP' }}</div>
            @endif

            <div style="font-size:1.1rem;line-height:1.8;color:#333;">
                {!! $item['description_en'] ?? $item['description_ar'] ?? '' !!}
            </div>
        </div>
    </section>
@endsection