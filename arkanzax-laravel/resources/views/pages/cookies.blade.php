@extends('layouts.app')
@section('title', 'Cookie Policy | Arkanzax')
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
        <h1 data-en="Cookie Policy" data-ar="سياسة ملفات الارتباط">Cookie Policy</h1>
        <p data-en="Last updated: March 16, 2026" data-ar="آخر تحديث: 16 مارس 2026">Last updated: March
16, 2026</p>

        <h2 data-en="What Are Cookies" data-ar="ما هي ملفات الارتباط">What Are Cookies</h2>
        <p data-en="As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience."
          data-ar="كما هو متبع في جميع المواقع الاحترافية تقريباً، يستخدم هذا الموقع ملفات الارتباط، وهي ملفات صغيرة يتم تنزيلها على جهاز الكمبيوتر الخاص بك، لتحسين تجربتك.">
          As is common practice with almost all professional websites this site uses cookies, which are tiny
          files that are downloaded to your computer, to improve your experience.
        </p>

        <h2 data-en="How We Use Cookies" data-ar="كيف نستخدم ملفات الارتباط">How We Use Cookies</h2>
        <p data-en="We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site."
          data-ar="نحن نستخدم ملفات الارتباط لعدة أسباب مفصلة أدناه. لسوء الحظ في معظم الحالات لا توجد خيارات قياسية لتعطيل ملفات الارتباط دون تعطيل الوظائف والميزات التي تضيفها إلى هذا الموقع تماماً.">
          We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no
          industry standard options for disabling cookies without completely disabling the functionality and
          features they add to this site.
        </p>

        <h2 data-en="Disabling Cookies" data-ar="تعطيل ملفات الارتباط">Disabling Cookies</h2>
        <p data-en="You can prevent the setting of cookies by adjusting the settings on your browser. Be aware that disabling cookies will affect the functionality of this and many other websites that you visit."
          data-ar="يمكنك منع تعيين ملفات الارتباط عن طريق ضبط الإعدادات في متصفحك. اعلم أن تعطيل ملفات الارتباط سيؤثر على وظائف هذا الموقع والعديد من المواقع الأخرى التي تزورها.">
          You can prevent the setting of cookies by adjusting the settings on your browser. Be aware that
          disabling cookies will affect the functionality of this and many other websites that you visit.
        </p>
      </div>
    </div>
  </main>
@endsection
