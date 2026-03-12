<div class="product-sub-header">
  <div class="container">
    <nav class="product-sub-nav">
      <a href="{{ route('items.show', 'property-management') }}" class="product-sub-link {{ request()->is('item/property-management') ? 'active' : '' }}">
        <i class="fas fa-building"></i>
        <span data-en="Property Management" data-ar="إدارة العقارات">Property Management</span>
      </a>
      <a href="{{ route('items.show', 'marketing-tools-smes') }}" class="product-sub-link {{ request()->is('item/marketing-tools-smes') ? 'active' : '' }}">
        <i class="fas fa-bullhorn"></i>
        <span data-en="Marketing Tools" data-ar="أدوات التسويق">Marketing Tools</span>
      </a>
      <a href="{{ route('items.show', 'e-commerce-product') }}" class="product-sub-link {{ request()->is('item/e-commerce-product') ? 'active' : '' }}">
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
