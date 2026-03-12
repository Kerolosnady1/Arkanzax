@extends('layouts.app')
@section('title', 'AI & Data Engineering | Arkanzax')

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
      background: radial-gradient(circle at 50% 50%, rgba(59, 158, 245, 0.1) 0%, transparent 70%);
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
      color: #10b981;
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
        <span class="hero-badge reveal-up" style="border-color: #10b981; color: #10b981;">
          <i class="fas fa-brain"></i>&nbsp;
          <span data-en="Our Services" data-ar="خدماتنا">Our Services</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="AI & Data Engineering" data-ar="الذكاء الاصطناعي وهندسة البيانات">AI
          & Data Engineering</h1>
        <p class="hero-description reveal-up"
          data-en="Unlock the power of your data with advanced AI models and scalable data engineering pipelines that drive intelligent automation."
          data-ar="أطلق العنان لقوة بياناتك باستخدام نماذج الذكاء الاصطناعي المتقدمة وخطوط أنابيب هندسة البيانات القابلة للتوسع التي تحفز الأتمتة الذكية.">
          Unlock the power of your data with advanced AI models and scalable data engineering pipelines that drive
          intelligent automation.
        </p>
      </div>
    </section>

    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2 data-en="Intelligent Data Architecture" data-ar="معمارية البيانات الذكية">Intelligent Data Architecture
            </h2>
            <p data-en="Data is only valuable if it's actionable. Our data engineering team builds high-performance pipelines that ingest, process, and store massive datasets with ease. We then leverage machine learning and AI to uncover deep insights and automate complex decision-making processes, giving your business a significant competitive edge."
              data-ar="البيانات ذات قيمة فقط إذا كانت قابلة للتنفيذ. يبني فريق هندسة البيانات لدينا خطوط أنابيب عالية الأداء تستوعب وتعالج وتخزن مجموعات البيانات الضخمة بسهولة. ثم نستفيد من تعلم الآلة والذكاء الاصطناعي للكشف عن رؤى عميقة وأتمتة عمليات صنع القرار المعقدة، مما يمنح عملك ميزة تنافسية كبيرة.">
              Data is only valuable if it's actionable. Our data engineering team builds high-performance pipelines that
              ingest, process, and store massive datasets with ease. We then leverage machine learning and AI to uncover
              deep insights and automate complex decision-making processes, giving your business a significant
              competitive edge.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-check-circle" style="color: #10b981;"></i> <span
                  data-en="Custom Machine Learning Models" data-ar="نماذج تعلم آلة مخصصة">Custom Machine Learning
                  Models</span></li>
              <li><i class="fas fa-check-circle" style="color: #10b981;"></i> <span data-en="Big Data Engineering & ETL"
                  data-ar="هندسة البيانات الضخمة و ETL">Big Data Engineering & ETL</span>
              </li>
              <li><i class="fas fa-check-circle" style="color: #10b981;"></i> <span
                  data-en="Predictive Analytics & Forecasting" data-ar="التحليلات التنبؤية والتوقعات">Predictive
                  Analytics & Forecasting</span></li>
              <li><i class="fas fa-check-circle" style="color: #10b981;"></i> <span
                  data-en="AI-Driven Process Automation" data-ar="أتمتة العمليات المدفوعة بالذكاء الاصطناعي">AI-Driven
                  Process Automation</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=2340"
              alt="Data Analytics" />
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Unleash Your Data's Potential" data-ar="أطلق العنان لإمكانيات بياناتك">Unleash Your Data's
            Potential
          </h2>
          <p data-en="Ready to transform your data into a strategic asset? Let's build your AI future today."
            data-ar="مستعد لتحويل بياناتك إلى أصل استراتيجي؟ دعنا نبني مستقبل الذكاء الاصطناعي الخاص بك اليوم.">Ready to
            transform your data into a strategic asset? Let's build your AI future today.</p>
          <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Request Quote" data-ar="طلب عرض سعر">Request
            Quote</a>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
