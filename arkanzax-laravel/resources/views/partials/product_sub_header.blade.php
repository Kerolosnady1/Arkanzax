<style>
  /* Global product page responsive fixes */
  .responsive-grid {
    display: grid;
    gap: 20px;
  }
  @media (max-width: 900px) {
    .responsive-grid {
      grid-template-columns: 1fr !important;
      text-align: center;
    }
    /* Fix sub-header overlap on mobile menu */
    .product-sub-header {
      z-index: 50 !important;
    }
    
    /* Global Mobile Padding Fix for Product Pages */
    .inner-hero, .crm-hero-section {
      padding-top: 180px !important;
    }
  }
  
  /* Desktop Padding Fix */
  @media (min-width: 901px) {
    .inner-hero, .crm-hero-section {
      padding-top: 220px !important;
    }
  }
</style>
<div class="product-sub-header">
  <div class="container">
    <nav class="product-sub-nav">
      <a href="{{ route('product.pms') }}" class="product-sub-link {{ request()->is('product-pms') ? 'active' : '' }}">
        <i class="fas fa-building"></i>
        <span data-en="Property Management" data-ar="إدارة العقارات">Property Management</span>
      </a>
      <a href="{{ route('product.marketing') }}" class="product-sub-link {{ request()->is('product-marketing') ? 'active' : '' }}">
        <i class="fas fa-bullhorn"></i>
        <span data-en="Marketing Tools" data-ar="أدوات التسويق">Marketing Tools</span>
      </a>
      <a href="{{ route('product.ecommerce') }}" class="product-sub-link {{ request()->is('product-ecommerce') ? 'active' : '' }}">
        <i class="fas fa-mobile-alt"></i>
        <span data-en="E-Commerce Product" data-ar="منتج التجارة الإلكترونية">E-Commerce Product</span>
      </a>
      <a href="{{ route('product.crm') }}" class="product-sub-link {{ request()->is('product-crm-pos') ? 'active' : '' }}">
        <i class="fas fa-cash-register"></i>
        <span data-en="CRM & POS" data-ar="إدارة علاقات العملاء ونقاط البيع">CRM & POS</span>
      </a>
    </nav>
  </div>
</div>
