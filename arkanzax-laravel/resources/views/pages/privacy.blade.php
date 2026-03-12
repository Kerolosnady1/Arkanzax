@extends('layouts.app')
@section('title', 'Privacy Policy | Arkanzax')
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
        <h1 data-en="Privacy Policy" data-ar="سياسة الخصوصية">Privacy Policy</h1>
        <p data-en="Last updated: February 19, 2025" data-ar="آخر تحديث: 19 فبراير 2025">Last updated: February
          19, 2025</p>

        <h2 data-en="1. Introduction" data-ar="1. مقدمة">1. Introduction</h2>
        <p data-en="Welcome to Arkanzax. We respect your privacy and are committed to protecting your personal data. This privacy policy will inform you as to how we look after your personal data when you visit our website."
          data-ar="مرحبًا بكم في أركانزاكس. نحن نحترم خصوصيتكم ونلتزم بحماية بياناتكم الشخصية. ستعلمكم سياسة الخصوصية هذه بكيفية اعتنائنا ببياناتكم الشخصية عند زيارة موقعنا الإلكتروني.">
          Welcome to Arkanzax. We respect your privacy and are committed to protecting your personal data.
          This privacy policy will inform you as to how we look after your personal data when you visit our
          website.
        </p>

        <h2 data-en="2. Data We Collect" data-ar="2. البيانات التي نجمعها">2. Data We Collect</h2>
        <p data-en="We may collect, use, store and transfer different kinds of personal data about you which we have grouped together as follows: Identity Data, Contact Data, Technical Data, and Usage Data."
          data-ar="قد نقوم بجمع واستخدام وتخزين ونقل أنواع مختلفة من البيانات الشخصية عنكم والتي قمنا بتجميعها كالتالي: بيانات الهوية، بيانات الاتصال، البيانات التقنية، وبيانات الاستخدام.">
          We may collect, use, store and transfer different kinds of personal data about you which we have
          grouped together as follows: Identity Data, Contact Data, Technical Data, and Usage Data.
        </p>

        <h2 data-en="3. How We Use Your Data" data-ar="3. كيف نستخدم بياناتكم">3. How We Use Your Data</h2>
        <p data-en="We will only use your personal data when the law allows us to. Most commonly, we will use your personal data where we need to perform the contract we are about to enter into or have entered into with you."
          data-ar="سنستخدم بياناتكم الشخصية فقط عندما يسمح لنا القانون بذلك. في الغالب، سنستخدم بياناتكم الشخصية عندما نحتاج إلى تنفيذ العقد الذي نحن على وشك الدخول فيه أو الذي دخلنا فيه معكم بالفعل.">
          We will only use your personal data when the law allows us to. Most commonly, we will use your
          personal data where we need to perform the contract we are about to enter into or have entered into
          with you.
        </p>
      </div>
    </div>
  </main>
@endsection
