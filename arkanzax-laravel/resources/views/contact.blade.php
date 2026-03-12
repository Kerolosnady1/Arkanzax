@extends('layouts.app')
@section('title', 'Contact Us | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:700px;">
            <div class="section-header text-center reveal-up">
                <span class="sub-badge" data-en="Get In Touch" data-ar="تواصل معنا">Get In Touch</span>
                <h2 class="section-title" data-en="Contact Us" data-ar="تواصل معنا">Contact Us</h2>
                <p class="section-subtitle" data-en="Have a project in mind? Let's talk about it."
                    data-ar="لديك مشروع؟ دعنا نتحدث عنه.">Have a project in mind? Let's talk about it.</p>
            </div>

            @if(session('success'))
                <div
                    style="background:#10b981;color:#fff;padding:16px 24px;border-radius:8px;margin-bottom:20px;text-align:center;">
                    {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div
                    style="background:#ef4444;color:#fff;padding:16px 24px;border-radius:8px;margin-bottom:20px;text-align:center;">
                    {{ session('error') }}</div>
            @endif

            <div style="background:#f8fafc;border-radius:16px;padding:40px;">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div style="display:grid;gap:16px;">
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;" data-en="Full Name"
                                data-ar="الاسم الكامل">Full Name *</label><input type="text" name="name" required
                                style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;"
                                value="{{ old('name') }}"></div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;" data-en="Email"
                                    data-ar="البريد الإلكتروني">Email *</label><input type="email" name="email" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;"
                                    value="{{ old('email') }}"></div>
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;" data-en="Phone"
                                    data-ar="الهاتف">Phone *</label><input type="text" name="phone" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;"
                                    value="{{ old('phone') }}"></div>
                        </div>
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;" data-en="Message"
                                data-ar="الرسالة">Message *</label><textarea name="message" required rows="5"
                                style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;resize:vertical;">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="padding:14px;font-size:1rem;width:100%;"
                            data-en="Send Message" data-ar="إرسال الرسالة">Send Message</button>
                    </div>
                </form>
            </div>

            <div
                style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;margin-top:40px;text-align:center;">
                <div style="padding:24px;background:#f8fafc;border-radius:12px;"><i class="fas fa-map-marker-alt"
                        style="font-size:1.5rem;color:var(--primary);margin-bottom:10px;display:block;"></i><strong>Address</strong>
                    <p style="color:#666;margin-top:6px;">6th of October, Giza, Egypt</p>
                </div>
                <div style="padding:24px;background:#f8fafc;border-radius:12px;"><i class="fas fa-envelope"
                        style="font-size:1.5rem;color:var(--primary);margin-bottom:10px;display:block;"></i><strong>Email</strong>
                    <p style="margin-top:6px;"><a href="mailto:info@arkanzax.com"
                            style="color:var(--primary);">info@arkanzax.com</a></p>
                </div>
                <div style="padding:24px;background:#f8fafc;border-radius:12px;"><i class="fas fa-phone"
                        style="font-size:1.5rem;color:var(--primary);margin-bottom:10px;display:block;"></i><strong>Phone</strong>
                    <p style="margin-top:6px;"><a href="tel:+201033477682" style="color:var(--primary);">+20 1033 477
                            682</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection