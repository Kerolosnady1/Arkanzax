@extends('layouts.app')
@section('title', 'Testimonials | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge" data-en="Client Love" data-ar="آراء عملائنا">Client Love</span>
                <h2 class="section-title" data-en="Testimonials" data-ar="آراء العملاء">Testimonials</h2>
            </div>

            <div
                style="display:grid;grid-template-columns:repeat(auto-fill,minmax(350px,1fr));gap:24px;margin-bottom:60px;">
                @forelse($testimonials['data'] ?? $testimonials ?? [] as $t)
                    <div class="product-showcase-card reveal-card">
                        <div style="color:#f59e0b;font-size:1.2rem;margin-bottom:12px;">★★★★★</div>
                        <p style="font-style:italic;color:#555;line-height:1.7;margin-bottom:16px;">
                            "{{ $t['testimonial'] ?? '' }}"</p>
                        <div style="display:flex;align-items:center;gap:12px;">
                            @if(!empty($t['image']))
                                <img src="{{ $t['image'] }}" alt="{{ $t['name'] }}"
                                    style="width:48px;height:48px;border-radius:50%;object-fit:cover;">
                            @else
                                <div
                                    style="width:48px;height:48px;border-radius:50%;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;">
                                    {{ strtoupper(substr($t['name'] ?? 'U', 0, 2)) }}</div>
                            @endif
                            <div><strong>{{ $t['name'] ?? '' }}</strong></div>
                        </div>
                    </div>
                @empty
                    <div style="text-align:center;color:#666;grid-column:1/-1;padding:40px;">
                        <p>No testimonials yet. Be the first to share!</p>
                    </div>
                @endforelse
            </div>

            {{-- Submit Testimonial Form --}}
            <div style="max-width:600px;margin:0 auto;">
                <h3 style="text-align:center;margin-bottom:24px;" data-en="Share Your Experience" data-ar="شارك تجربتك">
                    Share Your Experience</h3>
                @if(session('success'))
                    <div
                        style="background:#10b981;color:#fff;padding:16px;border-radius:8px;margin-bottom:20px;text-align:center;">
                        {{ session('success') }}</div>
                @endif
                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data"
                    style="background:#f8fafc;padding:30px;border-radius:16px;">
                    @csrf
                    <div style="display:grid;gap:16px;">
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;">Name *</label><input
                                type="text" name="name" required
                                style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;"></div>
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;">Email *</label><input
                                type="email" name="email" required
                                style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;"></div>
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;">Your Testimonial
                                *</label><textarea name="testimonial" required rows="4"
                                style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;resize:vertical;"></textarea>
                        </div>
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;">Photo (optional)</label><input
                                type="file" name="image" accept="image/*"
                                style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;"></div>
                        <button type="submit" class="btn btn-primary" style="padding:14px;font-size:1rem;">Submit
                            Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection