<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes — Arkanzax Website
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blog/category/{id}', [BlogController::class, 'byCategory'])->name('blogs.category');

// Offers
Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
Route::get('/offer/{slug}', [OfferController::class, 'show'])->name('offers.show');

// Items
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/item/{slug}', [ItemController::class, 'show'])->name('items.show');

// Jobs / Careers
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/job/{slug}', [JobController::class, 'show'])->name('jobs.show');
Route::post('/job/apply', [JobController::class, 'apply'])->name('jobs.apply');

// Portfolios
Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolios.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/subscribe', [ContactController::class, 'subscribe'])->name('subscribe');

// Testimonials
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::post('/check-coupon', [CheckoutController::class, 'checkCoupon'])->name('checkout.coupon');
Route::post('/upload-receipt', [CheckoutController::class, 'uploadReceipt'])->name('checkout.receipt');
Route::get('/order/{id}', [CheckoutController::class, 'orderDetails'])->name('checkout.order');
Route::get('/api/states/{countryId}', [CheckoutController::class, 'getStates']);
Route::get('/api/cities/{stateId}', [CheckoutController::class, 'getCities']);

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Static service pages
Route::get('/product-pms', [PageController::class, 'productPms'])->name('product.pms');
Route::get('/product-marketing', [PageController::class, 'productMarketing'])->name('product.marketing');
Route::get('/product-ecommerce', [PageController::class, 'productEcommerce'])->name('product.ecommerce');
Route::get('/hosting-domain', [PageController::class, 'hostingDomain'])->name('hosting');
Route::get('/seo-content', [PageController::class, 'seoContent'])->name('seo');
Route::get('/paid-ads', [PageController::class, 'paidAds'])->name('ads');
Route::get('/social-media', [PageController::class, 'socialMedia'])->name('social');
Route::get('/email-marketing', [PageController::class, 'emailMarketing'])->name('email');
Route::get('/analytics', [PageController::class, 'analytics'])->name('analytics');
Route::get('/branding-design', [PageController::class, 'brandingDesign'])->name('branding');
Route::get('/product-crm-pos', [PageController::class, 'productCrmPos'])->name('product.crm');
Route::get('/sovlow-gid1', [PageController::class, 'sovlowGid1'])->name('sovlow');

// Legal pages
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/cookies', [PageController::class, 'cookies'])->name('cookies');

// Custom CMS pages (catch-all, must be LAST)
Route::get('/page/{slug}', [PageController::class, 'show'])->name('pages.show');

// Admin Auth Routes
Route::get('admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Blogs System
    Route::resource('blog-categories', \App\Http\Controllers\Admin\BlogCategoryController::class, ['as' => 'admin']);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class, ['as' => 'admin']);

    // Offers System
    Route::resource('type-offers', \App\Http\Controllers\Admin\OfferTypeController::class, ['as' => 'admin']);
    Route::resource('offers', \App\Http\Controllers\Admin\OfferController::class, ['as' => 'admin']);

    // Items System
    Route::resource('item-types', \App\Http\Controllers\Admin\ItemTypeController::class, ['as' => 'admin']);
    Route::resource('items', \App\Http\Controllers\Admin\ItemController::class, ['as' => 'admin']);

    // Portfolio System
    Route::resource('portfolio-categories', \App\Http\Controllers\Admin\PortfolioCategoryController::class, ['as' => 'admin']);
    Route::resource('portfolios', \App\Http\Controllers\Admin\PortfolioController::class, ['as' => 'admin']);

    // Sliders & Testimonials
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class, ['as' => 'admin']);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class, ['as' => 'admin']);

    // Jobs & Team
    Route::resource('jobs', \App\Http\Controllers\Admin\JobController::class, ['as' => 'admin']);
    Route::resource('members', \App\Http\Controllers\Admin\MemberController::class, ['as' => 'admin']);

    // Location System
    Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class, ['as' => 'admin']);
    Route::resource('states', \App\Http\Controllers\Admin\StateController::class, ['as' => 'admin']);
    Route::resource('cities', \App\Http\Controllers\Admin\CityController::class, ['as' => 'admin']);

    // Lead System
    Route::resource('lead-magnet-types', \App\Http\Controllers\Admin\LeadMagnetTypeController::class, ['as' => 'admin']);
    Route::resource('lead-magnets', \App\Http\Controllers\Admin\LeadMagnetController::class, ['as' => 'admin']);
    Route::resource('leads', \App\Http\Controllers\Admin\LeadController::class, ['as' => 'admin']);

    // Communication System
    Route::resource('subscribers', \App\Http\Controllers\Admin\SubscriberController::class, ['as' => 'admin']);
    Route::resource('contact-messages', \App\Http\Controllers\Admin\ContactMessageController::class, ['as' => 'admin']);

    // E-commerce System
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class, ['as' => 'admin']);
    Route::resource('coupons', \App\Http\Controllers\Admin\CouponController::class, ['as' => 'admin']);
    Route::resource('payment-methods', \App\Http\Controllers\Admin\PaymentMethodController::class, ['as' => 'admin']);

    // Site Management
    Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class, ['as' => 'admin']);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class, ['as' => 'admin']);
    Route::resource('social-integrations', \App\Http\Controllers\Admin\SocialIntegrationController::class, ['as' => 'admin']);
    Route::resource('ai-settings', \App\Http\Controllers\Admin\AiSettingController::class, ['as' => 'admin']);
    Route::resource('sitemaps', \App\Http\Controllers\Admin\SitemapController::class, ['as' => 'admin']);
});
