/* =============================================================
   ARKANZAX REPLICA — MAIN JAVASCRIPT
   ============================================================= */

'use strict';

// ─── 1. DOM Ready ────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  initStickyHeader();
  initMobileMenu();
  initScrollReveal();
  initTestimonialsSlider();
  initScrollTopButton();
  initCTAForm();
  initCardHoverEffects();
});

// ─── 2. Sticky Header ────────────────────────────────────────
function initStickyHeader() {
  const headerMain = document.getElementById('header-main');
  if (!headerMain) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
      headerMain.classList.add('scrolled');
    } else {
      headerMain.classList.remove('scrolled');
    }
  }, { passive: true });
}

// ─── 3. Mobile Menu ──────────────────────────────────────────
function initMobileMenu() {
  const toggle = document.getElementById('mobile-toggle');
  const mobileNav = document.getElementById('mobile-nav');
  if (!toggle || !mobileNav) return;

  toggle.addEventListener('click', () => {
    const isOpen = mobileNav.classList.toggle('open');
    toggle.innerHTML = isOpen
      ? '<i class="far fa-times"></i>'
      : '<i class="far fa-bars"></i>';
    toggle.setAttribute('aria-expanded', isOpen);
  });

  // Close on link click
  mobileNav.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileNav.classList.remove('open');
      toggle.innerHTML = '<i class="far fa-bars"></i>';
      toggle.setAttribute('aria-expanded', 'false');
    });
  });

  // Close on outside click
  document.addEventListener('click', (e) => {
    const header = document.getElementById('header');
    if (header && !header.contains(e.target)) {
      mobileNav.classList.remove('open');
      toggle.innerHTML = '<i class="far fa-bars"></i>';
    }
  });
}

// ─── 4. Scroll Reveal ────────────────────────────────────────
function initScrollReveal() {
  const elements = document.querySelectorAll(
    '.reveal-up, .reveal-left, .reveal-right, .reveal-card'
  );
  if (!elements.length) return;

  // Stagger reveal-card children in each grid
  const grids = document.querySelectorAll(
    '.challenges-grid, .services-grid, .blog-grid'
  );
  grids.forEach(grid => {
    const cards = grid.querySelectorAll('.reveal-card');
    cards.forEach((card, i) => {
      card.style.transitionDelay = `${i * 0.1}s`;
    });
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.12,
    rootMargin: '0px 0px -60px 0px'
  });

  elements.forEach(el => observer.observe(el));
}

// ─── 5. Testimonials Slider ──────────────────────────────────
function initTestimonialsSlider() {
  const track = document.getElementById('testimonials-track');
  const dotsContainer = document.getElementById('testi-dots');
  const prevBtn = document.getElementById('testi-prev');
  const nextBtn = document.getElementById('testi-next');
  if (!track) return;

  const cards = track.querySelectorAll('.testi-card');
  let current = 0;
  let autoSlide;

  // Determine cards visible based on viewport
  function getVisible() {
    if (window.innerWidth <= 640) return 1;
    if (window.innerWidth <= 900) return 2;
    return 3;
  }

  function totalSlides() {
    return Math.ceil(cards.length / getVisible());
  }

  // Build dots
  function buildDots() {
    if (!dotsContainer) return;
    dotsContainer.innerHTML = '';
    const n = totalSlides();
    for (let i = 0; i < n; i++) {
      const dot = document.createElement('div');
      dot.className = `testi-dot${i === 0 ? ' active' : ''}`;
      dot.addEventListener('click', () => goTo(i));
      dotsContainer.appendChild(dot);
    }
  }

  function updateDots() {
    if (!dotsContainer) return;
    dotsContainer.querySelectorAll('.testi-dot').forEach((d, i) => {
      d.classList.toggle('active', i === current);
    });
  }

  function goTo(index) {
    const n = totalSlides();
    current = ((index % n) + n) % n;
    const visible = getVisible();
    const cardWidthPercent = 100 / visible;
    // Each card is 33.333% or 50% or 100% width; shift track by current * (visible cards)
    const shiftPercent = current * visible * cardWidthPercent;
    track.style.transform = `translateX(-${shiftPercent}%)`;
    updateDots();
  }

  function nextSlide() { goTo(current + 1); }
  function prevSlide() { goTo(current - 1); }

  function startAuto() {
    stopAuto();
    autoSlide = setInterval(nextSlide, 5000);
  }

  function stopAuto() {
    if (autoSlide) clearInterval(autoSlide);
  }

  if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); startAuto(); });
  if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); startAuto(); });

  // Touch swipe support
  let touchStartX = 0;
  track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', e => {
    const diff = touchStartX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) {
      diff > 0 ? nextSlide() : prevSlide();
      startAuto();
    }
  });

  // Pause on hover
  track.parentElement.addEventListener('mouseenter', stopAuto);
  track.parentElement.addEventListener('mouseleave', startAuto);

  // Rebuild on resize
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      buildDots();
      goTo(0);
    }, 200);
  });

  buildDots();
  startAuto();
}

