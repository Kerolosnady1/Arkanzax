@extends('layouts.app')
@section('title', 'API & System Integration | Arkanzax')

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
      background: radial-gradient(circle at 50% 50%, rgba(245, 158, 11, 0.1) 0%, transparent 70%);
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
      color: #f59e0b;
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
        <span class="hero-badge reveal-up" style="border-color: #f59e0b; color: #f59e0b;">
          <i class="fas fa-plug"></i>&nbsp;
          <span data-en="Our Services" data-ar="خدماتنا">Our Services</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="API & System Integration" data-ar="تكامل الأنظمة والـ API">API &
          System Integration</h1>
        <p class="hero-description reveal-up"
          data-en="Connect your digital ecosystem with seamless API development and system integrations that automate your business workflows."
          data-ar="اربط منظومتك الرقمية بتطوير واجهات برمجة تطبيقات (API) سلسة وتكاملات أنظمة تعمل على أتمتة سير عملك.">
          Connect your digital ecosystem with seamless API development and system integrations that automate your
          business workflows.
        </p>
      </div>
    </section>

    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2 data-en="Seamless System Synergy" data-ar="تآزر الأنظمة السلس">Seamless System Synergy</h2>
            <p data-en="Disconnected systems lead to data silos and manual overhead. Our integration experts build robust API layers and middleware that sync your tools in real-time. From CRM and ERP integrations to custom webhook solutions, we ensure your data flows smoothly across your entire organization."
              data-ar="تؤدي الأنظمة المنفصلة إلى صوامع بيانات وتكاليف يدوية زائدة. يبني خبراء التكامل لدينا طبقات واجهة برمجة تطبيقات (API) قوية وبرمجيات وسيطة لمزامنة أدواتك في الوقت الفعلي. من تكاملات CRM و ERP إلى حلول webhooks المخصصة، نضمن تدفق بياناتك بسلاسة عبر مؤسستك بالكامل.">
              Disconnected systems lead to data silos and manual overhead. Our integration experts build robust API
              layers and middleware that sync your tools in real-time. From CRM and ERP integrations to custom webhook
              solutions, we ensure your data flows smoothly across your entire organization.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-check-circle" style="color: #f59e0b;"></i> <span
                  data-en="Custom API Development (REST/GraphQL)" data-ar="تطوير API مخصص (REST/GraphQL)">Custom API
                  Development (REST/GraphQL)</span></li>
              <li><i class="fas fa-check-circle" style="color: #f59e0b;"></i> <span
                  data-en="Enterprise CRM & ERP Integration" data-ar="تكامل CRM و ERP للمؤسسات">Enterprise CRM & ERP
                  Integration</span></li>
              <li><i class="fas fa-check-circle" style="color: #f59e0b;"></i> <span data-en="Microservices Connectivity"
                  data-ar="ربط الخدمات المصغرة">Microservices Connectivity</span></li>
              <li><i class="fas fa-check-circle" style="color: #f59e0b;"></i> <span
                  data-en="Automated Workflow Engineering" data-ar="هندسة سير العمل المؤتمت">Automated Workflow
                  Engineering</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&q=80&w=1740"
              alt="Service Automation" />
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Integrate Your Digital Stack" data-ar="اربط منظومتك الرقمية">Integrate Your Digital Stack</h2>
          <p data-en="Stop manual data entry and start automating. Let's build a unified ecosystem for your business."
            data-ar="توقف عن إدخال البيانات يدويًا وابدأ في الأتمتة. دعنا نبني منظومة موحدة لعملك.">
            Stop manual data entry and start automating. Let's build a unified ecosystem for your business.</p>
          <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Talk to an Expert" data-ar="تحدث إلى خبير">Talk
            to an Expert</a>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
