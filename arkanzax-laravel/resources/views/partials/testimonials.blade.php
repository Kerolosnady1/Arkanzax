  <!-- ═══════════════════════════ TESTIMONIALS ═══════════════════════════ -->
  <section class="testimonials-section" id="testi-sec">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="sub-badge" data-en="Client Love" data-ar="آراء عملائنا">Client Love</span>
        <h2 class="section-title" data-en="What Our Clients Say" data-ar="ماذا يقول عملاؤنا">What Our Clients Say</h2>
        <p class="section-subtitle" data-en="Real results, real people. Hear from the brands we've helped grow."
          data-ar="نتائج حقيقية، أشخاص حقيقيون. اسمع من العلامات التجارية التي ساعدناها على النمو.">Real results, real
          people. Hear from the brands we've helped grow.</p>
      </div>

      <div class="testimonials-slider-wrapper">
        <div class="testimonials-track" id="testimonials-track">

          @forelse($testimonialsList as $t)
          <div class="testi-card">
            <div class="testi-stars">★★★★★</div>
            <div class="testi-text">
                {!! $t['testimonial'] ?? '' !!}
            </div>
            <div class="testi-author">
              <div class="author-avatar">
                @if(!empty($t['image']))
                  <img src="{{ $t['image'] }}" alt="{{ $t['name'] }}" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                @else
                  {{ strtoupper(substr($t['name'] ?? 'A', 0, 1)) }}{{ strtoupper(substr(strstr($t['name'] ?? '', ' ') ?: ($t['name'] ?? ' '), 1, 1)) }}
                @endif
              </div>
              <div class="author-info">
                <strong>{{ $t['name'] ?? 'Valued Client' }}</strong>
                <span data-en="Verified Client" data-ar="عميل موثق">Verified Client</span>
              </div>
            </div>
          </div>
          @empty
          <!-- Static Fallback -->
          <div class="testi-card">
            <div class="testi-stars">★★★★★</div>
            <p class="testi-text" data-en="Arkanzax transformed our digital presence. Our organic traffic tripled in just 4 months." data-ar="غيّر أركانزاكس حضورنا الرقمي. تضاعف حركة الزيارات العضوية ثلاث مرات في 4 أشهر فقط.">Arkanzax transformed our digital presence. Our organic traffic tripled in just 4 months.</p>
            <div class="testi-author">
              <div class="author-avatar">SA</div>
              <div class="author-info">
                <strong>Sarah Ahmed</strong>
                <span>CEO, NovaTech</span>
              </div>
            </div>
          </div>
          @endforelse

        </div>
      </div>

      <!-- Controls -->
      <div class="testi-controls">
        <button class="testi-btn" id="testi-prev" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
        <div class="testi-dots" id="testi-dots"></div>
        <button class="testi-btn" id="testi-next" aria-label="Next"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
  </section>
