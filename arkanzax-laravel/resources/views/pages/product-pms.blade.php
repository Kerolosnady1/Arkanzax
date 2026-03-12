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
        <h2 style="text-align:center; color: var(--white); margin-bottom: 48px; font-size: 2.2rem;">The Problems We
          Solve</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 28px;">
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-database" style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;">Incomplete Property Data</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;">Fragmented records make it impossible to get a
              clear picture of your portfolio's health and history.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-chart-line"
              style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;">Decision-Making Difficulties</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;">Lack of real-time dashboards forces managers to
              rely on guesswork instead of data-driven insights.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-money-bill-wave"
              style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;">Financial Tracking Issues</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;">Collecting rent on time is complicated —
              tracking who paid (or didn't) wastes hours every month.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-comments" style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;">Ineffective Communication</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;">Poor channels between residents, the developer,
              and the association lead to frustration and slow resolution.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-gavel" style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;">Unclear Accountability</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;">Inability to track association decisions and
              enforce financial obligations creates disputes.</p>
          </div>
          <div
            style="background: rgba(255,255,255,0.04); border: 1px solid rgba(17,164,212,0.15); border-radius: 16px; padding: 28px;">
            <i class="fas fa-exclamation-triangle"
              style="font-size: 2rem; color: #11a4d4; margin-bottom: 16px; display:block;"></i>
            <h3 style="color: var(--white); font-size: 1.1rem; margin-bottom: 10px;">No Emergency Hotline Access</h3>
            <p style="color: rgba(255,255,255,0.65); font-size: 0.9rem;">Compounds often have no centralised way for
              residents to reach emergency numbers quickly.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ CORE SOLUTION ═══════ -->
    <section class="service-content">
      <div class="container">
        <div class="content-grid">
          <div class="content-text reveal-left">
            <h2>A Complete Digital Transformation for Your Compound</h2>
            <p>My Compound (PMS) is a cloud platform that digitises every aspect of property management — from invoicing
              and payments to resident communication and community governance. With <strong style="color:#11a4d4;">150+
                projects</strong> handled, we know what it takes to scale.</p>
            <ul class="feature-list">
              <li><i class="fas fa-mobile-alt"></i> <span>Mobile Application for iOS &amp; Android</span></li>
              <li><i class="fas fa-chart-pie"></i> <span>Real-Time Management Dashboard</span></li>
              <li><i class="fas fa-building"></i> <span>Digitise Buildings &amp; Ownership Documents</span></li>
              <li><i class="fas fa-file-invoice-dollar"></i> <span>Invoice Modules per Unit Size</span></li>
              <li><i class="fas fa-exchange-alt"></i> <span>Transfer of Ownership Requests</span></li>
              <li><i class="fas fa-vote-yea"></i> <span>Voting &amp; Posts Module for Residents</span></li>
            </ul>
          </div>
          <div class="content-image reveal-right">
            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2000"
              alt="My Compound Dashboard" />
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ APP FEATURES ═══════ -->
    <section class="service-content" style="background: var(--dark-2);">
      <div class="container">
        <h2 style="text-align:center; color: var(--white); margin-bottom: 14px; font-size: 2.2rem;">My Compound — App
          Features</h2>
        <p style="text-align:center; color: rgba(255,255,255,0.6); max-width:640px; margin: 0 auto 48px;">The ultimate
          communication tool between residents and the developer — all in one place.</p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-comment-dots"
              style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;">Real-Time Messaging</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;">Enable residents to communicate instantly with
              the developer for inquiries, feedback, and assistance.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-bell" style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;">Personalised Notifications</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;">Personalised alerts for updates, events,
              maintenance schedules, and important announcements.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-vr-cardboard"
              style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;">Virtual Property Tours</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;">Immersive virtual tours of properties within the
              compound for remote viewing from anywhere.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-sliders-h" style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;">Customisation Options</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;">Users can personalise their settings,
              notifications, and preferences for a tailored experience.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-headset" style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;">Improved Customer Service</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;">Enhance support by addressing queries promptly
              and offering timely, personalised assistance.</p>
          </div>
          <div
            style="background: rgba(17,164,212,0.07); border: 1px solid rgba(17,164,212,0.2); border-radius: 16px; padding: 28px;">
            <i class="fas fa-shield-alt"
              style="font-size:1.8rem; color:#11a4d4; margin-bottom:14px; display:block;"></i>
            <h4 style="color:var(--white); margin-bottom:8px;">Security &amp; Privacy</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:0.88rem;">Robust security measures to safeguard user data,
              ensure privacy, and build trust with every resident.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ HOA MANAGEMENT HUB ═══════ -->
    <section class="service-content">
      <div class="container">
        <div class="content-grid" style="grid-template-columns: 0.9fr 1.1fr;">
          <div class="content-image reveal-left">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=2000"
              alt="HOA Management Hub Dashboard" />
          </div>
          <div class="content-text reveal-right">
            <h2>MyCompound: HOA Management Hub</h2>
            <p>A revolutionary application designed to empower homeowners associations (HOAs) by streamlining
              communication, enhancing transparency, and fostering a stronger sense of community within your apartment
              complex.</p>
            <ul class="feature-list">
              <li><i class="fas fa-file-invoice"></i> <span><strong>Invoicing &amp; Payment History</strong> — Full
                  traceability of all transactions per unit</span></li>
              <li><i class="fas fa-clock"></i> <span><strong>Reminders &amp; Alerts</strong> — Automated reminders for
                  payments, events, and maintenance</span></li>
              <li><i class="fas fa-envelope"></i> <span><strong>Private Messaging</strong> — Direct channels between
                  homeowners and the association</span></li>
              <li><i class="fas fa-newspaper"></i> <span><strong>Community News Feeds</strong> — Centralised event
                  calendar and community posts</span></li>
              <li><i class="fas fa-bolt"></i> <span><strong>Emergency Alerts</strong> — Instantly disseminate critical
                  information to all residents</span></li>
              <li><i class="fas fa-folder-open"></i> <span><strong>Document Repository</strong> — Bylaws, meeting
                  minutes, and essential files organised for easy access</span></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ PAYMENT MODULES ═══════ -->
    <section class="service-content" style="background: var(--dark-3);">
      <div class="container">
        <h2 style="text-align:center; color:var(--white); margin-bottom:14px; font-size:2.2rem;">Payment &amp; Financial
          Modules</h2>
        <p style="text-align:center; color:rgba(255,255,255,0.6); max-width:600px; margin:0 auto 48px;">Comprehensive
          tools to handle every aspect of payment collection and financial management.</p>
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap:20px;">
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-file-invoice-dollar"
              style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Reminder Invoices</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">Automated payment reminders sent to residents
                before due dates.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-exclamation-circle"
              style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Overdue Module</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">Track overdue payments with structured
                follow-up workflows.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-credit-card" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Diverse Payment Options</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">Card, bank transfer, and mobile wallet
                payments all accepted.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-divide" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Partial Payments</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">Flexible instalments support for resident
                convenience.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-receipt" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Digital Receipts</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">Instant electronic receipts delivered after
                every transaction.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-wrench" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Maintenance Module</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">Log, assign, and track maintenance requests to
                resolution.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-water" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Utilities Module</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">Track and bill utilities per unit with
                automated invoicing.</p>
            </div>
          </div>
          <div
            style="display:flex; align-items:flex-start; gap:14px; background:rgba(255,255,255,0.03); border-radius:12px; padding:20px; border:1px solid rgba(255,255,255,0.06);">
            <i class="fas fa-phone-alt" style="color:#11a4d4; font-size:1.4rem; margin-top:2px; flex-shrink:0;"></i>
            <div>
              <h5 style="color:var(--white); margin-bottom:4px;">Emergency Hotlines</h5>
              <p style="color:rgba(255,255,255,0.55); font-size:0.82rem;">City-level emergency numbers embedded directly
                in the resident app.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ PRICING ═══════ -->
    <section class="service-content" style="background: var(--dark-2);">
      <div class="container">
        <h2 style="text-align:center; color:var(--white); margin-bottom:48px; font-size:2.2rem;">Revenue &amp;
          Subscription Plans</h2>
        <div
          style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:28px; max-width:900px; margin:0 auto;">
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">250 EGP</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;">Per User / Month</div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;">Resident subscription plan</div>
          </div>
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">2%</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;">Per Transaction (Resident)
            </div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;">On all resident payments processed</div>
          </div>
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">180K EGP</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;">Developer Plan / Project
            </div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;">Full developer licence with all modules</div>
          </div>
          <div
            style="text-align:center; background: linear-gradient(135deg, rgba(17,164,212,0.12), rgba(17,164,212,0.04)); border:1px solid rgba(17,164,212,0.3); border-radius:20px; padding:40px 24px;">
            <div style="font-size:2.4rem; font-weight:900; color:#11a4d4; margin-bottom:8px;">2 EGP</div>
            <div style="color:rgba(255,255,255,0.7); font-size:0.85rem; margin-bottom:12px;">Per Transaction (Developer)
            </div>
            <div style="color:rgba(255,255,255,0.5); font-size:0.8rem;">Low flat fee on developer-managed transactions
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ CTA ═══════ -->
    <section class="cta-section">
      <div class="container">
        <div class="cta-inner reveal-up">
          <h2>Ready to Digitise Your Compound?</h2>
          <p>Join <strong>150+ projects</strong> already running on My Compound. Empower your residents and turn your
            software into a revenue source — not just a cost.</p>
          <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap;">
            <a href="{{ route('home') }}#contact" class="btn btn-primary">Schedule a Demo</a>
            <a href="{{ route('home') }}#contact" class="btn"
              style="border:1px solid rgba(255,255,255,0.2); color:var(--white);">Contact Sales</a>
          </div>
        </div>
      </div>
    </section>
    @include('partials.testimonials')

    @include('partials.blog_section')
@endsection
