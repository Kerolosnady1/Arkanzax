@extends('layouts.app')
@section('title', 'SME Marketing & Automation Tools | Arkanzax')
@section('head')
<style>
html[dir="rtl"] body {
      font-family: 'Cairo', 'Outfit', sans-serif;
    }

    /* inner-hero styles now in style.css */

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
    }
</style>
@section('sub_header')
    @include('partials.product_sub_header')
@endsection
@section('content')
<section class="inner-hero">
      <div class="container">
        <span class="hero-badge reveal-up" style="border-color: var(--accent-blue); color: var(--accent-blue);">
          <i class="fas fa-rocket"></i>&nbsp;
          <span data-en="Growth Engine" data-ar="محرك النمو">Growth Engine</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="Marketing Tools for SMEs" data-ar="أدوات التسويق للشركات الصغيرة">
          Marketing Tools for SMEs</h1>
        <p class="hero-description reveal-up"
          data-en="Automate your sales funnel, manage customer relationships, and scale your reach with our integrated marketing ecosystem designed for small to medium enterprises."
          data-ar="أتمتة قمع المبيعات الخاص بك، وإدارة علاقات العملاء، وتوسيع نطاق وصولك من خلال نظام التسويق المتكامل المصمم للشركات الصغيرة والمتوسطة.">
          Automate your sales funnel, manage customer relationships, and scale your reach with our integrated
          marketing ecosystem designed for small to medium enterprises.
        </p>
      </div>
    </section>

    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2 data-en="Empowering Small Business Growth" data-ar="تمكين نمو الشركات الصغيرة">Empowering
              Small Business Growth</h2>
            <p data-en="We bridge the gap between complex enterprise software and simple tools. Our marketing suite provides high-end feature sets with a user-friendly interface tailored for SMEs."
              data-ar="نحن نسد الفجوة بين برمجيات المؤسسات المعقدة والأدوات البسيطة. توفر مجموعة التسويق الخاصة بنا مجموعات ميزات متطورة مع واجهة سهلة الاستخدام مصممة للشركات الصغيرة والمتوسطة.">
              We bridge the gap between complex enterprise software and simple tools. Our marketing suite
              provides high-end feature sets with a user-friendly interface tailored for SMEs.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-check-circle"></i> <span data-en="Unified CRM & Lead Management"
                  data-ar="نظام موحد لإدارة العملاء والعملاء المحتملين">Unified CRM & Lead
                  Management</span></li>
              <li><i class="fas fa-check-circle"></i> <span data-en="Email & WhatsApp Automation"
                  data-ar="أتمتة البريد الإلكتروني والواتساب">Email & WhatsApp Automation</span></li>
              <li><i class="fas fa-check-circle"></i> <span data-en="Social Media Campaign Planner"
                  data-ar="مخطط حملات التواصل الاجتماعي">Social Media Campaign Planner</span></li>
              <li><i class="fas fa-check-circle"></i> <span data-en="ROI & Performance Dashboards"
                  data-ar="لوحات تحكم العائد على الاستثمار والأداء">ROI & Performance
                  Dashboards</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=2000"
              alt="Marketing Automation" />
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Ready to Automate Your Success?" data-ar="هل أنت جاهز لأتمتة نجاحك؟">Ready to Automate
            Your Success?</h2>
          <p data-en="Get the tools you need to grow your brand without the enterprise price tag."
            data-ar="احصل على الأدوات التي تحتاجها لتنمية علامتك التجارية دون دفع تكاليف المؤسسات الكبيرة.">
            Get the tools you need to grow your brand without the enterprise price tag.
          </p>
          <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Start Free Trial"
            data-ar="ابدأ التجربة المجانية">Start Free Trial</a>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
