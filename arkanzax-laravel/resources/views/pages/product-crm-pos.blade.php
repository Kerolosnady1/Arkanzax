@extends('layouts.app')
@section('title', 'CRM & POS System | X9 — Arkanzax')
@section('meta_description', 'X9 is an integrated POS & CRM system for restaurants, cafes, and retail. Smart sales, real-time inventory, KDS, QR menus, multi-branch management. Powered by Arkanzax.')

@section('sub_header')
    @include('partials.product_sub_header')
@endsection

@section('content')
{{-- HERO --}}
<section class="crm-hero-section" style="
    position: relative;
    min-height: 90vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
    overflow: hidden;
    padding-top: 220px;
">
    <div class="container">
        <div class="responsive-grid" style="grid-template-columns: 1.2fr 0.8fr; align-items: center;">
            <div class="reveal-up">
                {{-- Badge --}}
                <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(124,58,237,0.15);border:1px solid rgba(124,58,237,0.4);border-radius:50px;padding:6px 18px;margin-bottom:24px;">
                    <div style="width:8px;height:8px;border-radius:50%;background:#7c3aed;animation:pulse 2s infinite;"></div>
                    <span style="font-size:0.8rem;color:#a78bfa;font-weight:600;letter-spacing:1px;text-transform:uppercase;" data-en="Powered by Arkanzax" data-ar="مدعوم من أركانزاكس">Powered by Arkanzax</span>
                </div>

                <h1 style="font-size:clamp(2.2rem,4.5vw,3.8rem);font-weight:800;line-height:1.15;margin-bottom:24px;color:#fff;" data-en="The Smartest CRM & POS System for Your Business" data-ar="نظام CRM ونقاط البيع الأذكى لأعمالك">
                    The Smartest <span style="background:linear-gradient(135deg,#7c3aed,#3b9ef5);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">CRM & POS</span> System for Your Business
                </h1>
                <p style="font-size:1.15rem;color:rgba(255,255,255,0.7);margin-bottom:36px;line-height:1.8;" data-en="An all-in-one system to manage your restaurant or retail business with peak efficiency — smart payments, advanced reports, and intelligent growth tools." data-ar="نظام متكامل لإدارة مطعمك أو متجرك بكفاءة عالية، مع حلول دفع متطورة وتقارير ذكية تدعم نمو أعمالك.">
                    An all-in-one system to manage your restaurant or retail business with peak efficiency — smart payments, advanced reports, and intelligent growth tools.
                </p>
                <div style="display:flex;gap:16px;flex-wrap:wrap;">
                    <a href="https://console.get-x9.com/offer-6months-free?lang=ar" target="_blank" style="background:linear-gradient(135deg,#7c3aed,#5b21b6);color:#fff;padding:14px 32px;border-radius:50px;font-weight:700;text-decoration:none;font-size:1rem;transition:all 0.3s;box-shadow:0 8px 30px rgba(124,58,237,0.4);" data-en="🚀 Start Free — 6 Months" data-ar="🚀 ابدأ مجاناً — 6 أشهر">🚀 Start Free — 6 Months</a>
                    <a href="https://www.get-x9.com/ar/features" target="_blank" style="border:2px solid rgba(255,255,255,0.3);color:#fff;padding:14px 32px;border-radius:50px;font-weight:700;text-decoration:none;font-size:1rem;transition:all 0.3s;" data-en="Explore Features" data-ar="استكشف الميزات">Explore Features</a>
                </div>

                <div style="display:flex;gap:24px;margin-top:40px;flex-wrap:wrap;">
                    <div style="display:flex;align-items:center;gap:8px;color:rgba(255,255,255,0.6);font-size:0.85rem;">
                        <i class="fas fa-check-circle" style="color:#10b981;"></i>
                        <span data-en="Works Offline" data-ar="يعمل بدون انترنت">Works Offline</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px;color:rgba(255,255,255,0.6);font-size:0.85rem;">
                        <i class="fas fa-check-circle" style="color:#10b981;"></i>
                        <span data-en="Multi-Branch" data-ar="متعدد الفروع">Multi-Branch</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px;color:rgba(255,255,255,0.6);font-size:0.85rem;">
                        <i class="fas fa-check-circle" style="color:#10b981;"></i>
                        <span data-en="Free Setup" data-ar="إعداد مجاني">Free Setup</span>
                    </div>
                </div>
            </div>

            <div class="reveal-up" style="position:relative;">
                <div style="background:linear-gradient(135deg,rgba(124,58,237,0.15),rgba(59,158,245,0.1));border:1px solid rgba(255,255,255,0.1);border-radius:24px;padding:40px;text-align:center;backdrop-filter:blur(10px);">
                    <div style="font-size:6rem;margin-bottom:20px;">🖥️</div>
                    <div style="font-size:1.8rem;font-weight:800;color:#fff;margin-bottom:8px;">X9 POS & CRM</div>
                    <div style="color:rgba(255,255,255,0.6);margin-bottom:24px;" data-en="All-in-One Business Platform" data-ar="منصة أعمال متكاملة">All-in-One Business Platform</div>
                    <div class="responsive-grid" style="grid-template-columns:1fr 1fr;gap:12px;">
                        <div style="background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);border-radius:12px;padding:16px;">
                            <div style="font-size:1.5rem;font-weight:800;color:#10b981;">99.9%</div>
                            <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);" data-en="Uptime" data-ar="وقت التشغيل">Uptime</div>
                        </div>
                        <div style="background:rgba(124,58,237,0.15);border:1px solid rgba(124,58,237,0.3);border-radius:12px;padding:16px;">
                            <div style="font-size:1.5rem;font-weight:800;color:#a78bfa;">6 mo</div>
                            <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);" data-en="Free Trial" data-ar="تجربة مجانية">Free Trial</div>
                        </div>
                        <div style="background:rgba(59,158,245,0.15);border:1px solid rgba(59,158,245,0.3);border-radius:12px;padding:16px;">
                            <div style="font-size:1.5rem;font-weight:800;color:#3b9ef5;">Real-time</div>
                            <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);" data-en="Reports" data-ar="تقارير">Reports</div>
                        </div>
                        <div style="background:rgba(239,68,68,0.15);border:1px solid rgba(239,68,68,0.3);border-radius:12px;padding:16px;">
                            <div style="font-size:1.5rem;font-weight:800;color:#ef4444;">24/7</div>
                            <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);" data-en="Support" data-ar="دعم">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURES GRID --}}
