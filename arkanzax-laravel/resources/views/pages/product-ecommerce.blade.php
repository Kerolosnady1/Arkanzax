@extends('layouts.app')
@section('title', 'E-Commerce Platform Solutions | Arkanzax')
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
      color: #ec4899;
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

    .content-grid {
      display: none;
    }
</style>
@section('sub_header')
    @include('partials.product_sub_header')
@endsection

@section('content')
<!-- ═══════ HERO ═══════ -->
    <section class="inner-hero">
      <div class="container">
        <span class="hero-badge reveal-up" style="border-color: #ec4899; color: #ec4899;">
          <i class="fas fa-robot"></i>&nbsp;
          <span data-en="SuperCommerce AI" data-ar="سوبر كوميرس للذكاء الاصطناعي">SuperCommerce AI</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="The Future of Autonomous eCommerce"
          data-ar="مستقبل التجارة الإلكترونية المستقلة">
          The Future of Autonomous eCommerce
        </h1>
        <p class="hero-description reveal-up"
          data-en="Join us in our mission to digitally revolutionize commerce across the Middle East and Africa with AI-powered B2C, B2B, and BaaS solutions."
          data-ar="انضم إلينا في مهمتنا لإحداث ثورة رقمية في التجارة عبر الشرق الأوسط وأفريقيا باستخدام حلول مدعومة بالذكاء الاصطناعي.">
          Join us in our mission to digitally revolutionize commerce across the Middle East and Africa with AI-powered
          B2C, B2B, and BaaS solutions.
        </p>
      </div>
    </section>

    <!-- ═══════ B2C COMMERCE ═══════ -->
    <section class="service-content" style="background: var(--dark-3);">
      <div class="container">
        <div class="responsive-grid">
          <div class="content-text reveal-left">
            <h2 data-en="B2C: The Modern Way to Commerce" data-ar="B2C: الطريقة الحديثة للتجارة">B2C: The
              Modern Way to Commerce</h2>
            <p data-en="A quiet layer of intelligence fine-tunes every touchpoint—turning casual visits into deeper loyalty and higher basket sizes, automatically."
              data-ar="طبقة هادئة من الذكاء تضبط كل نقطة اتصال—لتحويل الزيارات العابرة إلى ولاء أعمق وتلقائياً رفع حجم سلة التسوق.">
              A quiet layer of intelligence fine-tunes every touchpoint—turning casual visits into deeper loyalty and
              higher basket sizes, automatically. Omnichannel retailers use our platform to compose the customer journey
              from merchandising to fulfillment.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-boxes"></i> <span data-en="Enterprise Order Management: Sell, service, and fulfill orders without custom development." data-ar="إدارة طلبات المؤسسات: بيع وخدمة وتلبية الطلبات دون تطوير مخصص."><strong>Enterprise Order Management:</strong> Sell, service, and fulfill orders without custom development.</span></li>
              <li><i class="fas fa-tags"></i> <span data-en="Personalized Promotions: Customize complex rules based on real-time shopping insights." data-ar="عروض ترويجية مخصصة: تخصيص قواعد معقدة بناءً على رؤى التسوق في الوقت الفعلي."><strong>Personalized Promotions:</strong> Customize complex rules based on real-time shopping insights.</span></li>
              <li><i class="fas fa-database"></i> <span data-en="Enrich Product Data: Combine best-in-class products to solve business needs instantly." data-ar="إثراء بيانات المنتج: دمج أفضل المنتجات في فئتها لحل احتياجات العمل فوراً."><strong>Enrich Product Data:</strong> Combine best-in-class products to solve business needs instantly.</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="{{ asset('assets/ecommerce/b2c_premium.png') }}" alt="B2C Ecommerce Platform" />
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ B2B COMMERCE ═══════ -->
    <section class="service-content" style="background: var(--dark-2);">
      <div class="container">
        <div class="responsive-grid" style="grid-template-columns: 0.9fr 1.1fr;">
          <div class="content-image reveal-left">
            <img src="{{ asset('assets/ecommerce/b2b_premium.png') }}" alt="B2B Ecommerce Dashboard" />
          </div>
          <div class="content-text reveal-right">
            <h2 data-en="B2B: Boost Sales & Efficiency" data-ar="B2B: تعزيز المبيعات والكفاءة">B2B: Boost Sales & Efficiency</h2>
            <p data-en="Rapidly create, launch, and optimize B2B experiences with unlimited account-specific catalogs and B2B-focused checkout. Reduce rollout time and cost by up to 60% with our low-code/no-code integrations."
               data-ar="قم بإنشاء وإطلاق وتحسين تجارب B2B بسرعة مع كتالوجات غير محدودة خاصة بالحسابات وعملية دفع مركزة على B2B. قلل وقت وتكلفة الإطلاق بنسبة تصل إلى 60٪ من خلال تكاملاتنا منخفضة التعليمات البرمجية.">
              Rapidly create, launch, and optimize B2B experiences with unlimited account-specific catalogs and
              B2B-focused checkout. Reduce rollout time and cost by up to 60% with our low-code/no-code integrations.
            </p>
            <ul class="feature-list">
              <li><i class="fas fa-users-cog"></i> <span data-en="Account Management: Assign user roles with specific permissions and tailored groups." data-ar="إدارة الحسابات: تخصيص أدوار المستخدم بصلاحيات محددة ومجموعات مخصصة."><strong>Account Management:</strong> Assign user roles with specific permissions and tailored groups.</span></li>
              <li><i class="fas fa-layer-group"></i> <span data-en="Account-Specific Catalogs: Create unlimited catalogs for unique product assortments." data-ar="كتالوجات خاصة بالحسابات: إنشاء كتالوجات غير محدودة لتشكيلات منتجات فريدة."><strong>Account-Specific Catalogs:</strong> Create unlimited catalogs for unique product assortments.</span></li>
              <li><i class="fas fa-money-check-alt"></i> <span data-en="Configurable Pricing: Leverage price books to offer special negotiated rates." data-ar="أسعار قابلة للتكوين: استفد من دفاتر الأسعار لتقديم أسعار خاصة متفاوض عليها."><strong>Configurable Pricing:</strong> Leverage price books to offer special negotiated rates.</span></li>
              <li><i class="fas fa-dolly"></i> <span data-en="Orders & Inventory: Support quick orders, bulk re-orders, and centralized inventory management." data-ar="الطلبات والمخزون: دعم الطلبات السريعة وإعادة الطلب بالجملة وإدارة المخزون المركزية."><strong>Orders & Inventory:</strong> Support quick orders, bulk re-orders, and centralized inventory management.</span></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ BAAS (DEVELOPERS) ═══════ -->
    <section class="service-content" style="background: var(--dark-3);">
      <div class="container">
        <h2 style="text-align:center; color: var(--white); margin-bottom: 14px; font-size: 2.2rem;" 
            data-en="Backend as a Service (BaaS)" data-ar="الخدمة الخلفية كخدمة (BaaS)">Backend as a Service
          (BaaS)</h2>
        <p style="text-align:center; color: rgba(255,255,255,0.6); max-width:640px; margin: 0 auto 48px;"
           data-en="Create differentiated shopping experiences across infinite channels with a full suite of APIs. 300+ API endpoints with <50ms response times."
           data-ar="قم بإنشاء تجارب تسوق متميزة عبر قنوات لا حصر لها مع مجموعة كاملة من واجهات برمجة التطبيقات. أكثر من 300 نقطة نهاية مع أوقات استجابة أقل من 50 مللي ثانية.">
          Create differentiated shopping experiences across infinite channels with a full suite of APIs. 300+ API
          endpoints with &lt;50ms response times.
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
          <div
            style="background: rgba(236,72,153,0.07); border: 1px solid rgba(236,72,153,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-box" style="font-size:1.8rem; color:#ec4899; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Product & Inventory APIs" data-ar="واجهات برمجة تطبيقات المنتجات والمخزون">Product & Inventory APIs</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Create products in bulk, create attributes, and perform bulk inventory updates queried by location." data-ar="أنشئ منتجات بالجملة، وأنشئ سمات، وقم بإجراء تحديثات المخزون بالجملة التي يتم الاستعلام عنها حسب الموقع.">Create products in bulk, create attributes, and
              perform bulk inventory updates queried by location.</p>
          </div>
          <div
            style="background: rgba(236,72,153,0.07); border: 1px solid rgba(236,72,153,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-shopping-cart"
              style="font-size:1.8rem; color:#ec4899; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Cart & Promo APIs" data-ar="واجهات برمجة تطبيقات السلة والعروض">Cart & Promo APIs</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Merge guest carts, support organization multi-carts, integrate dynamic pricing, and validate discount codes seamlessly." data-ar="دمج سلال الضيوف، ودعم السلال المتعددة للمؤسسات، ودمج الأسعار الديناميكية، والتحقق من رموز الخصم بسلاسة.">Merge guest carts, support organization
              multi-carts, integrate dynamic pricing, and validate discount codes seamlessly.</p>
          </div>
          <div
            style="background: rgba(236,72,153,0.07); border: 1px solid rgba(236,72,153,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-truck" style="font-size:1.8rem; color:#ec4899; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Order & Shipping APIs" data-ar="واجهات برمجة تطبيقات الطلبات والشحن">Order & Shipping APIs</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Add shipment info, cancel/return orders, and create a multi-carrier logistics solution without expensive infrastructure." data-ar="أضف معلومات الشحن، وألغِ/أرجع الطلبات، وأنشئ حلاً لوجستياً متعدد الناقلات دون بنية تحتية باهظة الثمن.">Add shipment info, cancel/return orders, and
              create a multi-carrier logistics solution without expensive infrastructure.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ AUTONOMOUS AI ═══════ -->
    <section class="service-content">
      <div class="container">
        <div class="responsive-grid">
          <div class="content-text reveal-left">
            <h2 data-en="Autonomous Commerce" data-ar="التجارة المستقلة">Autonomous Commerce</h2>
            <p data-en="Picture the simplicity of self-driving cars applied to eCommerce. It’s a complete shift towards automation that simplifies both operations and marketing, drastically cutting down on manual work and maximizing operational efficiency."
               data-ar="تخيل بساطة السيارات ذاتية القيادة المطبقة على التجارة الإلكترونية. إنه تحول كامل نحو الأتمتة التي تبسط كل من العمليات والتسويق، مما يقلل بشكل كبير من العمل اليدوي ويزيد من الكفاءة التشغيلية.">Picture the simplicity of self-driving cars applied to eCommerce. It’s a complete shift towards
              automation that simplifies both operations and marketing, drastically cutting down on manual work and
              maximizing operational efficiency.</p>
            <p style="color:rgba(255,255,255,0.6); margin-top:20px;" 
               data-en="Let the artificial intelligence fine-tune every part of the shopping funnel automatically so your team can focus on big-picture strategic growth instead of manual data entry."
               data-ar="اترك الذكاء الاصطناعي يضبط كل جزء من مسار التسوق تلقائياً حتى يتمكن فريقك من التركيز على النمو الاستراتيجي بدلاً من إدخال البيانات يدوياً.">Let the artificial intelligence fine-tune every
              part of the shopping funnel automatically so your team can focus on big-picture strategic growth instead
              of manual data entry.</p>
          </div>
          <div class="content-image reveal-right">
            <img src="{{ asset('assets/ecommerce/autonomous_premium.png') }}" alt="Autonomous AI Commerce" />
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ CTA ═══════ -->
    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Step Into the Future of Retail" data-ar="ادخل إلى مستقبل التجزئة">Step Into the Future of Retail
          </h2>
          <p data-en="Accelerate your B2C and B2B eCommerce rollout with scalable, AI-driven composable architecture."
            data-ar="قم بتسريع إطلاق منتج التجارة الإلكترونية الخاصة بك مع بنية سحابية قابلة للتوسع مدعومة بالذكاء الاصطناعي.">
            Accelerate your B2C and B2B eCommerce rollout with scalable, AI-driven composable architecture.
          </p>
          <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
            <a href="{{ route('home') }}#contact" class="btn btn-primary"
              style="background:#ec4899; border-color:#ec4899; color:white;" data-en="Request a Demo" data-ar="اطلب عرضاً توضيحياً">Request a Demo</a>
            <a href="{{ route('home') }}#contact" class="btn"
              style="border:1px solid rgba(255,255,255,0.2); color:var(--white);" data-en="Get Beta Access" data-ar="احصل على وصول تجريبي">Get Beta Access</a>
          </div>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
