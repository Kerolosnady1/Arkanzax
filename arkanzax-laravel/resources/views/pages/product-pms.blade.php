@extends('layouts.app')
@section('title', 'Property Management System | Arkanzax')
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
      display: none; /* remove redundant style as we will use responsive-grid class */
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
      color: #10b981;
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
<!-- ═══════ HERO ═══════ -->
    <section class="inner-hero">
      <div class="container">
        <span class="hero-badge reveal-up" style="border-color: #11a4d4; color: #11a4d4;">
          <i class="fas fa-building"></i>&nbsp;
          <span data-en="Premium Product" data-ar="منتج متميز">Premium Product</span>
        </span>
        <h1 class="hero-title reveal-up" data-en="Property Management System" data-ar="نظام إدارة العقارات">
          Property Management System
        </h1>
        <p class="hero-description reveal-up"
          data-en="A cloud platform built specifically for the real estate market — combining payment management, resident communication, HOA tools, and smart analytics in one seamless solution."
          data-ar="منصة سحابية مبنية خصيصاً للسوق العقاري — تجمع إدارة المدفوعات وتواصل السكان وأدوات HOA والتحليلات الذكية في حل واحد.">
          A cloud platform built specifically for the real estate market — combining payment management, resident
          communication, HOA tools, and smart analytics in one seamless solution.
        </p>
      </div>
    </section>

    <!-- ═══════ THE PROBLEM ═══════ -->
    <section class="service-content" style="background: var(--dark-3);">
      <div class="container">
        <h2 style="text-align:center; color: var(--white); margin-bottom: 48px; font-size: 2.2rem;" data-en="The Problems We Solve" data-ar="المشاكل التي نحلها">The Problems We
          Solve</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 28px;">
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-database" style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;" data-en="Incomplete Property Data" data-ar="بيانات عقارية غير مكتملة">Incomplete Property Data</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;" data-en="Fragmented records make it impossible to get a clear picture of your portfolio's health and history." data-ar="السجلات المجزأة تجعل من المستحيل الحصول على صورة واضحة لصحة وتاريخ محفظتك.">Fragmented records make it impossible to get a
              clear picture of your portfolio's health and history.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-chart-line"
              style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;" data-en="Decision-Making Difficulties" data-ar="صعوبات اتخاذ القرار">Decision-Making Difficulties</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;" data-en="Lack of real-time dashboards forces managers to rely on guesswork instead of data-driven insights." data-ar="نقص لوحات المراقبة الفورية يجبر المديرين على الاعتماد على التخمين بدلاً من الرؤى المدفوعة بالبيانات.">Lack of real-time dashboards forces managers to
              rely on guesswork instead of data-driven insights.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-money-bill-wave"
              style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;" data-en="Financial Tracking Issues" data-ar="مشاكل التتبع المالي">Financial Tracking Issues</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;" data-en="Collecting rent on time is complicated — tracking who paid (or didn't) wastes hours every month." data-ar="تحصيل الإيجار في الوقت المحدد معقد — تتبع من دفع (أو لم يدفع) يضيع ساعات كل شهر.">Collecting rent on time is complicated —
              tracking who paid (or didn't) wastes hours every month.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-comments" style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;" data-en="Ineffective Communication" data-ar="تواصل غير فعال">Ineffective Communication</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;" data-en="Poor channels between residents, the developer, and the association lead to frustration and slow resolution." data-ar="القنوات الضعيفة بين السكان والمطور والجمعية تؤدي إلى الإحباط وبطء الحل.">Poor channels between residents, the developer,
              and the association lead to frustration and slow resolution.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-gavel" style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;" data-en="Unclear Accountability" data-ar="مسؤولية غير واضحة">Unclear Accountability</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;" data-en="Inability to track association decisions and enforce financial obligations creates disputes." data-ar="عدم القدرة على تتبع قرارات الجمعية وإنفاذ الالتزامات المالية يخلق نزاعات.">Inability to track association decisions and
              enforce financial obligations creates disputes.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-exclamation-triangle"
              style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;" data-en="No Emergency Hotline Access" data-ar="لا يوجد وصول للخطوط الساخنة">No Emergency Hotline Access</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;" data-en="Compounds often have no centralised way for residents to reach emergency numbers quickly." data-ar="غالبًا ما لا تملك المجمعات السكنية وسيلة مركزية للسكان للوصول إلى أرقام الطوارئ بسرعة.">Compounds often have no centralised way for
              residents to reach emergency numbers quickly.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ CORE SOLUTION ═══════ -->
    <section class="service-content">
      <div class="container">
        <div class="responsive-grid">
          <div class="content-text reveal-left">
            <h2 data-en="A Complete Digital Transformation for Your Compound" data-ar="تحول رقمي كامل للمجمع السكني الخاص بك">A Complete Digital Transformation for Your Compound</h2>
            <p data-en="My Compound (PMS) is a cloud platform that digitises every aspect of property management — from invoicing and payments to resident communication and community governance. With 150+ projects handled, we know what it takes to scale."
               data-ar="My Compound (PMS) هي منصة سحابية ترقمن كل جانب من جوانب إدارة العقارات — من الفواتير والمدفوعات إلى تواصل السكان وحوكمة المجتمع. مع التعامل مع أكثر من 150 مشروعاً، نحن نعرف ما يلزم للتوسع.">My Compound (PMS) is a cloud platform that digitises every aspect of property management — from invoicing
              and payments to resident communication and community governance. With <strong style="color:#11a4d4;">150+
                projects</strong> handled, we know what it takes to scale.</p>
            <ul class="feature-list">
              <li><i class="fas fa-mobile-alt"></i> <span data-en="Mobile Application for iOS & Android" data-ar="تطبيق الهاتف لنظامي iOS و Android">Mobile Application for iOS &amp; Android</span></li>
              <li><i class="fas fa-chart-pie"></i> <span data-en="Real-Time Management Dashboard" data-ar="لوحة تحكم إدارة فورية">Real-Time Management Dashboard</span></li>
              <li><i class="fas fa-building"></i> <span data-en="Digitise Buildings & Ownership Documents" data-ar="رقمنة المباني ووثائق الملكية">Digitise Buildings &amp; Ownership Documents</span></li>
              <li><i class="fas fa-file-invoice-dollar"></i> <span data-en="Invoice Modules per Unit Size" data-ar="نماذج الفواتير لكل حجم وحدة">Invoice Modules per Unit Size</span></li>
              <li><i class="fas fa-exchange-alt"></i> <span data-en="Transfer of Ownership Requests" data-ar="طلبات نقل الملكية">Transfer of Ownership Requests</span></li>
              <li><i class="fas fa-vote-yea"></i> <span data-en="Voting & Posts Module for Residents" data-ar="نموذج التصويت والمنشورات للسكان">Voting &amp; Posts Module for Residents</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="{{ asset('assets/images/services/cloud.png') }}"
              alt="My Compound Dashboard" />
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ APP FEATURES ═══════ -->
    <section class="service-content" style="background: var(--dark-2);">
      <div class="container">
        <h2 style="text-align:center; color: var(--white); margin-bottom: 14px; font-size: 2.2rem;" data-en="My Compound — App Features" data-ar="My Compound — ميزات التطبيق">My Compound — App
          Features</h2>
        <p style="text-align:center; color: rgba(255,255,255,0.6); max-width:640px; margin: 0 auto 48px;" data-en="The ultimate communication tool between residents and the developer — all in one place." data-ar="أداة التواصل الأفضل بين السكان والمطور — كل ذلك في مكان واحد.">The ultimate
          communication tool between residents and the developer — all in one place.</p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-comment-dots"
              style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Real-Time Messaging" data-ar="المراسلة الفورية">Real-Time Messaging</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Enable residents to communicate instantly with the developer for inquiries, feedback, and assistance." data-ar="تمكين السكان من التواصل الفوري مع المطور للاستفسارات والملاحظات والمساعدة.">Enable residents to communicate instantly with
              the developer for inquiries, feedback, and assistance.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-bell" style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Personalised Notifications" data-ar="إشعارات مخصصة">Personalised Notifications</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Personalised alerts for updates, events, maintenance schedules, and important announcements." data-ar="تنبيهات مخصصة للتحديثات والفعاليات وجداول الصيانة والإعلانات الهامة.">Personalised alerts for updates, events,
              maintenance schedules, and important announcements.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-vr-cardboard"
              style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Virtual Property Tours" data-ar="جولات عقارية افتراضية">Virtual Property Tours</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Immersive virtual tours of properties within the compound for remote viewing from anywhere." data-ar="جولات افتراضية غامرة للعقارات داخل المجمع للمشاهدة عن بعد من أي مكان.">Immersive virtual tours of properties within the
              compound for remote viewing from anywhere.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-sliders-h" style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Customisation Options" data-ar="خيارات التخصيص">Customisation Options</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Users can personalise their settings, notifications, and preferences for a tailored experience." data-ar="يمكن للمستخدمين تخصيص إعداداتهم وإشعاراتهم وتفضيلاتهم لتجربة مخصصة.">Users can personalise their settings,
              notifications, and preferences for a tailored experience.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-headset" style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Improved Customer Service" data-ar="خدمة عملاء محسنة">Improved Customer Service</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Enhance support by addressing queries promptly and offering timely, personalised assistance." data-ar="تحسين الدعم من خلال معالجة الاستفسارات على الفور وتقديم مساعدة مخصصة في الوقت المناسب.">Enhance support by addressing queries promptly
              and offering timely, personalised assistance.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-shield-alt"
              style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;" data-en="Security & Privacy" data-ar="الأمن والخصوصية">Security &amp; Privacy</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;" data-en="Robust security measures to safeguard user data, ensure privacy, and build trust with every resident." data-ar="تدابير أمنية قوية لحماية بيانات المستخدم وضمان الخصوصية وبناء الثقة مع كل ساكن.">Robust security measures to safeguard user data,
              ensure privacy, and build trust with every resident.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ HOA MANAGEMENT HUB ═══════ -->
    <section class="service-content">
      <div class="container">
        <div class="responsive-grid" style="grid-template-columns: 0.9fr 1.1fr;">
          <div class="content-image reveal-left">
            <img src="{{ asset('assets/images/services/api.png') }}"
              alt="HOA Management Hub Dashboard" />
          </div>
          <div class="content-text reveal-right">
            <h2 data-en="MyCompound: HOA Management Hub" data-ar="MyCompound: مركز إدارة HOA">MyCompound: HOA Management Hub</h2>
            <p data-en="A revolutionary application designed to empower homeowners associations (HOAs) by streamlining communication, enhancing transparency, and fostering a stronger sense of community within your apartment complex."
               data-ar="تطبيق ثوري مصمم لتمكين جمعيات الملاك (HOAs) من خلال تبسيط التواصل وتعزيز الشفافية وتعزيز شعور أقوى بالمجتمع داخل مجمعك السكني.">A revolutionary application designed to empower homeowners associations (HOAs) by streamlining
              communication, enhancing transparency, and fostering a stronger sense of community within your apartment
              complex.</p>
            <ul class="feature-list">
              <li><i class="fas fa-file-invoice"></i> <span data-en="Invoicing & Payment History — Full traceability of all transactions per unit" data-ar="الفواتير وتاريخ الدفع — تتبع كامل لجميع المعاملات لكل وحدة"><strong>Invoicing &amp; Payment History</strong> — Full
                  traceability of all transactions per unit</span></li>
              <li><i class="fas fa-clock"></i> <span data-en="Reminders & Alerts — Automated reminders for payments, events, and maintenance" data-ar="التذكيرات والتنبيهات — تذكيرات تلقائية للمدفوعات والفعاليات والصيانة"><strong>Reminders &amp; Alerts</strong> — Automated reminders for
                  payments, events, and maintenance</span></li>
              <li><i class="fas fa-envelope"></i> <span data-en="Private Messaging — Direct channels between homeowners and the association" data-ar="المراسلة الخاصة — قنوات مباشرة بين أصحاب المنازل والجمعية"><strong>Private Messaging</strong> — Direct channels between
                  homeowners and the association</span></li>
              <li><i class="fas fa-newspaper"></i> <span data-en="Community News Feeds — Centralised event calendar and community posts" data-ar="خلاصات أخبار المجتمع — تقويم فعاليات مركزي ومنشورات مجتمعية"><strong>Community News Feeds</strong> — Centralised event
                  calendar and community posts</span></li>
              <li><i class="fas fa-bolt"></i> <span data-en="Emergency Alerts — Instantly disseminate critical information to all residents" data-ar="تنبيهات الطوارئ — نشر المعلومات الهامة على الفور لجميع السكان"><strong>Emergency Alerts</strong> — Instantly disseminate critical
                  information to all residents</span></li>
              <li><i class="fas fa-folder-open"></i> <span data-en="Document Repository — Bylaws, meeting minutes, and essential files organised for easy access" data-ar="مستودع المستندات — اللوائح ومحاضر الاجتماعات والملفات الأساسية المنظمة ليسهل الوصول إليها"><strong>Document Repository</strong> — Bylaws, meeting
                  minutes, and essential files organised for easy access</span></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ PAYMENT MODULES ═══════ -->
    <section class="service-content" style="background: var(--dark-3);">
      <div class="container">
        <h2 style="text-align:center; color:var(--white); margin-bottom:14px; font-size:2.2rem;" data-en="Payment & Financial Modules" data-ar="نماذج الدفع والمالية">Payment &amp; Financial
          Modules</h2>
        <p style="text-align:center; color:rgba(255,255,255,0.6); max-width:600px; margin:0 auto 48px;" data-en="Comprehensive tools to handle every aspect of payment collection and financial management." data-ar="أدوات شاملة للتعامل مع كل جانب من جوانب تحصيل المدفوعات والإدارة المالية.">Comprehensive
          tools to handle every aspect of payment collection and financial management.</p>
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap:20px;">
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-file-invoice-dollar"
              style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Reminder Invoices" data-ar="فواتير التذكير">Reminder Invoices</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="Automated payment reminders sent to residents before due dates." data-ar="تذكيرات دفع تلقائية ترسل للسكان قبل تواريخ الاستحقاق.">Automated payment reminders sent to residents
                before due dates.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-exclamation-circle"
              style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Overdue Module" data-ar="نموذج المتأخرات">Overdue Module</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="Track overdue payments with structured follow-up workflows." data-ar="تتبع المدفوعات المتأخرة مع سير عمل متابعة منظم.">Track overdue payments with structured
                follow-up workflows.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-credit-card" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Diverse Payment Options" data-ar="خيارات دفع متنوعة">Diverse Payment Options</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="Card, bank transfer, and mobile wallet payments all accepted." data-ar="قبول البطاقات، التحويل البنكي، ومدفوعات المحفظة الإلكترونية.">Card, bank transfer, and mobile wallet
                payments all accepted.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-divide" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Partial Payments" data-ar="مدفوعات جزئية">Partial Payments</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="Flexible instalments support for resident convenience." data-ar="دعم الأقساط المرنة لراحة السكان.">Flexible instalments support for resident
                convenience.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-receipt" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Digital Receipts" data-ar="إيصالات رقمية">Digital Receipts</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="Instant electronic receipts delivered after every transaction." data-ar="إيصالات إلكترونية فورية يتم تسليمها بعد كل معاملة.">Instant electronic receipts delivered after
                every transaction.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-wrench" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Maintenance Module" data-ar="نموذج الصيانة">Maintenance Module</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="Log, assign, and track maintenance requests to resolution." data-ar="تسجيل وتخصيص وتتبع طلبات الصيانة حتى الحل.">Log, assign, and track maintenance requests to
                resolution.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-water" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Utilities Module" data-ar="نموذج المرافق">Utilities Module</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="Track and bill utilities per unit with automated invoicing." data-ar="تتبع وفواتير المرافق لكل وحدة مع فواتير تلقائية.">Track and bill utilities per unit with
                automated invoicing.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-phone-alt" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;" data-en="Emergency Hotlines" data-ar="خطوط الطوارئ الساخنة">Emergency Hotlines</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;" data-en="City-level emergency numbers embedded directly in the resident app." data-ar="أرقام الطوارئ على مستوى المدينة مدمجة مباشرة في تطبيق السكان.">City-level emergency numbers embedded directly
                in the resident app.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ PRICING ═══════ -->
    <section class="service-content" style="background: var(--dark-2);">
      <div class="container">
        <h2 style="text-align:center; color:var(--white); margin-bottom:48px; font-size:2.2rem;" data-en="Revenue & Subscription Plans" data-ar="خطط الإيرادات والاشتراك">Revenue &amp;
          Subscription Plans</h2>
        <div
          style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:28px; max-width:900px; margin:0 auto;">
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">250 EGP</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;" data-en="Per User / Month" data-ar="لكل مستخدم / شهر">Per User / Month</div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;" data-en="Resident subscription plan" data-ar="خطة اشتراك الساكن">Resident subscription plan</div>
          </div>
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">2%</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;" data-en="Per Transaction (Resident)" data-ar="لكل معاملة (للسكان)">Per Transaction (Resident)
            </div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;" data-en="On all resident payments processed" data-ar="على جميع مدفوعات السكان المعالجة">On all resident payments processed</div>
          </div>
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">180K EGP</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;" data-en="Developer Plan / Project" data-ar="خطة المطور / المشروع">Developer Plan / Project
            </div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;" data-en="Full developer licence with all modules" data-ar="ترخيص مطور كامل مع جميع النماذج">Full developer licence with all modules</div>
          </div>
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">2 EGP</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;" data-en="Per Transaction (Developer)" data-ar="لكل معاملة (للمطور)">Per Transaction (Developer)
            </div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;" data-en="Low flat fee on developer-managed transactions" data-ar="رسوم ثابتة منخفضة على المعاملات التي يديرها المطور">Low flat fee on developer-managed transactions
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ CTA ═══════ -->
    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2 data-en="Ready to Digitise Your Compound?" data-ar="هل أنت مستعد لرقمنة مجمعك السكني؟">Ready to Digitise Your Compound?</h2>
          <p data-en="Join 150+ projects already running on My Compound. Empower your residents and turn your software into a revenue source — not just a cost."
             data-ar="انضم إلى أكثر من 150 مشروعاً يعمل بالفعل على My Compound. قم بتمكين سكانك وحوّل برامجك إلى مصدر دخل — وليس مجرد تكلفة.">Join <strong>150+ projects</strong> already running on My Compound. Empower your residents and turn your
            software into a revenue source — not just a cost.</p>
          <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
            <a href="{{ route('home') }}#contact" class="btn btn-primary" data-en="Schedule a Demo" data-ar="جدولة عرض توضيحي">Schedule a Demo</a>
            <a href="{{ route('home') }}#contact" class="btn"
              style="border:1px solid rgba(255,255,255,0.2); color:var(--white);" data-en="Contact Sales" data-ar="اتصل بالمبيعات">Contact Sales</a>
          </div>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