<section style="padding:100px 0;background:#0a0a1a;">
    <div class="container">
        <div class="section-header text-center reveal-up" style="margin-bottom:60px;">
            <span class="sub-badge" data-en="Core Capabilities" data-ar="القدرات الأساسية">Core Capabilities</span>
            <h2 class="section-title" data-en="Everything You Need to Run Your Business" data-ar="كل ما تحتاجه لإدارة أعمالك">Everything You Need to Run Your Business</h2>
            <p class="section-subtitle" data-en="A comprehensive suite of tools and features designed specifically to meet the needs of modern restaurants and retail businesses." data-ar="مجموعة شاملة من الأدوات والميزات المصممة خصيصاً لتلبية احتياجات المطاعم وتجارة التجزئة الحديثة.">A comprehensive suite of tools and features designed specifically to meet the needs of modern restaurants and retail businesses.</p>
        </div>
        <div class="responsive-grid" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;">
            @php
            $features = [
                ['icon'=>'fa-cash-register','color'=>'#7c3aed','bg'=>'rgba(124,58,237,0.12)','en_title'=>'Smart POS','ar_title'=>'نقطة بيع ذكية','en_desc'=>'Lightning-fast, intuitive interface for receiving orders and managing sales efficiently.','ar_desc'=>'واجهة سهلة الاستخدام لاستقبال الطلبات وإدارة المبيعات بسرعة وكفاءة.'],
                ['icon'=>'fa-boxes','color'=>'#3b9ef5','bg'=>'rgba(59,158,245,0.12)','en_title'=>'Inventory Management','ar_title'=>'إدارة المخزون','en_desc'=>'Real-time inventory tracking with automated low-stock alerts and purchase orders.','ar_desc'=>'تتبع المخزون في الوقت الفعلي مع تنبيهات آلية للمنتجات المنخفضة.'],
                ['icon'=>'fa-chart-bar','color'=>'#10b981','bg'=>'rgba(16,185,129,0.12)','en_title'=>'Advanced Reports','ar_title'=>'تقارير متقدمة','en_desc'=>'Comprehensive analytics and a smart dashboard for making well-informed decisions.','ar_desc'=>'تحليلات شاملة ولوحة تحكم ذكية لاتخاذ قرارات مدروسة.'],
                ['icon'=>'fa-kitchen-set','color'=>'#f59e0b','bg'=>'rgba(245,158,11,0.12)','en_title'=>'Kitchen Display (KDS)','ar_title'=>'شاشة المطبخ','en_desc'=>'Streamlined order display for kitchen staff to ensure fast and accurate preparation.','ar_desc'=>'عرض الطلبات للمطبخ بشكل منظم لضمان سرعة التحضير.'],
                ['icon'=>'fa-qrcode','color'=>'#ef4444','bg'=>'rgba(239,68,68,0.12)','en_title'=>'QR Digital Menu','ar_title'=>'قائمة QR التفاعلية','en_desc'=>'Interactive digital menu allowing customers to order directly from their smartphones.','ar_desc'=>'قائمة رقمية تفاعلية للعملاء للطلب مباشرة من هواتفهم.'],
                ['icon'=>'fa-building-user','color'=>'#8b5cf6','bg'=>'rgba(139,92,246,0.12)','en_title'=>'Branch Management','ar_title'=>'إدارة الفروع','en_desc'=>'Full control over all your branches from a single unified dashboard.','ar_desc'=>'تحكم كامل في جميع فروعك من لوحة تحكم واحدة.'],
            ];
            @endphp
            @foreach($features as $f)
            <div class="reveal-card" style="background:linear-gradient(135deg,#111128,#0d0d1f);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:32px;transition:all 0.3s;position:relative;overflow:hidden;"
                onmouseenter="this.style.transform='translateY(-8px)';this.style.borderColor='{{ $f['color'] }}40';"
                onmouseleave="this.style.transform='translateY(0)';this.style.borderColor='rgba(255,255,255,0.06)';">
                <div style="width:60px;height:60px;border-radius:16px;background:{{ $f['bg'] }};border:1px solid {{ $f['color'] }}30;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
                    <i class="fas {{ $f['icon'] }}" style="font-size:1.5rem;color:{{ $f['color'] }};"></i>
                </div>
                <h3 style="font-size:1.1rem;font-weight:700;margin-bottom:10px;color:#fff;" data-en="{{ $f['en_title'] }}" data-ar="{{ $f['ar_title'] }}">{{ $f['en_title'] }}</h3>
                <p style="font-size:0.9rem;color:rgba(255,255,255,0.55);line-height:1.7;" data-en="{{ $f['en_desc'] }}" data-ar="{{ $f['ar_desc'] }}">{{ $f['en_desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center" style="margin-top:48px;">
            <a href="https://www.get-x9.com/ar/features" target="_blank" style="background:linear-gradient(135deg,#7c3aed,#5b21b6);color:#fff;padding:14px 36px;border-radius:50px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:10px;font-size:1rem;">
                <i class="fas fa-rocket"></i>
                <span data-en="Explore All Features" data-ar="استكشف جميع المميزات">Explore All Features</span>
            </a>
        </div>
    </div>
</section>

{{-- BUSINESS INTELLIGENCE --}}
<section style="padding:100px 0;background:linear-gradient(135deg,#0f0c29,#1a1040);">
    <div class="container">
        <div class="responsive-grid" style="grid-template-columns: 1fr 1fr; align-items: center;">
            <div class="reveal-up">
                <span class="sub-badge" data-en="Business Intelligence" data-ar="ذكاء الأعمال">Business Intelligence</span>
                <h2 class="section-title" style="text-align:left;" data-en="Understand Your Business With Heat Maps & Smart Analytics" data-ar="افهم أعمالك بالخرائط الحرارية والتحليلات الذكية">
                    Understand Your Business With <span style="color:#7c3aed;">Heat Maps</span> & Smart Analytics
                </h2>
                <p style="color:rgba(255,255,255,0.65);line-height:1.8;margin-bottom:32px;" data-en="Interactive heat maps to understand the rhythm of your restaurant and improve performance." data-ar="خرائط حرارية تفاعلية لفهم إيقاع مطعمك وتحسين الأداء.">
                    Interactive heat maps to understand the rhythm of your restaurant and improve performance.
                </p>
                <div class="responsive-grid" style="gap:16px;">
                    <div style="background:rgba(124,58,237,0.1);border:1px solid rgba(124,58,237,0.25);border-radius:16px;padding:20px;">
                        <div style="font-size:1.5rem;margin-bottom:8px;">🔥</div>
                        <h4 style="color:#fff;font-weight:700;margin-bottom:6px;" data-en="Sales Heat Map" data-ar="الخريطة الحرارية للمبيعات">Sales Heat Map</h4>
                        <p style="font-size:0.82rem;color:rgba(255,255,255,0.55);" data-en="Discover peak selling hours and quiet times." data-ar="اكتشف ذروة البيع والأوقات الهادئة.">Discover peak selling hours and quiet times.</p>
                    </div>
                    <div style="background:rgba(59,158,245,0.1);border:1px solid rgba(59,158,245,0.25);border-radius:16px;padding:20px;">
                        <div style="font-size:1.5rem;margin-bottom:8px;">📊</div>
                        <h4 style="color:#fff;font-weight:700;margin-bottom:6px;" data-en="Table Heat Map" data-ar="الخريطة الحرارية للطاولات">Table Heat Map</h4>
                        <p style="font-size:0.82rem;color:rgba(255,255,255,0.55);" data-en="Performance per table at a glance." data-ar="أداء كل طاولة بنظرة واحدة.">Performance per table at a glance.</p>
                    </div>
                </div>
                <a href="https://www.get-x9.com/ar/features#bi" target="_blank" style="display:inline-flex;align-items:center;gap:8px;color:#a78bfa;text-decoration:none;font-weight:600;margin-top:24px;">
                    <span data-en="Discover Our Smart Analytics" data-ar="اكتشف تحليلاتنا الذكية">Discover Our Smart Analytics</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="reveal-up responsive-grid" style="grid-template-columns: 1fr 1fr; gap:16px;">
                @php
                $stats = [
                    ['icon'=>'📈','value'=>'+40%','label_en'=>'Sales Growth','label_ar'=>'نمو المبيعات','color'=>'#10b981'],
                    ['icon'=>'⚡','value'=>'3x','label_en'=>'Faster Orders','label_ar'=>'أسرع طلبات','color'=>'#f59e0b'],
                    ['icon'=>'💰','value'=>'30%','label_en'=>'Cost Savings','label_ar'=>'توفير التكاليف','color'=>'#3b9ef5'],
                    ['icon'=>'⭐','value'=>'4.9/5','label_en'=>'Customer Rating','label_ar'=>'تقييم العملاء','color'=>'#7c3aed'],
                ];
                @endphp
                @foreach($stats as $s)
                <div style="background:linear-gradient(135deg,#111128,#0d0d1f);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:28px;text-align:center;">
                    <div style="font-size:2.5rem;margin-bottom:8px;">{{ $s['icon'] }}</div>
                    <div style="font-size:2rem;font-weight:800;color:{{ $s['color'] }};margin-bottom:4px;">{{ $s['value'] }}</div>
                    <div style="font-size:0.82rem;color:rgba(255,255,255,0.5);" data-en="{{ $s['label_en'] }}" data-ar="{{ $s['label_ar'] }}">{{ $s['label_en'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- BUSINESS TYPES --}}
<section style="padding:100px 0;background:#0a0a1a;">
    <div class="container">
        <div class="section-header text-center reveal-up" style="margin-bottom:60px;">
            <span class="sub-badge" data-en="Use Cases" data-ar="حالات الاستخدام">Use Cases</span>
            <h2 class="section-title" data-en="Built for Every Type of Business" data-ar="مناسب لجميع أنواع الأعمال">Built for Every Type of Business</h2>
        </div>
        <div class="responsive-grid" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:20px;">
            @php
            $types = [
                ['icon'=>'🍽️','en'=>'Restaurants','ar'=>'المطاعم'],
                ['icon'=>'☕','en'=>'Cafes','ar'=>'المقاهي'],
                ['icon'=>'🛒','en'=>'Retail Stores','ar'=>'متاجر التجزئة'],
                ['icon'=>'🍕','en'=>'Pizzerias','ar'=>'بيتزا'],
                ['icon'=>'🧋','en'=>'Bubble Tea','ar'=>'شاي بالحليب'],
                ['icon'=>'🍿','en'=>'Food Courts','ar'=>'مطاعم الفود كورت'],
            ];
            @endphp
            @foreach($types as $t)
            <div class="reveal-card" style="background:linear-gradient(135deg,#111128,#0d0d1f);border:1px solid rgba(255,255,255,0.06);border-radius:20px;padding:28px;text-align:center;transition:all 0.3s;cursor:default;"
                onmouseenter="this.style.transform='translateY(-6px)';this.style.borderColor='rgba(124,58,237,0.4)';"
                onmouseleave="this.style.transform='';this.style.borderColor='rgba(255,255,255,0.06)';">
                <div style="font-size:3rem;margin-bottom:12px;">{{ $t['icon'] }}</div>
                <div style="font-size:0.95rem;font-weight:600;color:#fff;" data-en="{{ $t['en'] }}" data-ar="{{ $t['ar'] }}">{{ $t['en'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section style="padding:100px 0;background:linear-gradient(135deg,#0f0c29,#1a1040);">
    <div class="container">
        <div class="section-header text-center reveal-up" style="margin-bottom:60px;">
            <span class="sub-badge" data-en="Client Love" data-ar="آراء العملاء">Client Love</span>
            <h2 class="section-title" data-en="What Our Clients Say" data-ar="ماذا يقول عملاؤنا">What Our Clients Say</h2>
        </div>
        <div class="responsive-grid" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;">
            @php
            $testimonials = [
                ['text_en'=>'An amazing system that completely changed how we manage our restaurant. Now we track everything easily.','text_ar'=>'نظام رائع غيّر طريقة إدارتنا للمطعم بالكامل. الآن نتابع كل شيء بسهولة.','author'=>'Ahmed K.','role_en'=>'Restaurant Owner','role_ar'=>'صاحب مطعم'],
                ['text_en'=>'Excellent technical support and easy to use system. I highly recommend it to all restaurant owners.','text_ar'=>'الدعم الفني ممتاز والنظام سهل الاستخدام. أنصح به بشدة.','author'=>'Sara M.','role_en'=>'Cafe Manager','role_ar'=>'مدير مقهى'],
                ['text_en'=>'We saved a huge amount of time and effort. The reports are accurate and very detailed.','text_ar'=>'وفرنا الكثير من الوقت والجهد. تقارير دقيقة ومفصلة.','author'=>'Omar T.','role_en'=>'Retail Director','role_ar'=>'مدير التجزئة'],
            ];
            @endphp
            @foreach($testimonials as $t)
            <div class="reveal-card" style="background:linear-gradient(135deg,#111128,#0d0d1f);border:1px solid rgba(255,255,255,0.07);border-radius:20px;padding:32px;">
                <div style="color:#f59e0b;font-size:1.2rem;margin-bottom:16px;">★★★★★</div>
                <p style="color:rgba(255,255,255,0.75);line-height:1.8;margin-bottom:24px;font-style:italic;" data-en="{{ $t['text_en'] }}" data-ar="{{ $t['text_ar'] }}">"{{ $t['text_en'] }}"</p>
                <div style="display:flex;align-items:center;gap:12px;">
                    <div style="width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#5b21b6);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:0.9rem;">{{ substr($t['author'],0,1) }}</div>
                    <div>
                        <div style="color:#fff;font-weight:700;font-size:0.95rem;">{{ $t['author'] }}</div>
                        <div style="color:rgba(255,255,255,0.45);font-size:0.8rem;" data-en="{{ $t['role_en'] }}" data-ar="{{ $t['role_ar'] }}">{{ $t['role_en'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- HOW TO START --}}
<section style="padding:100px 0;background:#0a0a1a;">
    <div class="container">
        <div class="section-header text-center reveal-up" style="margin-bottom:60px;">
            <span class="sub-badge" data-en="Simple Onboarding" data-ar="تهيئة بسيطة">Simple Onboarding</span>
            <h2 class="section-title" data-en="Get Started in 3 Simple Steps" data-ar="ابدأ في 3 خطوات بسيطة">Get Started in 3 Simple Steps</h2>
        </div>
        <div class="responsive-grid" style="grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:32px;">
            @php
            $steps = [
                ['num'=>'01','icon'=>'fa-user-plus','color'=>'#7c3aed','en_title'=>'Create Your Account','ar_title'=>'سجّل حسابك','en_desc'=>'Create a free account in minutes with no credit card required.','ar_desc'=>'أنشئ حساباً مجانياً في دقائق.'],
                ['num'=>'02','icon'=>'fa-sliders','color'=>'#3b9ef5','en_title'=>'Configure Your System','ar_title'=>'أعدّ نظامك','en_desc'=>'Add your products, customize settings and set up your branches.','ar_desc'=>'أضف منتجاتك وخصص إعداداتك.'],
                ['num'=>'03','icon'=>'fa-rocket','color'=>'#10b981','en_title'=>'Start Selling','ar_title'=>'ابدأ البيع','en_desc'=>'Receive orders and track your profits in real time from any device.','ar_desc'=>'استقبل الطلبات وتابع أرباحك.'],
            ];
            @endphp
            @foreach($steps as $step)
            <div class="reveal-card" style="text-align:center;padding:40px 28px;background:linear-gradient(135deg,#111128,#0d0d1f);border:1px solid rgba(255,255,255,0.06);border-radius:20px;position:relative;">
                <div style="position:absolute;top:20px;right:20px;font-size:3rem;font-weight:900;color:rgba(255,255,255,0.04);line-height:1;">{{ $step['num'] }}</div>
                <div style="width:70px;height:70px;border-radius:20px;background:linear-gradient(135deg,{{ $step['color'] }},{{ $step['color'] }}aa);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                    <i class="fas {{ $step['icon'] }}" style="font-size:1.6rem;color:#fff;"></i>
                </div>
                <h3 style="color:#fff;font-weight:700;margin-bottom:10px;" data-en="{{ $step['en_title'] }}" data-ar="{{ $step['ar_title'] }}">{{ $step['en_title'] }}</h3>
                <p style="color:rgba(255,255,255,0.55);font-size:0.9rem;line-height:1.7;" data-en="{{ $step['en_desc'] }}" data-ar="{{ $step['ar_desc'] }}">{{ $step['en_desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section style="padding:100px 0;background:linear-gradient(135deg,#1a0a2e,#0f0c29);">
    <div class="container text-center reveal-up">
        <div style="max-width:700px;margin:0 auto;">
            <div style="font-size:3rem;margin-bottom:16px;">🚀</div>
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;margin-bottom:20px;" data-en="Start Your Journey Free!" data-ar="ابدأ رحلتك مجاناً!">Start Your Journey <span style="background:linear-gradient(135deg,#7c3aed,#3b9ef5);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Free!</span></h2>
            <p style="color:rgba(255,255,255,0.65);font-size:1.1rem;margin-bottom:40px;line-height:1.7;" data-en="Get 6 months free on all plans. Limited time offer — don't miss out!" data-ar="احصل على 6 أشهر مجانية على جميع الخطط. العرض ينتهي قريباً، لا تفوت الفرصة!">
                Get 6 months free on all plans. Limited time offer — don't miss out!
            </p>
            <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
                <a href="https://console.get-x9.com/offer-6months-free?lang=ar" target="_blank"
                    style="background:linear-gradient(135deg,#7c3aed,#5b21b6);color:#fff;padding:16px 40px;border-radius:50px;font-weight:700;text-decoration:none;font-size:1.1rem;box-shadow:0 12px 40px rgba(124,58,237,0.45);transition:all 0.3s;"
                    data-en="🎁  Get 6 Months Free" data-ar="🎁  احصل على عرض الـ 6 أشهر">🎁  Get 6 Months Free</a>
                <a href="https://www.get-x9.com/ar" target="_blank"
                    style="border:2px solid rgba(255,255,255,0.3);color:#fff;padding:16px 40px;border-radius:50px;font-weight:700;text-decoration:none;font-size:1.1rem;"
                    data-en="Learn More" data-ar="اعرف المزيد">Learn More</a>
            </div>
            <p style="color:rgba(255,255,255,0.4);font-size:0.85rem;margin-top:20px;" data-en="⌛ Offer ends soon — act now!" data-ar="⌛ العرض ينتهي قريباً - لا تفوت الفرصة!">⌛ Offer ends soon — act now!</p>
        </div>
    </div>
</section>

@include('partials.testimonials')
@include('partials.blog_section')
@endsection

@push('styles')
<style>
  @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-20px)} }
  @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.5} }
</style>
@endpush