// ─── 6. Scroll-to-Top Button ─────────────────────────────────
function initScrollTopButton() {
  const btn = document.getElementById('scroll-top');
  if (!btn) return;

  window.addEventListener('scroll', () => {
    btn.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });

  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// ─── 7. CTA Form ─────────────────────────────────────────────
function initCTAForm() {
  const form = document.getElementById('cta-form');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const emailInput = document.getElementById('email-input');
    if (!emailInput || !emailInput.value) return;

    const btn = form.querySelector('.btn-cta');
    const originalText = btn.innerHTML;

    btn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
    btn.style.background = '#16a34a';
    btn.disabled = true;
    emailInput.value = '';

    setTimeout(() => {
      btn.innerHTML = originalText;
      btn.style.background = '';
      btn.disabled = false;
    }, 3500);
  });
}

// ─── 8. Card 3D Hover Effects ────────────────────────────────
function initCardHoverEffects() {
  const cards = document.querySelectorAll('.challenge-card, .service-card');

  cards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const cx = rect.width / 2;
      const cy = rect.height / 2;
      const rotX = ((y - cy) / cy) * -6;
      const rotY = ((x - cx) / cx) * 6;

      card.style.transform = `translateY(-8px) perspective(1000px) rotateX(${rotX}deg) rotateY(${rotY}deg)`;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  });
}

// ─── 9. Active Nav Link on Scroll ────────────────────────────
(function initActiveNav() {
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-list a');
  if (!sections.length || !navLinks.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('href') === `#${entry.target.id}`) {
            link.classList.add('active');
          }
        });
      }
    });
  }, { threshold: 0.4 });

  sections.forEach(s => observer.observe(s));
})();

// ─── 10. Hero Particle Canvas (lightweight) ──────────────────
(function initParticles() {
  const hero = document.getElementById('hero');
  if (!hero) return;

  const canvas = document.createElement('canvas');
  canvas.style.cssText = 'position:absolute;inset:0;pointer-events:none;z-index:0;opacity:0.5';
  hero.appendChild(canvas);

  const ctx = canvas.getContext('2d');
  let particles = [];
  let animFrame;

  function resize() {
    canvas.width = hero.offsetWidth;
    canvas.height = hero.offsetHeight;
  }

  function createParticle() {
    return {
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      r: Math.random() * 1.5 + 0.3,
      dx: (Math.random() - 0.5) * 0.3,
      dy: -Math.random() * 0.5 - 0.1,
      opacity: Math.random() * 0.6 + 0.1
    };
  }

  function initParticleList() {
    particles = Array.from({ length: 80 }, createParticle);
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach(p => {
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(255,255,255,${p.opacity})`;
      ctx.fill();
      p.x += p.dx;
      p.y += p.dy;
      if (p.y < -5) { Object.assign(p, createParticle(), { y: canvas.height + 5 }); }
    });
    animFrame = requestAnimationFrame(animate);
  }

  resize();
  initParticleList();
  animate();

  window.addEventListener('resize', () => {
    resize();
    initParticleList();
  }, { passive: true });

  // Clean up if section leaves viewport
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) {
        cancelAnimationFrame(animFrame);
      } else {
        animate();
      }
    });
  });
  obs.observe(hero);
})();
