@extends('layouts.app')
@section('title', ($offer['meta_title_en'] ?? $offer['title_en'] ?? 'Offer') . ' | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:800px;">
            <a href="{{ route('offers.index') }}"
                style="color:var(--primary);text-decoration:none;display:inline-flex;align-items:center;gap:8px;margin-bottom:30px;"><i
                    class="fas fa-arrow-left"></i> Back to Offers</a>
            <h1 style="font-size:2.5rem;margin-bottom:16px;">{{ $offer['title_en'] ?? $offer['title_ar'] ?? '' }}</h1>
            @if(!empty($offer['banner_en']))
                <img src="{{ $offer['banner_en'] }}" alt="{{ $offer['title_en'] ?? '' }}"
                    style="width:100%;border-radius:16px;margin-bottom:30px;max-height:400px;object-fit:cover;">
            @endif
            @if(!empty($offer['price']))
                <div
                    style="background:linear-gradient(135deg,var(--primary),#1a6ec5);color:#fff;padding:20px 30px;border-radius:12px;margin-bottom:30px;font-size:1.3rem;font-weight:700;display:inline-block;">
                    {{ $offer['price'] }} {{ $offer['currency'] ?? 'EGP' }}</div>
            @endif
            <div style="font-size:1.1rem;line-height:1.8;color:#333;">
                {!! $offer['description_en'] ?? $offer['description_ar'] ?? '' !!}
            </div>
        </div>
    </section>
@endsection