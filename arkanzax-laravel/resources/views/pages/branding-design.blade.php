@extends('layouts.app')
@section('title', 'UI/UX Design & Brand Identity | Arkanzax')

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
      background: radial-gradient(circle at 50% 50%, rgba(239, 68, 68, 0.1) 0%, transparent 70%);
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
      color: #ef4444;
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
        <span class="hero-badge reveal-up" style="border-color: #ef4444; color: #ef4444;">
          <i class="fas fa-bezier-curve"></i>&nbsp;
          <span data-en="Our Services" data-ar="خدماتنا">Our Services</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="UI/UX Design & Brand Identity"
          data-ar="تصميم واجهة وتجربة المستخدم والهوية البصرية">UI/UX Design & Brand Identity</h1>
        <p class="hero-description reveal-up"
          data-en="Design digital products that are as beautiful as they are functional. We blend user-centric design with powerful brand storytelling."
          data-ar="تصميم منتجات رقمية جميلة وعملية في آن واحد. نمزج بين التصميم المتمحور حول المستخدم وسرد قصص العلامة التجارية القوي.">
          Design digital products that are as beautiful as they are functional. We blend user-centric design with
          powerful brand storytelling.
        </p>
      </div>
    </section>

    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2 data-en="User-Centric Excellence" data-ar="التميز المتمحور حول المستخدم">User-Centric Excellence</h2>
            <p data-en="Great design is more than just aesthetics; it's about solving problems. Our UI/UX team follows a rigorous research-driven process to understand your users' needs and behaviors. We create high-fidelity prototypes and polished interfaces that provide effortless navigation and build deep brand affinity, ensuring your software is not just used, but loved."
              data-ar="التصميم الرائع هو أكثر من مجرد جماليات؛ إنه يتعلق بحل المشكلات. يتبع فريق UI/UX لدينا عملية صارمة مدفوعة بالبحث لفهم احتياجات وسلوكيات المستخدمين. نحن ننشئ نماذج أولية عالية الدقة وواجهات مصقولة توفر تنقلاً سهلاً وتبني ألفة عميقة بالعلامة التجارية، مما يضمن أن برمجياتك ليست مستخدمة فحسب، بل محبوبة.">
              Great design is more than just aesthetics; it's about solving problems. Our UI/UX team follows a rigorous
              research-driven process to understand your users' needs and behaviors. We create high-fidelity prototypes
              and polished interfaces that provide effortless navigation and build deep brand affinity, ensuring your
              software is not just used, but loved.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-check-circle" style="color: #ef4444;"></i> <span
                  data-en="UX Research & User Personas" data-ar="بحث تجربة المستخدم وشخصيات المستخدمين">UX Research &
                  User Personas</span></li>
              <li><i class="fas fa-check-circle" style="color: #ef4444;"></i> <span
                  data-en="Wireframing & Interactive Prototyping"
                  data-ar="تخطيط الواجهات والنماذج الأولية التفاعلية">Wireframing & Interactive Prototyping</span></li>
              <li><i class="fas fa-check-circle" style="color: #ef4444;"></i> <span
                  data-en="Visual Identity & Design Systems" data-ar="الهوية البصرية وأنظمة التصميم">Visual Identity &
                  Design Systems</span></li>
              <li><i class="fas fa-check-circle" style="color: #ef4444;"></i> <span data-en="High-Fidelity UI Design"
                  data-ar="تصميم واجهة مستخدم عالية الدقة">High-Fidelity UI Design</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="https://images.unsplash.com/photo-1572044162444-ad60f128bdea?auto=format&fit=crop&q=80&w=2340"
              alt="Creative Design" />
          </div>
        </div>
      </div>
    </section>

    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Design Your Digital Future" data-ar="صمم مستقبلك الرقمي">Design Your Digital Future</h2>
          <p data-en="Ready to create a user experience that sets you apart? Let's design something extraordinary."
            data-ar="هل أنت مستعد لإنشاء تجربة مستخدم تميزك؟ دعنا نصمم شيئاً استثنائياً.">Ready to
            create a user experience that sets you apart? Let's design something extraordinary.</p>
          <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Get Started" data-ar="ابدأ الآن">Get
            Started</a>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
