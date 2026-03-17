@extends('layouts.app')

@section('content')

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
  <section class="hero-section" id="hero">
    <div class="hero-bg-overlay"></div>
    <div class="hero-particles"></div>

    <div class="container">
      <div class="hero-content">
        <!-- Left Text -->
        <div class="hero-text">
          <span class="hero-badge">
            <i class="fas fa-bolt"></i>&nbsp;
            <span data-en="AI-Powered Software House" data-ar="شركة برمجيات مدعومة بالذكاء الاصطناعي">AI-Powered
              Software House</span>
          </span>

          <h1 class="hero-title">
            <span data-en="Grow Your Brand" data-ar="نمّ علامتك التجارية">Grow Your Brand</span><br />
            <span class="gradient-text" data-en="With Smarter Software Solutions" data-ar="بحلول برمجية أكثر ذكاءً">With
              Smarter
              Software Solutions</span>
          </h1>

          <p class="hero-description"
            data-en="We combine AI technology with creative strategy to deliver software house campaigns that actually convert. Data-driven, results-focused, and built for scale."
            data-ar="نجمع تقنية الذكاء الاصطناعي مع الاستراتيجية الإبداعية لتقديم حلول برمجية تحقق نتائج حقيقية. مدفوعة بالبيانات، مركّزة على النتائج، ومصمّمة للنمو.">
            We combine AI technology with creative strategy to deliver software house campaigns that actually convert.
            Data-driven, results-focused, and built for scale.
          </p>

          <div class="hero-buttons">
            <a href="#services" class="btn btn-primary" data-en="Explore Services" data-ar="استكشف الخدمات">Explore
              Services</a>
            <a href="#testi-sec" class="btn btn-outline-white" data-en="View Success Stories"
              data-ar="اقرأ قصص النجاح">View Success Stories</a>
          </div>

          <div class="hero-stats">
            <div class="stat-item">
              <span class="stat-num">500+</span>
              <span class="stat-label" data-en="Clients Served" data-ar="عميل تم خدمته">Clients Served</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
              <span class="stat-num">98%</span>
              <span class="stat-label" data-en="Client Retention" data-ar="نسبة الاحتفاظ بالعملاء">Client
                Retention</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item">
              <span class="stat-num">3x</span>
              <span class="stat-label" data-en="Avg. ROI Increase" data-ar="متوسط زيادة العائد">Avg. ROI Increase</span>
            </div>
          </div>
        </div>

        <!-- Right Image -->
        <div class="hero-image hero-img-wrapper">
          <div class="hero-shape shape-1"></div>
          <div class="hero-shape shape-2"></div>
          <img src="{{ asset('assets/hero-img.png') }}" alt="AI Software House Dashboard" class="hero-main-img" width="600"
            height="500" />

          <!-- Floating cards -->
          <div class="floating-card card-1">
            <i class="fas fa-chart-line"></i>
            <div>
              <strong>+247%</strong>
              <span style="color: #000000;" data-en="Traffic Growth" data-ar="نمو الزيارات">Traffic Growth</span>
            </div>
          </div>
          <div class="floating-card card-2">
            <i class="fas fa-robot"></i>
            <div>
              <strong>AI</strong>
              <span style="color: #000000;" data-en="Campaign Optimized" data-ar="حملة محسّنة">Campaign Optimized</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="scroll-indicator" aria-hidden="true">
      <div class="scroll-dot"></div>
    </div>
  </section>

  <!-- ═══════════════════════════ BRANDS ═══════════════════════════ -->
  @if(count($clients) > 0)
  <section class="brands-section">
    <div class="container text-center">
      <p class="brands-title reveal-up" data-en="Trusted by Leading Brands Worldwide"
        data-ar="موثوق به من قبل العلامات التجارية الرائدة">
        Trusted by Leading Brands Worldwide
      </p>
      <div class="title-hr">
        <span class="hr-line"></span>
        <span class="hr-dot"></span>
        <span class="hr-line"></span>
      </div>
      <div class="brands-grid">
        @foreach($clients as $c)
          <div class="brand-logo reveal-card">
            @php $brandImg = data_get($c, 'image', data_get($c, 'img')); @endphp
            @if(!empty($brandImg))
              <img src="{{ $brandImg }}" alt="{{ data_get($c, 'title_en', data_get($c, 'name_en', 'Brand')) }}" style="max-height: 40px; filter: brightness(0) invert(1); opacity: 0.7;">
            @else
              <span class="brand-placeholder">{{ data_get($c, 'title_en', data_get($c, 'name_en', 'Client')) }}</span>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  <!-- ═══════════════════════════ PRODUCTS ═══════════════════════════ -->
  <section class="products-section" id="products">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="sub-badge" data-en="Our Innovation" data-ar="ابتكاراتنا">Our Innovation</span>
        <h2 class="section-title" data-en="Exclusive Software Products" data-ar="منتجات برمجية حصرية">
          Exclusive Software Products
        </h2>
        <p class="section-subtitle" data-en="Scalable, secure, and built to solve specific business challenges."
          data-ar="قابلة للتوسع، آمنة، ومصممة لحل تحديات تجارية محددة.">
          Scalable, secure, and built to solve specific business challenges.
        </p>
      </div>

      <div class="products-grid">
        @forelse($productsList as $item)
          <div class="product-showcase-card reveal-card" onclick="window.location.href='{{ route('items.show', $item['slug_en']) }}'">
            <div class="product-showcase-icon">
              @php
                  $iconMap = [
                      'property-management' => 'fa-building',
                      'marketing-tools-smes' => 'fa-bullhorn',
                      'e-commerce-product' => 'fa-mobile-alt',
                      'product-crm-pos' => 'fa-cash-register'
                  ];
                  $pIcon = $iconMap[$item['slug_en']] ?? 'fa-cube';
              @endphp
              <i class="fas {{ $pIcon }}"></i>
            </div>
            <h3>
              @if(app()->getLocale() == 'ar')
                  {{ $item['title_ar'] ?? $item['title_en'] }}
              @else
                  {{ $item['title_en'] ?? $item['title_ar'] }}
              @endif
            </h3>
            <p>
              @if(app()->getLocale() == 'ar')
                  {!! strip_tags($item['short_description_ar'] ?? $item['short_description_en']) !!}
              @else
                  {!! strip_tags($item['short_description_en'] ?? $item['short_description_ar']) !!}
              @endif
            </p>
            @php
                // Static features fallback or map from description if needed
                $features = ['Premium Support', 'Cloud Integration', 'AI Powered'];
                if($item['slug_en'] == 'property-management') $features = ['Listing Management', 'Tenant Tracking', 'Auto Contracts'];
                if($item['slug_en'] == 'marketing-tools-smes') $features = ['Growth Analytics', 'Ad Automation', 'SME Focused'];
                if($item['slug_en'] == 'e-commerce-product') $features = ['Native Checkout', 'Live Inventory', 'Multi-Store'];
                if($item['slug_en'] == 'product-crm-pos') $features = ['Smart POS', 'Inventory Sync', 'Sales Analytics'];
            @endphp
            <ul class="product-features-list">
              @foreach($features as $f)
                  <li><i class="fas fa-check"></i> <span>{{ $f }}</span></li>
              @endforeach
            </ul>
            <a href="{{ route('items.show', $item['slug_en']) }}" class="btn-product-learn">
              <span data-en="Learn More" data-ar="تعرف على المزيد">Learn More</span> <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        @empty
          <!-- Manual fallbacks if dashboard is empty -->
          <!-- Product 1 -->
          <div class="product-showcase-card reveal-card" onclick="window.location.href='{{ route('product.pms') }}'">
            <div class="product-showcase-icon">
              <i class="fas fa-building"></i>
            </div>
            <h3 data-en="Property Management" data-ar="إدارة العقارات">Property Management</h3>
            <p data-en="A comprehensive platform for real estate professionals to manage listings, tenants, and contracts with ease."
              data-ar="منصة شاملة لمحترفي العقارات لإدارة القوائم والمستأجرين والعقود بسهولة.">
              A comprehensive platform for real estate professionals to manage listings, tenants, and contracts with ease.
            </p>
            <ul class="product-features-list">
              <li><i class="fas fa-check"></i> <span data-en="Automated Invoicing" data-ar="الفواتير الآلية">Automated Invoicing</span></li>
              <li><i class="fas fa-check"></i> <span data-en="Tenant Portal" data-ar="بوابة المستأجر">Tenant Portal</span></li>
              <li><i class="fas fa-check"></i> <span data-en="Inventory Tracking" data-ar="تتبع المخزون">Inventory Tracking</span></li>
            </ul>
            <a href="{{ route('product.pms') }}" class="btn-product-learn" data-en="Explore Product" data-ar="استكشف المنتج">
              <span data-en="Explore Product" data-ar="استكشف المنتج">Explore Product</span> <i class="fas fa-arrow-right"></i>
            </a>
          </div>
          <!-- Product 2 -->
          <div class="product-showcase-card reveal-card" onclick="window.location.href='{{ route('product.marketing') }}'">
            <div class="product-showcase-icon">
              <i class="fas fa-bullhorn"></i>
            </div>
            <h3 data-en="Marketing Tools SMEs" data-ar="أدوات تسويق">Marketing Tools SMEs</h3>
            <p data-en="Powerful automation and growth tools designed specifically for small and medium enterprises."
              data-ar="أدوات أتمتة ونمو قوية مصممة خصيصاً للشركات الصغيرة والمتوسطة.">
              Powerful automation and growth tools designed specifically for small and medium enterprises.
            </p>
            <ul class="product-features-list">
              <li><i class="fas fa-check"></i> <span data-en="Lead Generation" data-ar="توليد العملاء">Lead Generation</span></li>
              <li><i class="fas fa-check"></i> <span data-en="Campaign Analytics" data-ar="تحليلات الحملات">Campaign Analytics</span></li>
              <li><i class="fas fa-check"></i> <span data-en="CRM Integration" data-ar="تكامل CRM">CRM Integration</span></li>
            </ul>
            <a href="{{ route('product.marketing') }}" class="btn-product-learn" data-en="Explore Product" data-ar="استكشف المنتج">
              <span data-en="Explore Product" data-ar="استكشف المنتج">Explore Product</span> <i class="fas fa-arrow-right"></i>
            </a>
          </div>
          <div class="product-showcase-card reveal-card" onclick="window.location.href='{{ route('product.ecommerce') }}'">
            <div class="product-showcase-icon">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <h3 data-en="E-Commerce Product" data-ar="تجارة متنقلة">E-Commerce Product</h3>
            <p data-en="Mobile-first shopping experiences that convert visitors into loyal customers on any device."
              data-ar="تجارب منصة تجارة متكاملة تحول الزوار إلى عملاء مخلصين على أي جهاز.">
              Mobile-first shopping experiences that convert visitors into loyal customers on any device.
            </p>
            <ul class="product-features-list">
              <li><i class="fas fa-check"></i> <span data-en="Fast Checkout" data-ar="دفع سريع">Fast Checkout</span></li>
              <li><i class="fas fa-check"></i> <span data-en="Push Notifications" data-ar="تنبيهات فورية">Push Notifications</span></li>
              <li><i class="fas fa-check"></i> <span data-en="Offline Mode" data-ar="وضع عدم الاتصال">Offline Mode</span></li>
            </ul>
            <a href="{{ route('product.ecommerce') }}" class="btn-product-learn" data-en="Explore Product" data-ar="استكشف المنتج">
              <span data-en="Explore Product" data-ar="استكشف المنتج">Explore Product</span> <i class="fas fa-arrow-right"></i>
            </a>
          </div>
          <!-- Product 4 -->
          <div class="product-showcase-card reveal-card" onclick="window.location.href='{{ route('product.crm') }}'">
            <div class="product-showcase-icon">
              <i class="fas fa-cash-register"></i>
            </div>
            <h3 data-en="CRM & POS" data-ar="نظام البيع و CRM">CRM & POS</h3>
            <p data-en="Scale your retail or service business with our smart CRM and cloud-based POS system."
              data-ar="وسع نطاق تجارتك بالتجزئة أو خدماتك من خلال نظام CRM الذكي ونظام POS السحابي الخاص بنا.">
              Scale your retail or service business with our smart CRM and cloud-based POS system.
            </p>
            <ul class="product-features-list">
              <li><i class="fas fa-check"></i> <span data-en="Smart POS" data-ar="نقاط بيع ذكية">Smart POS</span></li>
              <li><i class="fas fa-check"></i> <span data-en="Inventory Sync" data-ar="تزامن المخزون">Inventory Sync</span></li>
              <li><i class="fas fa-check"></i> <span data-en="Sales Analytics" data-ar="تحليلات المبيعات">Sales Analytics</span></li>
            </ul>
            <a href="{{ route('product.crm') }}" class="btn-product-learn" data-en="Explore Product" data-ar="استكشف المنتج">
              <span data-en="Explore Product" data-ar="استكشف المنتج">Explore Product</span> <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════ MARQUEE 1 ═══════════════════════════ -->
  <div class="marquee-section" aria-hidden="true">
    <div class="marquee-track">
      <div class="marquee-content">
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="SEO Optimization" data-ar="تحسين محركات البحث">SEO Optimization</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Paid Advertising" data-ar="الإعلانات المدفوعة">Paid Advertising</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Social Media Software" data-ar="برمجيات التواصل الاجتماعي">Social Media Software</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Content Strategy" data-ar="استراتيجية المحتوى">Content Strategy</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Email Campaigns" data-ar="حملات البريد الإلكتروني">Email Campaigns</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Brand Identity" data-ar="هوية العلامة التجارية">Brand Identity</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Analytics & Insights" data-ar="التحليلات والرؤى">Analytics & Insights</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Conversion Rate Optimization" data-ar="تحسين معدل التحويل">Conversion Rate Optimization</span></span>
        <!-- Duplicate for loop -->
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="SEO Optimization" data-ar="تحسين محركات البحث">SEO Optimization</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Paid Advertising" data-ar="الإعلانات المدفوعة">Paid Advertising</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Social Media Software" data-ar="برمجيات التواصل الاجتماعي">Social Media Software</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Content Strategy" data-ar="استراتيجية المحتوى">Content Strategy</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Email Campaigns" data-ar="حملات البريد الإلكتروني">Email Campaigns</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Brand Identity" data-ar="هوية العلامة التجارية">Brand Identity</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Analytics & Insights" data-ar="التحليلات والرؤى">Analytics & Insights</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Conversion Rate Optimization" data-ar="تحسين معدل التحويل">Conversion Rate Optimization</span></span>
      </div>
    </div>
  </div>

  <!-- ═══════════════════════════ CHALLENGES ═══════════════════════════ -->
  <section class="challenges-section" id="about">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="sub-badge light" data-en="Common Pain Points" data-ar="نقاط الألم الشائعة">Common Pain
          Points</span>
        <h2 class="section-title light" data-en="Software Development Challenges You Face"
          data-ar="تحديات تطوير البرمجيات التي تواجهها">
          Software Development Challenges You Face
        </h2>
        <p class="section-subtitle" style="color:rgba(255,255,255,.6);"
          data-en="We understand every obstacle holding your brand back."
          data-ar="نفهم كل عقبة تعيق نمو علامتك التجارية.">
          We understand every obstacle holding your brand back.
        </p>
      </div>

      <div class="challenges-grid">
        @php
            $challengeColors = ['#3b82f6', '#ec4899', '#8b5cf6', '#10b981', '#f59e0b', '#ef4444'];
            $challengeIcons = ['fa-tachometer-alt', 'fa-fingerprint', 'fa-layer-group', 'fa-shield-alt', 'fa-history', 'fa-microchip'];
        @endphp
        @forelse($challengesList as $index => $item)
          <!-- Dynamic Challenge Card -->
          <div class="challenge-card reveal-card" tabindex="0">
            <div class="challenge-icon">
              <div class="icon-glow"></div>
              @php
                  $color = $challengeColors[$index % count($challengeColors)];
                  $cIcon = $challengeIcons[$index % count($challengeIcons)];
                  // You can override icon if stored in DB
                  if(isset($item['icon']) && !empty($item['icon'])) $cIcon = $item['icon'];
              @endphp
              <i class="fas {{ $cIcon }}" style="font-size: 2rem; color: {{ $color }};"></i>
            </div>
            <div class="challenge-content">
              <h3>
                @if(app()->getLocale() == 'ar')
                    {{ $item['title_ar'] ?? $item['title_en'] }}
                @else
                    {{ $item['title_en'] ?? $item['title_ar'] }}
                @endif
              </h3>
              <p>
                @if(app()->getLocale() == 'ar')
                    {!! strip_tags($item['short_description_ar'] ?? $item['short_description_en']) !!}
                @else
                    {!! strip_tags($item['short_description_en'] ?? $item['short_description_ar']) !!}
                @endif
              </p>
            </div>
          </div>
        @empty
          <!-- Card 1 -->
          <div class="challenge-card reveal-card" tabindex="0">
            <div class="challenge-icon">
              <div class="icon-glow"></div>
              <i class="fas fa-tachometer-alt" style="font-size: 2rem; color: #3b82f6;"></i>
            </div>
            <div class="challenge-content">
              <h3 data-en="Performance Bottlenecks" data-ar="اختناقات الأداء">Performance Bottlenecks</h3>
              <p data-en="Slow loading times costing you users? Our performance engineers optimize every byte to ensure lightning-fast speed and reliability."
                data-ar="هل تكلفك أوقات التحميل البطيئة مستخدمين؟ يقوم مهندسو الأداء لدينا بتحسين كل بايت لضمان السرعة والموثوقية الفائقة.">
                Slow loading times costing you users? Our performance engineers optimize every byte to ensure lightning-fast speed and reliability.</p>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="challenge-card reveal-card" tabindex="0">
            <div class="challenge-icon">
              <div class="icon-glow"></div>
              <i class="fas fa-fingerprint" style="font-size: 2rem; color: #ec4899;"></i>
            </div>
            <div class="challenge-content">
              <h3 data-en="High User Churn" data-ar="معدل ارتداد المستخدمين العالي">High User Churn</h3>
              <p data-en="Users leaving your app too soon? We use deep UX analysis and A/B testing to create engaging, frictionless experiences."
                data-ar="هل يغادر المستخدمون تطبيقك بسرعة كبيرة؟ نستخدم تحليل UX العميق واختبار A/B لإنشاء تجارب جذابة وسلسة.">
                Users leaving your app too soon? We use deep UX analysis and A/B testing to create engaging, frictionless experiences.</p>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="challenge-card reveal-card" tabindex="0">
            <div class="challenge-icon">
              <div class="icon-glow"></div>
              <i class="fas fa-layer-group" style="font-size: 2rem; color: #8b5cf6;"></i>
            </div>
            <div class="challenge-content">
              <h3 data-en="Scalability Issues" data-ar="مشاكل قابلية التوسع">Scalability Issues</h3>
              <p data-en="System crashing under heavy load? We build cloud-native architectures that scale horizontally to handle millions of users."
                data-ar="هل يتوقف النظام تحت الحمل الثقيل؟ نحن نبني معماريات سحابية أصلية تتوسع أفقياً للتعامل مع ملايين المستخدمين.">
                System crashing under heavy load? We build cloud-native architectures that scale horizontally to handle millions of users.</p>
            </div>
          </div>
          <!-- Card 4 -->
          <div class="challenge-card reveal-card" tabindex="0">
            <div class="challenge-icon">
              <div class="icon-glow"></div>
              <i class="fas fa-shield-alt" style="font-size: 2rem; color: #10b981;"></i>
            </div>
            <div class="challenge-content">
              <h3 data-en="Security Gaps" data-ar="الثغرات الأمنية">Security Gaps</h3>
              <p data-en="Worried about data breaches? We implement zero-trust security modules and conduct rigorous penetration testing to protect your data."
                data-ar="قلق بشأن اختراقات البيانات؟ نحن نطبق وحدات أمان صفرية الثقة ونجري اختبارات اختراق صارمة لحماية بياناتك.">
                Worried about data breaches? We implement zero-trust security modules and conduct rigorous penetration testing to protect your data.</p>
            </div>
          </div>
          <!-- Card 5 -->
          <div class="challenge-card reveal-card" tabindex="0">
            <div class="challenge-icon">
              <div class="icon-glow"></div>
              <i class="fas fa-history" style="font-size: 2rem; color: #f59e0b;"></i>
            </div>
            <div class="challenge-content">
              <h3 data-en="Technical Debt" data-ar="الديون التقنية">Technical Debt</h3>
              <p data-en="Legacy systems holding you back? We specialize in code modernization and refactoring to make your software maintainable and fast."
                data-ar="هل تعيقك الأنظمة القديمة؟ نحن نتخصص في تحديث الشيفرة وإعادة هيكلتها لجعل برمجياتك قابلة للصيانة وسريعة.">
                Legacy systems holding you back? We specialize in code modernization and refactoring to make your software maintainable and fast.</p>
            </div>
          </div>
          <!-- Card 6 -->
          <div class="challenge-card reveal-card" tabindex="0">
            <div class="challenge-icon">
              <div class="icon-glow"></div>
              <i class="fas fa-microchip" style="font-size: 2rem; color: #ef4444;"></i>
            </div>
            <div class="challenge-content">
              <h3 data-en="Data Inefficiency" data-ar="عدم كفاءة البيانات">Data Inefficiency</h3>
              <p data-en="Unstructured data causing confusion? We build unified data engineering pipelines to turn chaos into clear, actionable intelligence."
                data-ar="هل تسبب البيانات غير المهيكلة ارتباكاً؟ نحن نبني خطوط أنابيب هندسة بيانات موحدة لتحويل الفوضى إلى ذكاء واضح وقابل للتنفيذ.">
                Unstructured data causing confusion? We build unified data engineering pipelines to turn chaos into clear, actionable intelligence.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════ WHY ARKANZAX ═══════════════════════════ -->
  <section class="why-section">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="sub-badge" data-en="The Competitive Edge" data-ar="الميزة التنافسية">The Competitive Edge</span>
        <h2 class="section-title" data-en="Why Choose Arkanzax?" data-ar="لماذا تختار أركانزاكس؟">Why Choose Arkanzax?
        </h2>
        <p class="section-subtitle" data-en="See how we stack up against traditional agencies and self-serve tools."
          data-ar="انظر كيف نقارن بالوكالات التقليدية وأدوات الخدمة الذاتية.">See how we stack up against traditional
          agencies and self-serve tools.</p>
      </div>

      <div class="why-table-wrapper reveal-up">
        <div class="why-table">
          <div class="why-table-header">
            <div class="why-col-feature"></div>
            <div class="why-col"><span class="col-header-badge arkanzax-badge">Arkanzax</span></div>
            <div class="why-col"><span class="col-header-badge agency-badge" data-en="Traditional Agency"
                data-ar="وكالة تقليدية">Traditional Agency</span></div>
            <div class="why-col"><span class="col-header-badge self-badge" data-en="Self-Serve Tools"
                data-ar="أدوات ذاتية">Self-Serve Tools</span></div>
          </div>
          <div class="why-table-body">
            <div class="why-row">
              <div class="why-feature-label" data-en="AI-Driven Strategy" data-ar="استراتيجية ذكاء اصطناعي">AI-Driven
                Strategy</div>
              <div class="why-cell arkanzax-cell"><i class="fas fa-check-circle"></i> <span
                  data-en="Full AI Integration" data-ar="تكامل كامل بالذكاء الاصطناعي">Full AI Integration</span></div>
              <div class="why-cell agency-cell"><i class="fas fa-minus-circle"></i> <span data-en="Limited"
                  data-ar="محدود">Limited</span></div>
              <div class="why-cell self-cell"><i class="fas fa-times-circle"></i> <span data-en="None"
                  data-ar="لا يوجد">None</span></div>
            </div>
            <div class="why-row">
              <div class="why-feature-label" data-en="Real-Time Reporting" data-ar="تقارير فورية">Real-Time Reporting
              </div>
              <div class="why-cell arkanzax-cell"><i class="fas fa-check-circle"></i> <span data-en="Live Dashboards"
                  data-ar="لوحات مراقبة مباشرة">Live Dashboards</span></div>
              <div class="why-cell agency-cell"><i class="fas fa-minus-circle"></i> <span data-en="Monthly Reports"
                  data-ar="تقارير شهرية">Monthly Reports</span></div>
              <div class="why-cell self-cell"><i class="fas fa-check-circle"></i> <span data-en="Basic Reports"
                  data-ar="تقارير أساسية">Basic Reports</span></div>
            </div>
            <div class="why-row">
              <div class="why-feature-label" data-en="Dedicated Team" data-ar="فريق مخصص">Dedicated Team</div>
              <div class="why-cell arkanzax-cell"><i class="fas fa-check-circle"></i> <span data-en="Yes, always"
                  data-ar="نعم، دائماً">Yes, always</span></div>
              <div class="why-cell agency-cell"><i class="fas fa-minus-circle"></i> <span data-en="Shared resources"
                  data-ar="موارد مشتركة">Shared resources</span></div>
              <div class="why-cell self-cell"><i class="fas fa-times-circle"></i> <span data-en="No team"
                  data-ar="لا فريق">No team</span></div>
            </div>
            <div class="why-row">
              <div class="why-feature-label" data-en="Cost Efficiency" data-ar="كفاءة التكلفة">Cost Efficiency</div>
              <div class="why-cell arkanzax-cell"><i class="fas fa-check-circle"></i> <span data-en="High ROI"
                  data-ar="عائد استثمار عالٍ">High ROI</span></div>
              <div class="why-cell agency-cell"><i class="fas fa-times-circle"></i> <span data-en="Expensive"
                  data-ar="مكلف">Expensive</span></div>
              <div class="why-cell self-cell"><i class="fas fa-minus-circle"></i> <span data-en="Time-consuming"
                  data-ar="يستغرق وقتاً">Time-consuming</span></div>
            </div>
            <div class="why-row">
              <div class="why-feature-label" data-en="Scalability" data-ar="قابلية التوسع">Scalability</div>
              <div class="why-cell arkanzax-cell"><i class="fas fa-check-circle"></i> <span data-en="Fully scalable"
                  data-ar="قابل للتوسع بالكامل">Fully scalable</span></div>
              <div class="why-cell agency-cell"><i class="fas fa-minus-circle"></i> <span data-en="Slow to scale"
                  data-ar="يتوسع ببطء">Slow to scale</span></div>
              <div class="why-cell self-cell"><i class="fas fa-minus-circle"></i> <span data-en="Platform-limited"
                  data-ar="محدود بالمنصة">Platform-limited</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════ SERVICES ═══════════════════════════ -->
  <section class="services-header-section" id="services">
    <div class="services-bg-shapes" aria-hidden="true">
      <div class="bg-circle c1"></div>
      <div class="bg-circle c2"></div>
      <div class="bg-circle c3"></div>
    </div>
    <div class="container text-center">
      <span class="services-badge" data-en="What We Offer" data-ar="ما نقدمه">What We Offer</span>
      <h2 class="services-title reveal-up" data-en="Full-Stack Software House Services"
        data-ar="خدمات شركة البرمجيات الشاملة">
        Full-Stack Software House Services
      </h2>
      <p class="section-subtitle reveal-up" style="color:rgba(255,255,255,.6);"
        data-en="From strategy to execution, every service is powered by AI and delivered by experts."
        data-ar="من الاستراتيجية إلى التنفيذ، كل خدمة مدعومة بالذكاء الاصطناعي ومقدمة من خبراء.">
        From strategy to execution, every service is powered by AI and delivered by experts.
      </p>
      <div class="services-underline" style="margin-top:24px;"></div>
    </div>
  </section>

  <section class="services-grid-section">
    <div class="container">
      <div class="services-grid">
        @forelse($servicesList as $index => $o)
          @php
              // Map icons/gradients to stay premium like the static design
              $gradients = [
                  'linear-gradient(135deg,#3b9ef5,#1a6ec5)', // Blue
                  'linear-gradient(135deg,#ec4899,#be185d)', // Pink
                  'linear-gradient(135deg,#8b5cf6,#6d28d9)', // Purple
                  'linear-gradient(135deg,#f59e0b,#d97706)', // Orange
                  'linear-gradient(135deg,#10b981,#059669)', // Teal
                  'linear-gradient(135deg,#ef4444,#dc2626)', // Red
              ];
              $gradient = $gradients[$index % count($gradients)];
              $icon = $o['icon'] ?? 'fa-cube';
              // Check if it starts with fa-
              if (strpos($icon, 'fa-') !== 0) $icon = 'fa-' . $icon;
              
              $url = isset($o['slug_en']) && !empty($o['slug_en']) ? route('items.show', $o['slug_en']) : '#';
          @endphp
          <div class="service-card reveal-card" onclick="window.location.href='{{ $url }}'" style="cursor: pointer;">
            <div class="service-icon" style="background: {{ $gradient }};">
              <i class="fas {{ $icon }}"></i>
            </div>
            <h3>
                @if(app()->getLocale() == 'ar')
                    {{ $o['title_ar'] ?? $o['title_en'] ?? '' }}
                @else
                    {{ $o['title_en'] ?? $o['title_ar'] ?? '' }}
                @endif
            </h3>
            <p>
                @if(app()->getLocale() == 'ar')
                    {!! strip_tags($o['short_description_ar'] ?? $o['short_description_en'] ?? '') !!}
                @else
                    {!! strip_tags($o['short_description_en'] ?? $o['short_description_ar'] ?? '') !!}
                @endif
            </p>
            <a href="{{ $url }}" class="service-link" data-en="Learn More →" data-ar="اعرف المزيد ←">Learn More →</a>
          </div>
        @empty
          <!-- Manual fallbacks if dashboard is empty -->
          <div class="service-card reveal-card">
            <div class="service-icon" style="background:linear-gradient(135deg,#3b9ef5,#1a6ec5);">
              <i class="fas fa-code"></i>
            </div>
            <h3 data-en="Web Development & Technical SEO" data-ar="تطوير الويب وتحسين محركات البحث التقني">Web Development
              & Technical SEO</h3>
            <p data-en="Build high-performance, scalable web applications using modern frameworks and optimized for speed, security, and search visibility."
              data-ar="بناء تطبيقات ويب عالية الأداء وقابلة للتوسع باستخدام أطر عمل حديثة ومحسنة للسرعة والأمان وظهور البحث.">
              Build high-performance, scalable web applications using modern frameworks and optimized for speed, security,
              and search visibility.</p>
            <a href="{{ route('seo') }}" class="service-link" data-en="Learn More →" data-ar="اعرف المزيد ←">Learn More
              →</a>
          </div>

          <div class="service-card reveal-card">
            <div class="service-icon" style="background:linear-gradient(135deg,#ec4899,#be185d);">
              <i class="fas fa-server"></i>
            </div>
            <h3 data-en="Custom Software & Cloud" data-ar="البرمجيات المخصصة والسحابية">Custom Software & Cloud</h3>
            <p data-en="Tailor-made software solutions and robust cloud infrastructure to streamline your business operations and ensure 99.9% uptime."
              data-ar="حلول برمجية مخصصة وبنية تحتية سحابية قوية لتبسيط عملياتك التجارية وضمان وقت تشغيل بنسبة 99.9٪.">
              Tailor-made software solutions and robust cloud infrastructure to streamline your business operations and
              ensure 99.9% uptime.
            </p>
            <a href="{{ route('ads') }}" class="service-link" data-en="Learn More →" data-ar="اعرف المزيد ←">Learn More →</a>
          </div>

          <div class="service-card reveal-card">
            <div class="service-icon" style="background:linear-gradient(135deg,#8b5cf6,#6d28d9);">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <h3 data-en="Mobile App Development" data-ar="تطوير تطبيقات الجوال">Mobile App Development</h3>
            <p data-en="Create stunning iOS and Android applications with native-like performance and user-centric features that keep your users coming back."
              data-ar="إنشاء تطبيقات iOS و Android مذهلة بأداء يشبه التطبيقات الأصلية وميزات تركز على المستخدم تجعل مستخدميك يعودون مرة أخرى.">
              Create
              stunning iOS and Android applications with native-like performance and user-centric features that keep your
              users coming back.
            </p>
            <a href="{{ route('social') }}" class="service-link" data-en="Learn More →" data-ar="اعرف المزيد ←">Learn More
              →</a>
          </div>

          <div class="service-card reveal-card">
            <div class="service-icon" style="background:linear-gradient(135deg,#f59e0b,#d97706);">
              <i class="fas fa-sync-alt"></i>
            </div>
            <h3 data-en="API & System Integration" data-ar="تكامل الأنظمة وواجهة برمجة التطبيقات">API & System Integration
            </h3>
            <p data-en="Connect your disparate systems and automate workflows with seamless API integrations that save time and eliminate data silos."
              data-ar="قم بتوصيل أنظمتك المتباينة وأتمتة سير العمل من خلال تكاملات واجهة برمجة التطبيقات السلسة التي توفر الوقت وتزيل صوامع البيانات.">
              Connect your disparate systems and automate workflows with seamless API integrations that save time and
              eliminate data silos.</p>
            <a href="{{ route('email') }}" class="service-link" data-en="Learn More →" data-ar="اعرف المزيد ←">Learn More
              →</a>
          </div>

          <div class="service-card reveal-card">
            <div class="service-icon" style="background:linear-gradient(135deg,#10b981,#059669);">
              <i class="fas fa-brain"></i>
            </div>
            <h3 data-en="AI & Data Engineering" data-ar="الذكاء الاصطناعي وهندسة البيانات">AI & Data Engineering</h3>
            <p data-en="Leverage machine learning and advanced data pipelines to turn your raw data into predictive insights and automated intelligence."
              data-ar="استفد من التعلم الآلي وخطوط أنابيب البيانات المتقدمة لتحويل بياناتك الخام إلى رؤى تنبؤية وذكاء مبرمج.">
              Leverage
              machine learning and advanced data pipelines to turn your raw data into predictive insights and automated
              intelligence.
            </p>
            <a href="{{ route('analytics') }}" class="service-link" data-en="Learn More →" data-ar="اعرف المزيد ←">Learn More →</a>
          </div>

          <div class="service-card reveal-card">
            <div class="service-icon" style="background:linear-gradient(135deg,#ef4444,#dc2626);">
              <i class="fas fa-vector-square"></i>
            </div>
            <h3 data-en="UI/UX Design & Brand identity" data-ar="تصميم واجهة المستخدم وهوية العلامة التجارية">UI/UX Design
              & Brand identity</h3>
            <p data-en="Design digital products that are not only beautiful but also intuitive, accessible, and perfectly aligned with your users' needs."
              data-ar="تصميم منتجات رقمية ليست جميلة فحسب، بل بديهية وسهلة الوصول ومتوافقة تماماً مع احتياجات مستخدميك.">
              Design digital products that are not only beautiful but also intuitive, accessible, and perfectly aligned
              with your users' needs.</p>
            <a href="{{ route('branding') }}" class="service-link" data-en="Learn More →" data-ar="اعرف المزيد ←">Learn More
              →</a>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  @include('partials.testimonials')

  @include('partials.blog_section')

  <!-- ═══════════════════════════ MARQUEE 2 ═══════════════════════════ -->
  <div class="marquee-section" aria-hidden="true">
    <div class="marquee-track marquee-reverse">
      <div class="marquee-content">
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="ROI Growth" data-ar="نمو العائد على الاستثمار">ROI Growth</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Lead Generation" data-ar="جذب العملاء المحتملين">Lead Generation</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Brand Awareness" data-ar="الوعي بالعلامة التجارية">Brand Awareness</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Customer Retention" data-ar="الاحتفاظ بالعملاء">Customer Retention</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Market Expansion" data-ar="التوسع في السوق">Market Expansion</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Funnel Optimisation" data-ar="تحسين مسار المبيعات">Funnel Optimisation</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="AI Automation" data-ar="أتمتة الذكاء الاصطناعي">AI Automation</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Data Intelligence" data-ar="ذكاء البيانات">Data Intelligence</span></span>
        <!-- Duplicate -->
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="ROI Growth" data-ar="نمو العائد على الاستثمار">ROI Growth</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Lead Generation" data-ar="جذب العملاء المحتملين">Lead Generation</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Brand Awareness" data-ar="الوعي بالعلامة التجارية">Brand Awareness</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Customer Retention" data-ar="الاحتفاظ بالعملاء">Customer Retention</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Market Expansion" data-ar="التوسع في السوق">Market Expansion</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Funnel Optimisation" data-ar="تحسين مسار المبيعات">Funnel Optimisation</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="AI Automation" data-ar="أتمتة الذكاء الاصطناعي">AI Automation</span></span>
        <span class="marquee-item"><img src="{{ asset('assets/star.svg') }}" alt="" /> <span data-en="Data Intelligence" data-ar="ذكاء البيانات">Data Intelligence</span></span>
      </div>
    </div>
  </div>

  <!-- ═══════════════════════════ CTA ═══════════════════════════ -->
  <section class="cta-section" id="contact">
    <div class="cta-bg-overlay"></div>
    <div class="container">
      <div class="cta-inner reveal-up">
        <span class="sub-badge light" data-en="Start Today" data-ar="ابدأ اليوم">Start Today</span>
        <h2 class="cta-title" data-en="Ready to Scale Your Software?" data-ar="هل أنت مستعد لتوسيع برمجياتك؟">Ready to
          Scale Your Software?</h2>
        <p class="cta-description"
          data-en="Join 500+ brands that trust Arkanzax to grow their business. Get a free strategy call and see your growth potential."
          data-ar="انضم إلى أكثر من 500 علامة تجارية تثق بأركانزاكس لتنمية أعمالها. احصل على مكالمة استراتيجية مجانية وشاهد إمكانات نموك.">
          Join 500+ brands that trust Arkanzax to grow their business. Get a free strategy call and see your growth
          potential.
        </p>

        <form class="cta-form" id="cta-form" action="{{ route('subscribe') }}" method="POST" novalidate>
                    @csrf
          <div class="form-group">
            <input type="email" name="email" id="email-input" placeholder="Enter your business email"
              data-en-placeholder="Enter your business email" data-ar-placeholder="أدخل بريدك الإلكتروني التجاري"
              aria-label="Email address" required />
            <button type="submit" class="btn-cta" data-en="Get Free Strategy" data-ar="احصل على استراتيجية مجانية">Get
              Free Strategy</button>
          </div>
          <p class="form-note" data-en="No spam, no commitment. Unsubscribe anytime."
            data-ar="لا رسائل مزعجة، لا إلزام. ألغِ الاشتراك في أي وقت.">No spam, no commitment. Unsubscribe anytime.
          </p>
        </form>

        <div class="cta-features">
          <span class="cta-feature"><i class="fas fa-check-circle"></i> <span data-en="Free Strategy Call"
              data-ar="مكالمة استراتيجية مجانية">Free Strategy Call</span></span>
          <span class="cta-feature"><i class="fas fa-check-circle"></i> <span data-en="No Long Contracts"
              data-ar="لا عقود طويلة">No Long Contracts</span></span>
          <span class="cta-feature"><i class="fas fa-check-circle"></i> <span data-en="Results Guaranteed"
              data-ar="نتائج مضمونة">Results Guaranteed</span></span>
        </div>
      </div>
    </div>
  </section>

@endsection
