@extends('layouts.app')
@section('title', 'Mobile App Development | Arkanzax')

@section('head')
<style>
html[dir="rtl"] body {
      font-family: 'Cairo', 'Outfit', sans-serif;
    }

    /* Using Global Styles from style.css */

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
      color: #8b5cf6;
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
        grid-template-columns: 1fr !important;
        text-align: center;
      }
      .content-text h2 { font-size: 2rem; }
      .feature-list { display: inline-block; text-align: left; }
      html[dir="rtl"] .feature-list { text-align: right; }
    }
</style>
@endsection

@section('content')
<section class="inner-hero">
      <div class="container">
        <span class="hero-badge reveal-up" style="border-color: #8b5cf6; color: #8b5cf6;">
          <i class="fas fa-mobile-alt"></i>&nbsp;
          <span data-en="Our Services" data-ar="خدماتنا">Our Services</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="Mobile App Development" data-ar="تطوير تطبيقات الجوال">
          Mobile App Development</h1>
        <p class="hero-description reveal-up"
          data-en="Create stunning, high-performance mobile applications for iOS and Android that engage users and drive business growth."
          data-ar="قم بإنشاء تطبيقات جوال مذهلة وعالية الأداء لنظامي iOS وAndroid تجذب المستخدمين وتحفز نمو الأعمال.">
          Create stunning, high-performance mobile applications for iOS and Android that engage users and drive business
          growth.
        </p>
      </div>
    </section>

    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2 data-en="Next-Gen Mobile Experiences" data-ar="تجارب الجوال من الجيل التالي">Next-Gen Mobile Experiences
            </h2>
            <p data-en="Our mobile engineering team crafts intuitive and powerful applications tailored to your specific business goals. Whether you need a native iOS/Android app or a cross-platform solution using Flutter or React Native, we ensure a seamless user experience, robust backend integration, and top-tier performance."
              data-ar="يصمم فريق هندسة الجوال لدينا تطبيقات بديهية وقوية مصممة خصيصًا لأهداف عملك المحددة. سواء كنت بحاجة إلى تطبيق iOS/Android أصلي أو حل عابر للمنصات باستخدام Flutter أو React Native، فإننا نضمن تجربة مستخدم سلسة وتكاملاً قويًا مع الخلفية وأداءً من المستوى الأول.">
              Our mobile engineering team crafts intuitive and powerful applications tailored to your specific business
              goals. Whether you need a native iOS/Android app or a cross-platform solution using Flutter or React
              Native, we ensure a seamless user experience, robust backend integration, and top-tier performance.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-check-circle" style="color: #8b5cf6;"></i> <span
                  data-en="Native iOS & Android Development" data-ar="تطوير تطبيقات iOS و Android الأصلية">Native iOS &
                  Android Development</span></li>
              <li><i class="fas fa-check-circle" style="color: #8b5cf6;"></i> <span
                  data-en="Cross-Platform (Flutter/React Native)"
                  data-ar="تطبيقات عابرة للمنصات (Flutter/React Native)">Cross-Platform (Flutter/React Native)</span>
              </li>
              <li><i class="fas fa-check-circle" style="color: #8b5cf6;"></i> <span data-en="Real-time Synchronization"
                  data-ar="التزامن في الوقت الفعلي">Real-time Synchronization</span></li>
              <li><i class="fas fa-check-circle" style="color: #8b5cf6;"></i> <span
                  data-en="In-App Analytics & Notifications" data-ar="تحليلات وإشعارات داخل التطبيق">In-App Analytics &
                  Notifications</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="{{ asset('assets/images/services/mobile.png') }}"
              alt="Mobile App Development" />
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Elevate Your Mobile Presence" data-ar="ارتقِ بحضورك على الجوال">Elevate Your Mobile Presence</h2>
          <p data-en="Ready to launch an app that users love? Let's discuss your project today."
            data-ar="مستعد لإطلاق تطبيق يحبه المستخدمون؟ دعنا نناقش مشروعك اليوم.">Ready to launch an app that users
            love? Let's discuss your project today.</p>
          <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Start Your Project" data-ar="ابدأ مشروعك">Start
            Your Project</a>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
