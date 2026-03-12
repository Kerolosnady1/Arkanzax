  <!-- ═══════════════════════════ BLOG ═══════════════════════════ -->
  <section class="blog-section" id="blog">
    <div class="blog-particles"></div>
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="sub-badge light" data-en="Latest Insights" data-ar="أحدث المقالات">Latest Insights</span>
        <h2 class="section-title light" data-en="From Our Technology Blog" data-ar="من مدونتنا التقنية">From Our Technology Blog</h2>
        <p class="section-subtitle" style="color:rgba(255,255,255,.5);" data-en="Stay ahead with the latest trends and strategies." data-ar="ابق في الصدارة مع أحدث الاتجاهات والاستراتيجيات.">Stay ahead with the latest trends and strategies.</p>
      </div>

      <div class="blog-grid">
        @forelse($blogsList as $b)
          <article class="blog-card reveal-card">
            <div class="blog-img">
              @if(!empty(data_get($b, 'image')))
                <img src="{{ data_get($b, 'image') }}" alt="{{ data_get($b, 'title_en') ?? '' }}" style="width:100%; height:100%; object-fit:cover;">
              @else
                <div class="blog-img-placeholder"><i class="fas fa-robot"></i></div>
              @endif
            </div>
            <div class="blog-body">
              <div class="blog-meta">
                <span><i class="fas fa-calendar-alt"></i> <span>{{ data_get($b, 'created_at') ?? '' }}</span></span>
              </div>
              <h3 class="blog-title">
                  @if(app()->getLocale() == 'ar')
                      {{ data_get($b, 'title_ar') ?? data_get($b, 'title_en') ?? '' }}
                  @else
                      {{ data_get($b, 'title_en') ?? data_get($b, 'title_ar') ?? '' }}
                  @endif
              </h3>
              <p>
                  @if(app()->getLocale() == 'ar')
                      {!! Str::limit(strip_tags(data_get($b, 'content_ar') ?? data_get($b, 'content_en') ?? ''), 120) !!}
                  @else
                      {!! Str::limit(strip_tags(data_get($b, 'content_en') ?? data_get($b, 'content_ar') ?? ''), 120) !!}
                  @endif
              </p>
              <a href="{{ route('blogs.show', data_get($b, 'slug_en') ?? data_get($b, 'slug') ?? data_get($b, 'id')) }}" class="blog-link" data-en="Read Article →" data-ar="اقرأ المقال ←">Read Article →</a>
            </div>
          </article>
        @empty
        <article class="blog-card reveal-card">
          <div class="blog-img">
            <div class="blog-img-placeholder"><i class="fas fa-robot"></i></div>
            <span class="blog-category" data-en="AI Software" data-ar="برمجيات الذكاء الاصطناعي">AI Software</span>
          </div>
          <div class="blog-body">
            <div class="blog-meta">
              <span><i class="fas fa-calendar-alt"></i> <span data-en="Jan 12, 2025" data-ar="12 يناير 2025">Jan 12, 2025</span></span>
            </div>
            <h3 class="blog-title" data-en="How AI is Revolutionising Software 2025" data-ar="كيف يثور الذكاء الاصطناعي في 2025">How AI is Revolutionising Software 2025</h3>
            <a href="#" class="blog-link" data-en="Read Article →" data-ar="اقرأ المقال ←">Read Article →</a>
          </div>
        </article>
        @endforelse
      </div>
    </div>
  </section>
