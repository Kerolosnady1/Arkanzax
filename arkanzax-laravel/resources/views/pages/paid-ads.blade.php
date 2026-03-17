@extends('layouts.app')
@section('title', 'Custom Software & Cloud Infrastructure | Arkanzax')

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
      color: #ec4899;
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
        <span class="hero-badge reveal-up" style="border-color: #ec4899; color: #ec4899;">
          <i class="fas fa-server"></i>&nbsp;
          <span data-en="Our Services" data-ar="خدماتنا">Our Services</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="Custom Software & Cloud" data-ar="البرمجيات المخصصة والسحابة">
          Custom Software & Cloud</h1>
        <p class="hero-description reveal-up"
          data-en="Build robust, scalable custom software solutions and high-availability cloud infrastructure designed for modern business needs."
          data-ar="بناء حلول برمجية مخصصة قوية وقابلة للتوسع وبنية تحتية سحابية عالية التوفر مصممة لاحتياجات العمل الحديثة.">
          Build robust, scalable custom software solutions and high-availability cloud infrastructure designed for
          modern business needs.
        </p>
      </div>
    </section>

    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2 data-en="Scalable Software Engineering" data-ar="هندسة برمجيات قابلة للتوسع">
              Scalable Software Engineering</h2>
            <p data-en="Our software engineering team specializes in building bespoke applications that solve complex business challenges. From enterprise-grade SaaS platforms to high-performance internal tools, we leverage cloud-native technologies and microservices to ensure your systems remain stable, secure, and ready to grow."
              data-ar="يتخصص فريق هندسة البرمجيات لدينا في بناء تطبيقات مخصصة تحل تحديات العمل المعقدة. من منصات SaaS من فئة المؤسسات إلى الأدوات الداخلية عالية الأداء، نستفيد من التقنيات السحابية الأصلية والخدمات المصغرة لضمان بقاء أنظمتك مستقرة وآمنة وجاهزة للنمو.">
              Our software engineering team specializes in building bespoke applications that solve complex business
              challenges. From enterprise-grade SaaS platforms to high-performance internal tools, we leverage
              cloud-native technologies and microservices to ensure your systems remain stable, secure, and ready to
              grow.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-check-circle" style="color: #ec4899;"></i> <span
                  data-en="Enterprise SaaS Development" data-ar="تطوير SaaS للمؤسسات">Enterprise SaaS Development</span>
              </li>
              <li><i class="fas fa-check-circle" style="color: #ec4899;"></i> <span
                  data-en="Cloud Migration & AWS/Azure/GCP" data-ar="الهجرة السحابية و AWS/Azure/GCP">Cloud Migration &
                  AWS/Azure/GCP</span>
              </li>
              <li><i class="fas fa-check-circle" style="color: #ec4899;"></i> <span
                  data-en="High-Availability Microservices" data-ar="خدمات مصغرة عالية التوافر">High-Availability
                  Microservices</span></li>
              <li><i class="fas fa-check-circle" style="color: #ec4899;"></i> <span data-en="DevOps & CI/CD Pipelines"
                  data-ar="خطوط أنابيب DevOps و CI/CD">DevOps & CI/CD Pipelines</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="{{ asset('assets/images/services/cloud.png') }}"
              alt="Cloud Infrastructure" />
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Ready to Scale Your Infrastructure?" data-ar="مستعد لتوسيع بنيتك التحتية؟">Ready to Scale Your
            Infrastructure?
          </h2>
          <p data-en="Discover how our engineering expertise can accelerate your business growth. Request a free architectural review today."
            data-ar="اكتشف كيف يمكن لخبرتنا الهندسية تسريع نمو عملك. اطلب مراجعة معمارية مجانية اليوم.">Discover how our
            engineering expertise can accelerate your business growth. Request a free architectural review today.</p>
          <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Get Started" data-ar="ابدأ الآن">Get Started</a>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
