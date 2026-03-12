@extends('layouts.app')
@section('title', 'High-Performance Hosting & Domain Services | Arkanzax')
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
            background: radial-gradient(circle at 50% 50%, rgba(108, 99, 255, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Domain search */
        .domain-search-bar {
            max-width: 700px;
            margin: 32px auto 0;
            background: var(--white);
            border-radius: 50px;
            display: flex;
            padding: 6px;
            align-items: center;
        }

        .domain-search-bar i {
            margin-left: 20px;
            color: #333;
            font-size: 1.2rem;
        }

        .domain-search-bar input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 14px 15px;
            font-size: 1.1rem;
            color: #333;
            outline: none;
        }

        .domain-search-bar button {
            background: #6c63ff;
            color: var(--white);
            border: none;
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .domain-search-bar button:hover {
            background: #5a52d5;
            transform: scale(1.03);
        }

        html[dir="rtl"] .domain-search-bar i {
            margin-left: 0;
            margin-right: 20px;
        }

        .tld-row {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .tld-row span {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .tld-row strong {
            color: var(--white);
        }

        /* Help cards */
        .help-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .help-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 36px 24px;
            text-align: center;
            text-decoration: none;
            transition: var(--transition);
            display: block;
        }

        .help-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 15px 35px rgba(49, 165, 161, 0.15);
        }

        .help-card i {
            font-size: 2.5rem;
            margin-bottom: 18px;
            display: block;
        }

        .help-card h4 {
            color: var(--white);
            margin-bottom: 8px;
            font-size: 1.15rem;
        }

        .help-card p {
            color: var(--text-gray);
            font-size: 0.85rem;
        }

        /* Service tabs */
        .svc-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-bottom: 48px;
        }

        .svc-tab {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            color: var(--text-gray);
            padding: 10px 22px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .svc-tab:hover,
        .svc-tab.active {
            background: var(--primary);
            border-color: var(--primary);
            color: var(--white);
        }

        /* Pricing */
        .pricing-section {
            padding: 80px 0;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .pricing-card {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 16px;
            padding: 36px;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 12px 30px rgba(49, 165, 161, 0.15);
        }

        .pricing-card.popular {
            border-color: var(--primary);
        }

        .popular-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--primary);
            color: var(--white);
            padding: 6px 18px;
            font-size: 0.7rem;
            font-weight: 700;
            border-bottom-left-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .pricing-card h3 {
            font-size: 1.5rem;
            color: var(--white);
            margin-bottom: 6px;
        }

        .pricing-card .plan-sub {
            color: var(--text-gray);
            font-size: 0.85rem;
            margin-bottom: 20px;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin-bottom: 28px;
            flex-grow: 1;
        }

        .pricing-features li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 0.92rem;
        }

        .pricing-features i {
            color: var(--primary);
            font-size: 1rem;
            min-width: 18px;
        }

        .pricing-features .fa-times-circle {
            color: #e74c3c;
        }

        /* Service panel (hidden by default) */
        .svc-panel {
            display: none;
        }

        .svc-panel.active {
            display: block;
        }

        @media (max-width:900px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 420px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width:768px) {
            .inner-hero {
                padding: 120px 0 60px;
            }

            .domain-search-bar {
                flex-direction: column;
                border-radius: 20px;
                padding: 10px;
            }

            .domain-search-bar button {
                width: 100%;
                margin-top: 10px;
            }

            .svc-tabs {
                gap: 6px;
            }

            .svc-tab {
                padding: 8px 14px;
                font-size: 0.8rem;
            }
        }
</style>
@endsection
@section('content')
<!-- ═══════ HERO + DOMAIN SEARCH ═══════ -->
        <section class="inner-hero">
            <div class="container">
                <span class="hero-badge reveal-up">
                    <i class="fas fa-cloud"></i>&nbsp;
                    <span data-en="Cloud Hosting Portal" data-ar="بوابة الاستضافة السحابية">Cloud Hosting Portal</span>
                </span>
                <h1 class="hero-title reveal-up" data-en="Find Your New Domain Name"
                    data-ar="ابحث عن اسم النطاق الجديد">Find Your New Domain Name</h1>
                <p class="hero-description reveal-up"
                    data-en="Register domains, order hosting, and manage your online presence — all in one place."
                    data-ar="سجل النطاقات واطلب الاستضافة وأدر تواجدك عبر الإنترنت — كل شيء في مكان واحد.">
                    Register domains, order hosting, and manage your online presence — all in one place.
                </p>
                <div class="domain-search-bar reveal-up">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="youridea.com" data-en-placeholder="youridea.com"
                        data-ar-placeholder="فكرتك.com">
                    <button data-en="Search" data-ar="بحث">Search</button>
                </div>
                <div class="tld-row reveal-up">
                    <span><strong>.com</strong> $15.00/yr</span>
                    <span><strong>.xyz</strong> $3.00/yr</span>
                    <span><strong>.net</strong> $16.00/yr</span>
                    <span><strong>.org</strong> $15.50/yr</span>
                </div>
            </div>
        </section>

        <!-- ═══════ HOW CAN WE HELP ═══════ -->
        <section style="background: var(--dark-3); padding: 80px 0;">
            <div class="container">
                <div class="section-header text-center reveal-up" style="margin-bottom:48px;">
                    <h2 class="section-title" data-en="How Can We Help Today?" data-ar="كيف يمكننا مساعدتك اليوم؟">How
                        Can We Help Today?</h2>
                </div>
                <div class="help-grid">
                    <a href="{{ route('home') }}#contact" class="help-card reveal-card">
                        <i class="fas fa-globe" style="color:#6c63ff;"></i>
                        <h4 data-en="Buy A Domain" data-ar="شراء نطاق">Buy A Domain</h4>
                        <p data-en="Register your perfect domain name" data-ar="سجّل اسم النطاق المثالي لك">Register
                            your perfect domain name</p>
                    </a>
                    <a href="#services" class="help-card reveal-card">
                        <i class="fas fa-server" style="color:var(--primary);"></i>
                        <h4 data-en="Order Hosting" data-ar="طلب استضافة">Order Hosting</h4>
                        <p data-en="Browse our hosting packages" data-ar="تصفح باقات الاستضافة لدينا">Browse our hosting
                            packages</p>
                    </a>
                    <a href="{{ route('home') }}#contact" class="help-card reveal-card">
                        <i class="fas fa-credit-card" style="color:#2ecc71;"></i>
                        <h4 data-en="Make Payment" data-ar="إجراء دفعة">Make Payment</h4>
                        <p data-en="Pay invoices and manage billing" data-ar="ادفع الفواتير وأدر الفوترة">Pay invoices
                            and manage billing</p>
                    </a>
                    <a href="{{ route('home') }}#contact" class="help-card reveal-card">
                        <i class="fas fa-headset" style="color:#e74c3c;"></i>
                        <h4 data-en="Get Support" data-ar="الحصول على الدعم">Get Support</h4>
                        <p data-en="Open a ticket or contact our team" data-ar="افتح تذكرة أو تواصل مع فريقنا">Open a
                            ticket or contact our team</p>
                    </a>
                </div>
            </div>
        </section>

        <!-- ═══════ SERVICES (TABBED) ═══════ -->
        <section id="services" class="pricing-section" style="background:var(--dark-2);">
            <div class="container">
                <div class="section-header text-center reveal-up" style="margin-bottom:20px;">
                    <h2 class="section-title" data-en="Our Hosting Services" data-ar="خدمات الاستضافة لدينا">Our Hosting
                        Services</h2>
                    <p class="section-subtitle" data-en="Choose a category below to view plans and pricing."
                        data-ar="اختر فئة أدناه لعرض الخطط والأسعار.">Choose a category below to view plans and pricing.
                    </p>
                </div>
                <div class="svc-tabs reveal-up">
                    <button class="svc-tab active" data-panel="shared"><i class="fas fa-server"></i>&nbsp;
                        Shared</button>
                    <button class="svc-tab" data-panel="wordpress"><i class="fab fa-wordpress"></i>&nbsp;
                        WordPress</button>
                    <button class="svc-tab" data-panel="aspnet"><i class="fab fa-microsoft"></i>&nbsp; ASP.NET</button>
                    <button class="svc-tab" data-panel="linuxreseller"><i class="fab fa-linux"></i>&nbsp; Linux
                        Reseller</button>
                    <button class="svc-tab" data-panel="email"><i class="fas fa-envelope"></i>&nbsp; Email</button>
                    <button class="svc-tab" data-panel="winreseller"><i class="fab fa-windows"></i>&nbsp; Win
                        Reseller</button>
                    <button class="svc-tab" data-panel="linuxvps"><i class="fas fa-hdd"></i>&nbsp; Linux VPS</button>
                    <button class="svc-tab" data-panel="linuxcloud"><i class="fas fa-cloud"></i>&nbsp; Linux
                        Cloud</button>
                </div>

                <!-- SHARED HOSTING -->
                <div class="svc-panel active" id="panel-shared">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Starter</h3>
                                    <p class="plan-sub" data-en="Shared Hosting" data-ar="استضافة مشتركة">Shared Hosting
                                    </p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$1.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 1 Website</li>
                                <li><i class="fas fa-check-circle"></i> 5 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Business</h3>
                                    <p class="plan-sub" data-en="Shared Hosting" data-ar="استضافة مشتركة">Shared Hosting
                                    </p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$8.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 5 Websites</li>
                                <li><i class="fas fa-check-circle"></i> 50 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Premium</h3>
                                    <p class="plan-sub" data-en="Shared Hosting" data-ar="استضافة مشتركة">Shared Hosting
                                    </p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$15.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> Unlimited Websites</li>
                                <li><i class="fas fa-check-circle"></i> 90 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- WORDPRESS HOSTING -->
                <div class="svc-panel" id="panel-wordpress">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Startup</h3>
                                    <p class="plan-sub" data-en="WordPress Hosting" data-ar="استضافة ووردبريس">WordPress
                                        Hosting
                                    </p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$2.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 5 Websites</li>
                                <li><i class="fas fa-check-circle"></i> 5 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>GrowBig</h3>
                                    <p class="plan-sub" data-en="WordPress Hosting" data-ar="استضافة ووردبريس">WordPress
                                        Hosting
                                    </p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$8.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 15 Websites</li>
                                <li><i class="fas fa-check-circle"></i> 50 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>GoGeek</h3>
                                    <p class="plan-sub" data-en="WordPress Hosting" data-ar="استضافة ووردبريس">WordPress
                                        Hosting
                                    </p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$15.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> Unlimited Websites</li>
                                <li><i class="fas fa-check-circle"></i> 150 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- ASP.NET HOSTING -->
                <div class="svc-panel" id="panel-aspnet">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Economy</h3>
                                    <p class="plan-sub" data-en="Windows ASP.NET Hosting" data-ar="استضافة ASP.NET">
                                        Windows
                                        ASP.NET Hosting</p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$3.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 1 Website</li>
                                <li><i class="fas fa-check-circle"></i> 5 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> ASP.NET Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Deluxe</h3>
                                    <p class="plan-sub" data-en="Windows ASP.NET Hosting" data-ar="استضافة ASP.NET">
                                        Windows
                                        ASP.NET Hosting</p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$10.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 5 Websites</li>
                                <li><i class="fas fa-check-circle"></i> 50 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> ASP.NET Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Ultimate</h3>
                                    <p class="plan-sub" data-en="Windows ASP.NET Hosting" data-ar="استضافة ASP.NET">
                                        Windows
                                        ASP.NET Hosting</p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$25.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> Unlimited Websites</li>
                                <li><i class="fas fa-check-circle"></i> 90 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> ASP.NET Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- LINUX RESELLER HOSTING -->
                <div class="svc-panel" id="panel-linuxreseller">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Bronze</h3>
                                <p class="plan-sub" data-en="Linux Reseller Hosting" data-ar="استضافة موزع لينكس">Linux
                                    Reseller Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$9.80</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 25 Customers</li>
                                <li><i class="fas fa-check-circle"></i> 30 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <h3>Silver</h3>
                                <p class="plan-sub" data-en="Linux Reseller Hosting" data-ar="استضافة موزع لينكس">Linux
                                    Reseller Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$13.73</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 75 Customers</li>
                                <li><i class="fas fa-check-circle"></i> 75 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Gold</h3>
                                <p class="plan-sub" data-en="Linux Reseller Hosting" data-ar="استضافة موزع لينكس">Linux
                                    Reseller Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$18.13</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> Unlimited Customers</li>
                                <li><i class="fas fa-check-circle"></i> 150 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> PHP Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- EMAIL HOSTING -->
                <div class="svc-panel" id="panel-email">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Business Email</h3>
                                    <p class="plan-sub" data-en="Email Hosting" data-ar="استضافة البريد الإلكتروني">
                                        Email
                                        Hosting</p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$3.45</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 1 Website</li>
                                <li><i class="fas fa-check-circle"></i> 5 GB Storage</li>
                                <li><i class="fas fa-check-circle"></i> 500 Mail Accounts</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Enterprise Email</h3>
                                    <p class="plan-sub" data-en="Email Hosting" data-ar="استضافة البريد الإلكتروني">
                                        Email
                                        Hosting</p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$14.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 25 Websites</li>
                                <li><i class="fas fa-check-circle"></i> 70 GB Storage</li>
                                <li><i class="fas fa-check-circle"></i> 2,500 Mail Accounts</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <div class="pricing-header">
                                    <h3>Premium Email</h3>
                                    <p class="plan-sub" data-en="Email Hosting" data-ar="استضافة البريد الإلكتروني">
                                        Email
                                        Hosting</p>
                                </div>
                                <div class="pricing-price">
                                    <span class="price-value">$24.99</span>
                                    <span class="price-currency">USD</span>
                                    <span class="price-period">/mo</span>
                                </div>
                            </div>

                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> Unlimited Websites</li>
                                <li><i class="fas fa-check-circle"></i> 150 GB Storage</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Mail Accounts</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- WINDOWS RESELLER HOSTING -->
                <div class="svc-panel" id="panel-winreseller">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Bronze</h3>
                                <p class="plan-sub" data-en="Windows Reseller Hosting" data-ar="استضافة موزع ويندوز">
                                    Windows
                                    Reseller Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$12.80</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 25 Customers</li>
                                <li><i class="fas fa-check-circle"></i> 30 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> ASP.NET Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <h3>Silver</h3>
                                <p class="plan-sub" data-en="Windows Reseller Hosting" data-ar="استضافة موزع ويندوز">
                                    Windows
                                    Reseller Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$16.73</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 75 Customers</li>
                                <li><i class="fas fa-check-circle"></i> 75 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-times-circle"></i> No FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> ASP.NET Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Gold</h3>
                                <p class="plan-sub" data-en="Windows Reseller Hosting" data-ar="استضافة موزع ويندوز">
                                    Windows
                                    Reseller Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$21.13</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> Unlimited Customers</li>
                                <li><i class="fas fa-check-circle"></i> 150 GB Web Space</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> FREE SSL Certificate</li>
                                <li><i class="fas fa-check-circle"></i> FREE Domain</li>
                                <li><i class="fas fa-check-circle"></i> ASP.NET Support</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- LINUX VPS HOSTING -->
                <div class="svc-panel" id="panel-linuxvps">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Launch</h3>
                                <p class="plan-sub" data-en="Linux VPS Hosting" data-ar="استضافة VPS لينكس">Linux VPS
                                    Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$4.99</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 100 GB Disk Space</li>
                                <li><i class="fas fa-check-circle"></i> 1 CPU Core</li>
                                <li><i class="fas fa-check-circle"></i> 1 GB RAM</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> 1 IP Address</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <h3>Enhance</h3>
                                <p class="plan-sub" data-en="Linux VPS Hosting" data-ar="استضافة VPS لينكس">Linux VPS
                                    Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$11.99</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 100 GB Disk Space</li>
                                <li><i class="fas fa-check-circle"></i> 2 CPU Cores</li>
                                <li><i class="fas fa-check-circle"></i> 4 GB RAM</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> 1 IP Address</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Grow</h3>
                                <p class="plan-sub" data-en="Linux VPS Hosting" data-ar="استضافة VPS لينكس">Linux VPS
                                    Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$24.99</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 200 GB Disk Space</li>
                                <li><i class="fas fa-check-circle"></i> 4 CPU Cores</li>
                                <li><i class="fas fa-check-circle"></i> 8 GB RAM</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> 1 IP Address</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>

                <!-- LINUX CLOUD HOSTING -->
                <div class="svc-panel" id="panel-linuxcloud">
                    <div class="pricing-grid">
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Startup</h3>
                                <p class="plan-sub" data-en="Linux Cloud Hosting" data-ar="استضافة سحابية لينكس">Linux
                                    Cloud Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$8.99</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 75 GB Disk Space</li>
                                <li><i class="fas fa-check-circle"></i> 1 CPU Core</li>
                                <li><i class="fas fa-check-circle"></i> 1 GB RAM</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> 1 IP Address</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card popular reveal-card">
                            <span class="popular-badge">Popular</span>
                            <div class="pricing-header">
                                <h3>Professional</h3>
                                <p class="plan-sub" data-en="Linux Cloud Hosting" data-ar="استضافة سحابية لينكس">Linux
                                    Cloud Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$16.99</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 150 GB Disk Space</li>
                                <li><i class="fas fa-check-circle"></i> 2 CPU Cores</li>
                                <li><i class="fas fa-check-circle"></i> 4 GB RAM</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> 1 IP Address</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                        <div class="pricing-card reveal-card">
                            <div class="pricing-header">
                                <h3>Enterprise</h3>
                                <p class="plan-sub" data-en="Linux Cloud Hosting" data-ar="استضافة سحابية لينكس">Linux
                                    Cloud Hosting</p>
                            </div>
                            <div class="pricing-price">
                                <span class="price-value">$28.99</span>
                                <span class="price-currency">USD</span>
                                <span class="price-period">/mo</span>
                            </div>
                            <ul class="pricing-features">
                                <li><i class="fas fa-check-circle"></i> 250 GB Disk Space</li>
                                <li><i class="fas fa-check-circle"></i> 4 CPU Cores</li>
                                <li><i class="fas fa-check-circle"></i> 8 GB RAM</li>
                                <li><i class="fas fa-check-circle"></i> Unlimited Bandwidth</li>
                                <li><i class="fas fa-check-circle"></i> 1 IP Address</li>
                                <li><i class="fas fa-check-circle"></i> 24/7/365 Support</li>
                            </ul>
                            <a href="{{ route('home') }}#contact" class="btn btn-outline-white" data-en="Order Now"
                                data-ar="اطلب الآن">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════ CTA ═══════ -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-inner reveal-up">
                    <h2 data-en="Need a Custom Solution?" data-ar="هل تحتاج إلى حل مخصص؟">Need a Custom Solution?</h2>
                    <p data-en="Contact us for tailored hosting packages and dedicated server options for your enterprise."
                        data-ar="اتصل بنا للحصول على حزم استضافة مخصصة وخيارات خوادم مخصصة لمؤسستك.">Contact us for
                        tailored hosting packages and dedicated server options for your enterprise.</p>
                    <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Get a Quote"
                        data-ar="احصل على عرض">Get a Quote</a>
                </div>
            </div>
        </section>

        <!-- Tab switching script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var tabs = document.querySelectorAll('.svc-tab');
                var panels = document.querySelectorAll('.svc-panel');
                tabs.forEach(function (tab) {
                    tab.addEventListener('click', function () {
                        tabs.forEach(function (t) { t.classList.remove('active'); });
                        panels.forEach(function (p) { p.classList.remove('active'); });
                        tab.classList.add('active');
                        var panel = document.getElementById('panel-' + tab.getAttribute('data-panel'));
                        if (panel) panel.classList.add('active');
                    });
                });
            });
        </script>
        @include('partials.testimonials')

        @include('partials.blog_section')
@endsection
