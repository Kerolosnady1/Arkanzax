@extends('layouts.app')
@section('title', 'Web Development & Technical SEO | Arkanzax')

@section('head')
<style>
html[dir="rtl"] body {
      font-family: 'Cairo', 'Outfit', sans-serif;
    }

    .inner-hero {
      padding: 160px 0 80px;
      background: linear-gradient(135deg, var(--dark-2) 0%, var(--dark) 100%);
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .inner-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 50% 50%, rgba(49, 165, 161, 0.1) 0%, transparent 70%);
      pointer-events: none;
    }

    @media (max-width: 768px) {
      .inner-hero {
        padding: 120px 0 60px;
      }

      .content-grid {
        grid-template-columns: 1fr;
        gap: 40px;
      }
    }

    .service-content {
      padding: 100px 0;
      background: var(--dark-3);
    }

    .content-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 60px;
      align-items: center;
    }

    .content-text h2 {
      font-size: 2.5rem;
      margin-bottom: 24px;
      color: var(--white);
    }

    .content-text p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: var(--text-gray);
      margin-bottom: 30px;
    }

    .feature-list {
      list-style: none;
      padding: 0;
    }

    .feature-list li {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 16px;
      color: var(--text-dark);
      font-weight: 500;
    }

    .feature-list i {
      color: var(--primary);
    }

    .content-image {
      position: relative;
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: var(--shadow-lg);
    }

    .content-image img {
      width: 100%;
      height: auto;
      display: block;
    }

    @media (max-width: 900px) {
      .content-grid {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .feature-list {
        display: inline-block;
        text-align: left;
      }

      html[dir="rtl"] .feature-list {
        text-align: right;
      }
    }
</style>
@endsection

@section('content')
<section class="inner-hero">
      <div class="container">
        <span class="hero-badge reveal-up">
          <i class="fas fa-code"></i>&nbsp;
          <span data-en="Our Services" data-ar="خدماتنا">Our Services</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="Web Development & Technical SEO"
          data-ar="تطوير الويب وتحسين محركات البحث التقني">
          Web Development & Technical SEO</h1>
        <p class="hero-description reveal-up"
          data-en="Build high-performance web applications optimized for speed, security, and search visibility from the ground up."
          data-ar="بناء تطبيقات ويب عالية الأداء محسنة للسرعة والأمان وظهور البحث من الألف إلى الياء.">
          Build high-performance web applications optimized for speed, security, and search visibility from the ground
          up.
        </p>
      </div>
    </section>

    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2 data-en="Modern Web Architectures" data-ar="معماريات الويب الحديثة">Modern Web Architectures</h2>
            <p data-en="We don't just build websites; we engineer digital experiences. Our web development team uses cutting-edge frameworks like React, Next.js, and Node.js to create scalable, responsive, and blazing-fast applications. Every line of code is written with technical SEO at its core, ensuring your site ranks high and performs perfectly."
              data-ar="نحن لا نبني مواقع ويب فحسب؛ بل نصمم تجارب رقمية. يستخدم فريق تطوير الويب لدينا أطر عمل متطورة مثل React, Next.js, Node.js, Laravel, و اكثر لإنشاء تطبيقات قابلة للتوسع واستجابية وسريعة للغاية. كل سطر من الأكواد مكتوب مع وضع تحسين محركات البحث التقني في جوهره، مما يضمن تصنيف موقعك في مرتبة عالية وأدائه بشكل مثالي.">
              We don't just build websites; we engineer digital experiences. Our web development team uses cutting-edge
              frameworks like React, Next.js, Node.js, Laravel, and more to create scalable, responsive, and
              blazing-fast applications.
              Every line of code is written with technical SEO at its core, ensuring your site ranks high and performs
              perfectly.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-check-circle"></i> <span data-en="Custom Full-Stack Development"
                  data-ar="تطوير شامل مخصص (Full-Stack)">Custom Full-Stack Development</span></li>
              <li><i class="fas fa-check-circle"></i> <span data-en="Core Web Vitals Optimization"
                  data-ar="تحسين مؤشرات الويب الأساسية">Core Web Vitals Optimization</span></li>
              <li><i class="fas fa-check-circle"></i> <span data-en="Headless CMS & Scalable Backends"
                  data-ar="نظام إدارة محتوى بدون واجهة وخلفيات قابلة للتوسع">Headless CMS & Scalable Backends</span>
              </li>
              <li><i class="fas fa-check-circle"></i> <span data-en="Semantic HTML & Structured Data"
                  data-ar="HTML دلالي وبيانات مهيكلة">Semantic HTML & Structured Data</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=2426"
              alt="SEO Analysis" />
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Ready to Build Your Next Big Thing?" data-ar="مستعد لبناء مشروعك الكبير القادم؟">Ready to Build
            Your Next Big Thing?</h2>
          <p data-en="Get a free technical consultation and discover how our engineering team can bring your vision to life."
            data-ar="احصل على استشارة تقنية مجانية واكتشف كيف يمكن لفريقنا الهندسي تحويل رؤيتك إلى حقيقة.">Get a
            free technical consultation and discover how our engineering team can bring your vision to life.</p>
          <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Get Free Quote"
            data-ar="احصل على عرض سعر مجاني">Get Free Quote</a>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
