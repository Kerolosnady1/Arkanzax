@extends('layouts.app')
@section('title', ($career['title_en'] ?? 'Career') . ' | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:800px;">
            <a href="{{ route('jobs.index') }}"
                style="color:var(--primary);text-decoration:none;display:inline-flex;align-items:center;gap:8px;margin-bottom:30px;"><i
                    class="fas fa-arrow-left"></i> Back to Careers</a>

            <h1 style="font-size:2.5rem;margin-bottom:16px;">{{ $career['title_en'] ?? $career['title_ar'] ?? '' }}</h1>
            @if(!empty($career['career_type']['title_en']))
                <span
                    style="background:rgba(17,164,212,.1);color:var(--primary);padding:6px 16px;border-radius:20px;font-size:.9rem;font-weight:600;">{{ $career['career_type']['title_en'] }}</span>
            @endif

            <div style="font-size:1.1rem;line-height:1.8;color:#333;margin:30px 0;">
                {!! $career['description_en'] ?? $career['description_ar'] ?? '' !!}
            </div>

            {{-- Application Form --}}
            <div style="background:#f8fafc;border-radius:16px;padding:40px;margin-top:40px;">
                <h2 style="margin-bottom:24px;" data-en="Apply for this Position" data-ar="تقدم لهذه الوظيفة">Apply for this
                    Position</h2>

                @if(session('success'))
                    <div style="background:#10b981;color:#fff;padding:16px 24px;border-radius:8px;margin-bottom:20px;">
                        {{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div style="background:#ef4444;color:#fff;padding:16px 24px;border-radius:8px;margin-bottom:20px;">
                        {{ session('error') }}</div>
                @endif

                <form action="{{ route('jobs.apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="career_id" value="{{ $career['id'] ?? '' }}">
                    <div style="display:grid;gap:16px;">
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;">Full Name *</label><input
                                type="text" name="name" required
                                style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;"
                                value="{{ old('name') }}"></div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">Email *</label><input
                                    type="email" name="email" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;"
                                    value="{{ old('email') }}"></div>
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">Phone *</label><input
                                    type="text" name="phone" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;"
                                    value="{{ old('phone') }}"></div>
                        </div>
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;">Upload CV (PDF/DOC)
                                *</label><input type="file" name="cv" required accept=".pdf,.doc,.docx"
                                style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;"></div>
                        <button type="submit" class="btn btn-primary" style="padding:14px;font-size:1rem;width:100%;">Submit
                            Application</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection