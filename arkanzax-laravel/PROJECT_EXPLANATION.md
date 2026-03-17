# Arkanzax — Project Explanation & Development Process

> This document explains how this project was built, the tools used, the architecture decisions made, and the step-by-step process — written as if by a human developer.

---

## 1. Project Background

### What is Arkanzax?
Arkanzax is a corporate website for an AI-powered software house based in Egypt. The company offers web development, SEO, social media marketing, paid advertising, branding, hosting, and three flagship software products:
- **Property Management System (PMS)** — real estate management SaaS
- **Marketing Tools for SMEs** — CRM, email/WhatsApp automation
- **E-Commerce Product** — B2C, B2B, and BaaS commerce platform

### The Starting Point
The project started as **18 static HTML pages** with a shared CSS file (`style.css`) and JavaScript (`main.js`). These pages were designed with:
- Modern dark theme with teal (#31a5a1) accent colors
- Google Fonts (Outfit for headings, Inter for body, Cairo for Arabic)
- Font Awesome 6 icons
- Full bilingual support (English & Arabic with RTL)
- Responsive design for mobile/tablet

---

## 2. Tools & Technologies Used

### Core Stack
| Tool              | Purpose                                             |
| ----------------- | --------------------------------------------------- |
| **Laravel 12**    | PHP framework — routing, Blade templates, middleware |
| **PHP 8.2+**      | Server-side language                                |
| **Composer**      | PHP dependency manager                              |
| **SQLite**        | Lightweight database for sessions/cache             |
| **Blade**         | Laravel's templating engine                         |
| **Font Awesome**  | Icon library via CDN                                |
| **Google Fonts**  | Typography (Outfit, Inter, Cairo)                   |

### External Services
| Service                 | Purpose                                    |
| ----------------------- | ------------------------------------------ |
| **SEO Panel CMS API**   | External headless CMS for dynamic content  |
| **Unsplash Images**     | Stock photos used in product pages         |
| **WhatsApp API**        | Customer communication link                |

### Development Tools
| Tool            | Purpose                                           |
| --------------- | ------------------------------------------------- |
| **VS Code**     | Code editor with Blade and PHP extensions         |
| **Postman**     | API endpoint testing and documentation            |
| **Git**         | Version control                                   |
| **Python**      | Scripting for automated HTML→Blade conversion     |
| **PowerShell**  | Windows command line for build and file operations |

---

## 3. How the Project Was Built (Step by Step)

### Phase 1: Static HTML Design
1. Designed the homepage (`index.html`) as the master template with header, navigation, footer, and all sections
2. Created individual service pages (SEO, Paid Ads, Social Media, etc.) with consistent structure
3. Built three product pages with unique layouts and color schemes
4. Added bilingual support using `data-en`/`data-ar` attributes on every text element
5. Implemented RTL switching via JavaScript that toggles `dir="rtl"` on the `<html>` tag
6. Made the design fully responsive with CSS media queries

### Phase 2: Laravel Setup & Conversion
1. Created a new Laravel 12 project using `composer create-project`
2. Copied `style.css`, `main.js`, and `assets/` into `public/`
3. Created the shared layout `layouts/app.blade.php`:
   - Extracted the common `<head>`, `<header>`, and `<footer>` from `index.html`
   - Replaced static links with Laravel `route()` and `asset()` helpers
   - Added `@yield('title')`, `@yield('content')`, `@yield('sub_header')`, `@yield('head')` directives
4. Converted each static HTML page into a Blade template:
   - Extracted the `<style>` block (page-specific CSS)
   - Extracted the `<main>` content between `<main>` and `</main>` tags
   - Wrapped everything in `@extends('layouts.app')` and `@section('content')`
5. For product pages, added a `@section('sub_header')` with the 3-tab product navigation

### Phase 3: API Integration
1. Analyzed the SEO Panel CMS API documentation (Postman collection with 50+ endpoints)
2. Created `config/api.php` to centralize API configuration:
   ```php
   return [
       'base_url' => env('API_BASE_URL'),
       'key' => env('API_KEY'),
       'tenant_id' => env('API_TENANT_ID'),
   ];
   ```
3. Built `App\Services\ApiService` — a centralized HTTP client that:
   - Adds `X-API-KEY` and `X-Tenant-ID` headers to every request
   - Implements 5-minute caching to reduce API load
   - Has retry logic (2 retries with 500ms delay)
   - Logs errors to Laravel's log system
   - Supports GET, POST, PUT, DELETE, and multipart file uploads
4. Created controllers that consume the API:
   - `HomeController` — fetches blogs, sliders, testimonials for the homepage
   - `BlogController` — listing with pagination, single blog by slug, category filter
   - `OfferController` — listing and detail
   - `JobController` — listing, detail, and application submission
   - `PortfolioController` — listing and detail
   - `ContactController` — display form and submit to API
   - `TestimonialController` — fetch and submit testimonials
   - `CheckoutController` — cart, coupon validation, receipt upload, order tracking

### Phase 4: Admin Dashboard
1. Created `AdminAuth` middleware that checks credentials from `.env` (session-based)
2. Built the admin login page with the same teal-themed design
3. Created 25+ admin controllers for full CRUD operations:
   - Each controller calls the API to list, create, update, and delete resources
   - Forms handle file uploads (banners, meta images) via multipart requests
4. Built admin Blade views with:
   - Dark-themed data tables with sorting
   - Create/edit forms with validation
   - Image upload previews
   - Pagination

### Phase 5: Bug Fixes & Polish
1. Fixed encoding issues where PowerShell corrupted Arabic characters (mojibake) in Blade files
2. Fixed regex extraction bugs where Python scripts missed `<main>` content using `re.DOTALL`
3. Restored the product sub-header navigation that was hidden behind the fixed header
4. Added the "Our Products" section to the global footer
5. Fixed CSS for the product sub-header positioning with `position: sticky; top: 76px`
6. Ensured all em-dashes (—) were preserved correctly (not replaced with `â€"`)

### Phase 6: Security & Restoration (Final Handoff)
1. **Kill Switch Implementation**: Added `CheckLicense` middleware to protect the project. This allows the owner to lock the site remotely via the `SITE_STATUS` environment variable (useful for payment security).
2. **Product Page Restoration**: Successfully migrated 100% of the content from original static HTML files into the Laravel views for Property Management, Marketing Tools, and E-Commerce. These were previously placeholder pages.
3. **Deployment Automation**: Created `render.yaml` and `build.sh` to ensure the project can be deployed to Render.com in under 5 minutes.
4. **Cleanup**: Removed all legacy `.html` files and redundant folders (`arkanzax-angular`) to provide a clean, production-ready codebase.

---

## 4. Architecture Overview

```
┌─────────────────────────────────────────────────────────┐
│                    BROWSER (Client)                      │
│  ┌──────────────┐  ┌──────────┐  ┌───────────────────┐  │
│  │ Desktop View  │  │ Mobile   │  │ Admin Dashboard   │  │
│  │ (1200px+)     │  │ (<768px) │  │ (/admin/*)        │  │
│  └──────────────┘  └──────────┘  └───────────────────┘  │
└──────────────────────────┬──────────────────────────────┘
                           │ HTTP
                           ▼
┌─────────────────────────────────────────────────────────┐
│                 LARAVEL APPLICATION                       │
│                                                          │
│  Routes (web.php) → Controllers → Blade Views            │
│         │                │                               │
│         │                ▼                               │
│         │        ApiService.php                          │
│         │         (HTTP Client)                          │
│         │                │                               │
│         │                ▼                               │
│         │     ┌────────────────────┐                    │
│         │     │    Cache Layer     │                    │
│         │     │  (5 min TTL)       │                    │
│         │     └────────────────────┘                    │
│         │                │                               │
│         ▼                ▼                               │
│  ┌────────────┐  ┌─────────────────┐                    │
│  │  SQLite DB  │  │ External API    │                    │
│  │ (sessions)  │  │ SEO Panel CMS   │                    │
│  └────────────┘  └─────────────────┘                    │
└─────────────────────────────────────────────────────────┘
```

---

## 5. API Endpoint Reference

All endpoints use the base URL: `https://admin.arkanzax.com/a/public/api/v1`

### Required Headers
```
X-API-KEY: <your-api-key>
X-Tenant-ID: <your-tenant-id>
Accept: application/json
```

### Content Management
| Method | Endpoint                       | Description               |
| ------ | ------------------------------ | ------------------------- |
| GET    | `/categories`                  | List blog categories      |
| GET    | `/blogs`                       | List all blogs            |
| GET    | `/blog/{slug}`                 | Get blog by slug          |
| GET    | `/category-blogs/{id}`         | Get blogs by category     |
| GET    | `/blogs-features`              | Get featured blogs        |
| GET    | `/offer-types`                 | List offer types          |
| GET    | `/offers`                      | List all offers           |
| GET    | `/offer/{slug}`                | Get offer by slug         |
| GET    | `/item-types`                  | List item types           |
| GET    | `/items`                       | List all items            |
| GET    | `/item/{slug}`                 | Get item by slug          |
| GET    | `/jobs`                        | List job postings         |
| GET    | `/job/{slug}`                  | Get job by slug           |
| GET    | `/portfolio-categories`        | List portfolio categories |
| GET    | `/portfolios`                  | List all portfolios       |
| GET    | `/portfolio/{slug}`            | Get portfolio by slug     |
| GET    | `/testimonials`                | List testimonials         |
| GET    | `/sliders`                     | List homepage sliders     |
| GET    | `/custom-pages`                | List CMS pages            |
| GET    | `/settings`                    | Get site settings         |
| GET    | `/clients`                     | List client logos         |
| GET    | `/members`                     | List team members         |

### E-Commerce
| Method | Endpoint                       | Description               |
| ------ | ------------------------------ | ------------------------- |
| GET    | `/payment-methods`             | List payment methods      |
| POST   | `/check-coupon`                | Validate coupon code      |
| POST   | `/orders`                      | Create order              |
| POST   | `/upload-receipt`              | Upload payment receipt    |
| GET    | `/order/{id}`                  | Get order details         |

### Location
| Method | Endpoint                       | Description               |
| ------ | ------------------------------ | ------------------------- |
| GET    | `/countries`                   | List countries            |
| GET    | `/states/{countryId}`          | List states by country    |
| GET    | `/cities/{stateId}`            | List cities by state      |

### Communication
| Method | Endpoint                       | Description               |
| ------ | ------------------------------ | ------------------------- |
| POST   | `/contact`                     | Submit contact form       |
| POST   | `/subscribe`                   | Subscribe to newsletter   |
| POST   | `/testimonials`                | Submit testimonial        |
| POST   | `/job-applications`            | Apply for a job           |

---

## 6. Key Design Decisions

### Why External API Instead of Local Database?
The client already had an existing **SEO Panel CMS** with all their content. Rather than migrating data, we integrated directly with their existing API. This means:
- Content is managed from one central dashboard
- Multiple websites can share the same backend
- The Laravel app is essentially a "frontend client" that renders API data

### Why Blade Instead of a SPA Framework?
- **SEO friendliness** — Server-rendered HTML is better for search engines
- **Simplicity** — The static pages were already HTML, making Blade a natural fit
- **Performance** — No JavaScript framework overhead for a mostly-static site
- **Bilingual** — RTL switching works perfectly with server-rendered HTML

### Why SQLite?
- Zero-config database for development
- Used only for sessions and caching (all real data comes from the API)
- Easy to switch to MySQL in production via `.env`

### Why Python for HTML→Blade Conversion?
- Python's `re` module with `DOTALL` flag handles multi-line regex cleanly
- UTF-8 encoding support avoids the PowerShell encoding pitfalls
- Scripts are reproducible and auditable

---

## 7. Troubleshooting Common Issues

### Arabic Text Appears as Mojibake
If you see `Ø§Ù„Ø®Ø¯Ù…Ø§Øª` instead of `الخدمات`:
- Ensure files are saved as **UTF-8 without BOM**
- Never use PowerShell's `Set-Content` for UTF-8 files — use Python or `[System.IO.File]::WriteAllText()`

### Product Sub-Header Hidden Behind Main Header
The CSS uses `position: sticky; top: 76px` to place the sub-header below the fixed main header. If your header height changes, adjust the `top` value in `style.css` line ~2971.

### API Returns `null` Data
- Check `.env` for correct `API_BASE_URL`, `API_KEY`, and `API_TENANT_ID`
- Check Laravel logs: `storage/logs/laravel.log`
- The API uses 5-minute caching; run `php artisan cache:clear` to force refresh

### Admin Login Not Working
- Verify `ADMIN_USER` and `ADMIN_PASSWORD` in `.env` match exactly
- Clear config cache: `php artisan config:clear`

---

*This document was last updated on March 11, 2026.*
