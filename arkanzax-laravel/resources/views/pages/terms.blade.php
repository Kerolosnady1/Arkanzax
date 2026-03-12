@extends('layouts.app')
@section('title', 'Terms of Service | Arkanzax')
@section('head')
<style>
html[dir="rtl"] body {
      font-family: 'Cairo', 'Outfit', sans-serif;
    }

    .legal-content {
      padding: 160px 0 100px;
      max-width: 900px;
      margin: 0 auto;
    }

    @media (max-width: 768px) {
      .legal-content {
        padding: 120px 0 60px;
      }

      .legal-body {
        padding: 30px 20px;
        border-radius: var(--radius-md);
      }
    }

    .legal-body {
      background: var(--dark-card);
      padding: 60px;
      border-radius: var(--radius-lg);
      color: var(--text-dark);
      line-height: 1.8;
    }

    .legal-body h1 {
      color: var(--white);
      margin-bottom: 40px;
    }

    .legal-body h2 {
      color: var(--white);
      margin: 30px 0 15px;
      font-size: 1.5rem;
    }

    .legal-body p {
      margin-bottom: 20px;
    }
</style>
@endsection
@section('content')
<main class="container">
    <div class="legal-content reveal-up">
      <div class="legal-body">
        <h1 data-en="Terms of Service" data-ar="شروط الخدمة">Terms of Service</h1>
        <p data-en="Last updated: February 19, 2025" data-ar="آخر تحديث: 19 فبراير 2025">Last updated: February
          19, 2025</p>

        <h2 data-en="1. Acceptance of Terms" data-ar="1. قبول الشروط">1. Acceptance of Terms</h2>
        <p data-en="By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement."
          data-ar="من خلال الوصول إلى هذا الموقع واستخدامه، فإنك تقبل وتوافق على الالتزام بشروط وأحكام هذه الاتفاقية.">
          By accessing and using this website, you accept and agree to be bound by the terms and provision of
          this agreement.
        </p>

        <h2 data-en="2. Use of License" data-ar="2. رخصة الاستخدام">2. Use of License</h2>
        <p data-en="Permission is granted to temporarily download one copy of the materials on Arkanzax's website for personal, non-commercial transitory viewing only."
          data-ar="يُمنح الإذن لتنزيل نسخة واحدة مؤقتة من المواد الموجودة على موقع أركانزاكس للمشاهدة الشخصية العابرة وغير التجارية فقط.">
          Permission is granted to temporarily download one copy of the materials on Arkanzax's website for
          personal, non-commercial transitory viewing only.
        </p>

        <h2 data-en="3. Disclaimer" data-ar="3. إخلاء المسؤولية">3. Disclaimer</h2>
        <p data-en="The materials on Arkanzax's website are provided on an 'as is' basis. Arkanzax makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties."
          data-ar="يتم تقديم المواد الموجودة على موقع أركانزاكس على أساس 'كما هي'. لا تقدم أركانزاكس أي ضمانات، صريحة أو ضمنية، وهي بموجب هذا تخلي مسؤوليتها وتلغي جميع الضمانات الأخرى.">
          The materials on Arkanzax's website are provided on an 'as is' basis. Arkanzax makes no warranties,
          expressed or implied, and hereby disclaims and negates all other warranties.
        </p>
      </div>
    </div>
  </main>
@endsection
