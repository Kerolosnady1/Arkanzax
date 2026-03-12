<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Arkanzax</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --sidebar-width: 260px;
            --topbar-height: 60px;
            --primary: #31a5a1;
            --primary-hover: #279e9a;
            --sidebar-bg: #0d0d14;
            --content-bg: #0a0a0f;
            --card-bg: #15151f;
            --card-bg-hover: #1a1a26;
            --text-main: #e8e8f0;
            --text-muted: #6b7280;
            --text-light: #9ca3af;
            --border-color: rgba(255, 255, 255, 0.06);
            --danger: #ef4444;
            --success: #22c55e;
            --warning: #f59e0b;
            --info: #3b82f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--content-bg);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            border-right: 1px solid var(--border-color);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 25px 20px 20px;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-header img {
            max-width: 110px;
            margin-bottom: 12px;
        }

        .online-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            background: var(--success);
            border-radius: 50%;
            margin-left: 5px;
            vertical-align: middle;
        }

        .user-info {
            margin-top: 8px;
        }

        .user-info h4 {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
        }

        .user-info p {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .nav-menu {
            list-style: none;
            padding: 10px 10px 20px;
        }

        .nav-item {
            margin-bottom: 2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 14px;
            color: var(--text-light);
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link i:first-child {
            width: 22px;
            font-size: 14px;
            margin-right: 10px;
            text-align: center;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.04);
            color: var(--text-main);
        }

        .nav-link.active {
            background: rgba(49, 165, 161, 0.12);
            color: var(--primary);
        }

        .nav-link .arrow {
            margin-left: auto;
            font-size: 11px;
            transition: transform 0.2s;
        }

        .nav-dropdown {
            list-style: none;
            padding-left: 32px;
            display: none;
        }

        .nav-dropdown.show {
            display: block;
        }

        .nav-dropdown-link {
            display: block;
            padding: 7px 10px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 12px;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .nav-dropdown-link:hover,
        .nav-dropdown-link.active {
            color: var(--primary);
        }

        .badge-new {
            background: var(--success);
            color: white;
            font-size: 9px;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: auto;
            font-weight: 600;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            z-index: 999;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .topbar-toggle {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 20px;
            cursor: pointer;
            padding: 5px;
        }

        .topbar-toggle:hover {
            color: var(--text-main);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .topbar-icon {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 18px;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .topbar-icon:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-main);
        }

        .topbar-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            flex: 1;
            padding: 25px;
            min-height: calc(100vh - var(--topbar-height));
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--text-main);
        }

        /* ===== STAT CARDS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 22px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s;
        }

        .stat-card:hover {
            background: var(--card-bg-hover);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .stat-info span {
            display: block;
            color: var(--text-muted);
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .stat-info h2 {
            font-size: 30px;
            font-weight: 700;
            color: var(--text-main);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .icon-blue {
            background: #3b82f6;
            color: white;
        }

        .icon-green {
            background: #10b981;
            color: white;
        }

        .icon-yellow {
            background: #f59e0b;
            color: white;
        }

        .icon-purple {
            background: #8b5cf6;
            color: white;
        }

        .icon-teal {
            background: #14b8a6;
            color: white;
        }

        .icon-orange {
            background: #f97316;
            color: white;
        }

        .icon-cyan {
            background: #06b6d4;
            color: white;
        }

        .icon-red {
            background: #ef4444;
            color: white;
        }

        .icon-indigo {
            background: #6366f1;
            color: white;
        }

        .icon-pink {
            background: #ec4899;
            color: white;
        }

        .icon-gray {
            background: #6b7280;
            color: white;
        }

        /* ===== CHART ===== */
        .chart-section {
            margin-bottom: 30px;
        }

        .chart-section h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .chart-container {
            background: var(--card-bg);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        /* ===== SOCIAL INTEGRATION STATUS ===== */
        .social-status-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 30px;
        }

        .social-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .social-card-header {
            height: 4px;
        }

        .social-card-body {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .social-card-body i {
            font-size: 28px;
        }

        .social-card-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .social-card-left span {
            font-weight: 600;
            font-size: 14px;
        }

        .social-status-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 500;
        }

        .social-status-badge .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .social-status-badge.inactive .dot {
            background: var(--danger);
        }

        .social-status-badge.inactive {
            color: var(--danger);
        }

        .social-status-badge.active .dot {
            background: var(--success);
        }

        .social-status-badge.active {
            color: var(--success);
        }

        /* ===== TABLE STYLES (for CRUD pages) ===== */
        .content-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            padding: 25px;
        }

        .content-card h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            text-align: left;
            padding: 12px 15px;
            color: var(--text-muted);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            border-bottom: 1px solid var(--border-color);
        }

        table td {
            padding: 12px 15px;
            font-size: 13px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-light);
        }

        table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .btn-info {
            background: rgba(59, 130, 246, 0.15);
            color: var(--info);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        /* ===== FORM STYLES ===== */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-light);
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.03);
            color: var(--text-main);
            font-size: 13px;
            font-family: inherit;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(49, 165, 161, 0.1);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        select.form-control {
            appearance: auto;
        }

        /* ===== ALERT ===== */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: var(--success);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        /* ===== TOGGLE SWITCH ===== */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 26px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 26px;
            transition: 0.3s;
        }

        .toggle-slider:before {
            content: '';
            position: absolute;
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background: white;
            border-radius: 50%;
            transition: 0.3s;
        }

        .toggle-switch input:checked+.toggle-slider {
            background: var(--primary);
        }

        .toggle-switch input:checked+.toggle-slider:before {
            transform: translateX(24px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .social-status-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                left: 0;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .social-status-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('assets/logo.png') }}" alt="Arkanzax Logo">
            <span class="online-dot"></span>
            <div class="user-info">
                <h4>{{ Session::get('admin_email') ?? 'Admin' }}</h4>
                <p>Arkanzax CMS</p>
            </div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            @if(Route::has('admin.social-integrations.index'))
            <li class="nav-item">
                <a href="{{ route('admin.social-integrations.index') }}"
                    class="nav-link {{ request()->routeIs('admin.social-integrations.*') ? 'active' : '' }}">
                    <i class="fas fa-share-alt"></i> Social Integration
                </a>
            </li>
            @endif
            @if(Route::has('admin.ai-settings.index'))
            <li class="nav-item">
                <a href="{{ route('admin.ai-settings.index') }}"
                    class="nav-link {{ request()->routeIs('admin.ai-settings.*') ? 'active' : '' }}">
                    <i class="fas fa-robot"></i> AI Settings
                </a>
            </li>
            @endif
            @if(Route::has('admin.sitemaps.index'))
            <li class="nav-item">
                <a href="{{ route('admin.sitemaps.index') }}"
                    class="nav-link {{ request()->routeIs('admin.sitemaps.*') ? 'active' : '' }}">
                    <i class="fas fa-map"></i> SiteMaps
                </a>
            </li>
            @endif

            @if(Route::has('admin.blogs.index') || Route::has('admin.blog-categories.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.blog-categories.*') || request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <i class="fas fa-blog"></i> Blogs System <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul
                    class="nav-dropdown {{ request()->routeIs('admin.blog-categories.*') || request()->routeIs('admin.blogs.*') ? 'show' : '' }}">
                    @if(Route::has('admin.blog-categories.index'))
                    <li><a href="{{ route('admin.blog-categories.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}">Categories</a>
                    </li>
                    @endif
                    @if(Route::has('admin.blogs.index'))
                    <li><a href="{{ route('admin.blogs.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">Blogs</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(Route::has('admin.countries.index') || Route::has('admin.states.index') || Route::has('admin.cities.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.countries.*') || request()->routeIs('admin.states.*') || request()->routeIs('admin.cities.*') ? 'active' : '' }}">
                    <i class="fas fa-map-marker-alt"></i> Location System <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul
                    class="nav-dropdown {{ request()->routeIs('admin.countries.*') || request()->routeIs('admin.states.*') || request()->routeIs('admin.cities.*') ? 'show' : '' }}">
                    @if(Route::has('admin.countries.index'))
                    <li><a href="{{ route('admin.countries.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.countries.*') ? 'active' : '' }}">Countries</a>
                    </li>
                    @endif
                    @if(Route::has('admin.states.index'))
                    <li><a href="{{ route('admin.states.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.states.*') ? 'active' : '' }}">States</a>
                    </li>
                    @endif
                    @if(Route::has('admin.cities.index'))
                    <li><a href="{{ route('admin.cities.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.cities.*') ? 'active' : '' }}">Cities</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(Route::has('admin.type-offers.index') || Route::has('admin.offers.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.type-offers.*') || request()->routeIs('admin.offers.*') ? 'active' : '' }}">
                    <i class="fas fa-percent"></i> Offers System <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul
                    class="nav-dropdown {{ request()->routeIs('admin.type-offers.*') || request()->routeIs('admin.offers.*') ? 'show' : '' }}">
                    @if(Route::has('admin.type-offers.index'))
                    <li><a href="{{ route('admin.type-offers.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.type-offers.*') ? 'active' : '' }}">Types</a>
                    </li>
                    @endif
                    @if(Route::has('admin.offers.index'))
                    <li><a href="{{ route('admin.offers.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.offers.*') ? 'active' : '' }}">Offers</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(Route::has('admin.item-types.index') || Route::has('admin.items.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.item-types.*') || request()->routeIs('admin.items.*') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Items System <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul
                    class="nav-dropdown {{ request()->routeIs('admin.item-types.*') || request()->routeIs('admin.items.*') ? 'show' : '' }}">
                    @if(Route::has('admin.item-types.index'))
                    <li><a href="{{ route('admin.item-types.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.item-types.*') ? 'active' : '' }}">Types</a>
                    </li>
                    @endif
                    @if(Route::has('admin.items.index'))
                    <li><a href="{{ route('admin.items.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.items.*') ? 'active' : '' }}">Items</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(Route::has('admin.career-types.index') || Route::has('admin.careers.index') || Route::has('admin.career-applications.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.career-types.*') || request()->routeIs('admin.careers.*') || request()->routeIs('admin.career-applications.*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i> Jobs System <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul
                    class="nav-dropdown {{ request()->routeIs('admin.career-types.*') || request()->routeIs('admin.careers.*') || request()->routeIs('admin.career-applications.*') ? 'show' : '' }}">
                    @if(Route::has('admin.career-types.index'))
                    <li><a href="{{ route('admin.career-types.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.career-types.*') ? 'active' : '' }}">Types</a>
                    </li>
                    @endif
                    @if(Route::has('admin.careers.index'))
                    <li><a href="{{ route('admin.careers.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.careers.*') ? 'active' : '' }}">Careers</a>
                    </li>
                    @endif
                    @if(Route::has('admin.career-applications.index'))
                    <li><a href="{{ route('admin.career-applications.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.career-applications.*') ? 'active' : '' }}">Applications</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(Route::has('admin.contact-messages.index'))
            <li class="nav-item">
                <a href="{{ route('admin.contact-messages.index') }}"
                    class="nav-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                    <i class="fas fa-headset"></i> Contact Us
                </a>
            </li>
            @endif

            @if(Route::has('admin.payment-methods.index'))
            <li class="nav-item">
                <a href="{{ route('admin.payment-methods.index') }}"
                    class="nav-link {{ request()->routeIs('admin.payment-methods.*') ? 'active' : '' }}">
                    <i class="fas fa-credit-card"></i> Payment Methods <span class="badge-new">New</span>
                </a>
            </li>
            @endif

            @if(Route::has('admin.coupons.index'))
            <li class="nav-item">
                <a href="{{ route('admin.coupons.index') }}"
                    class="nav-link {{ request()->routeIs('admin.coupons.*') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt"></i> Coupons <span class="badge-new">New</span>
                </a>
            </li>
            @endif

            @if(Route::has('admin.orders.index'))
            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}"
                    class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart"></i> Orders <span class="badge-new">New</span>
                </a>
            </li>
            @endif

            @if(Route::has('admin.subscribers.index'))
            <li class="nav-item">
                <a href="{{ route('admin.subscribers.index') }}"
                    class="nav-link {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope-open-text"></i> Subscribes
                </a>
            </li>
            @endif

            @if(Route::has('admin.sliders.index'))
            <li class="nav-item">
                <a href="{{ route('admin.sliders.index') }}"
                    class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i> Sliders
                </a>
            </li>
            @endif

            @if(Route::has('admin.portfolios.index') || Route::has('admin.portfolio-categories.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.portfolios.*') || request()->routeIs('admin.portfolio-categories.*') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i> Portfolios System <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul
                    class="nav-dropdown {{ request()->routeIs('admin.portfolios.*') || request()->routeIs('admin.portfolio-categories.*') ? 'show' : '' }}">
                    @if(Route::has('admin.portfolio-categories.index'))
                    <li><a href="{{ route('admin.portfolio-categories.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.portfolio-categories.*') ? 'active' : '' }}">Categories</a>
                    </li>
                    @endif
                    @if(Route::has('admin.portfolios.index'))
                    <li><a href="{{ route('admin.portfolios.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">Portfolios</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(Route::has('admin.custom-pages.index'))
            <li class="nav-item">
                <a href="{{ route('admin.custom-pages.index') }}"
                    class="nav-link {{ request()->routeIs('admin.custom-pages.*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i> Custom Pages
                </a>
            </li>
            @endif

            @if(Route::has('admin.testimonials.index'))
            <li class="nav-item">
                <a href="{{ route('admin.clients.index') }}"
                    class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i> Clients / Brands
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}"
                    class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i> Testimonials
                </a>
            </li>
            @endif

            @if(Route::has('admin.leads.index') || Route::has('admin.lead-magnets.index') || Route::has('admin.lead-magnet-types.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.leads.*') || request()->routeIs('admin.lead-magnets.*') || request()->routeIs('admin.lead-magnet-types.*') ? 'active' : '' }}">
                    <i class="fas fa-user-tag"></i> Leads System <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul
                    class="nav-dropdown {{ request()->routeIs('admin.leads.*') || request()->routeIs('admin.lead-magnets.*') || request()->routeIs('admin.lead-magnet-types.*') ? 'show' : '' }}">
                    @if(Route::has('admin.lead-magnet-types.index'))
                    <li><a href="{{ route('admin.lead-magnet-types.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.lead-magnet-types.*') ? 'active' : '' }}">Lead
                            Magnet Types</a>
                    </li>
                    @endif
                    @if(Route::has('admin.lead-magnets.index'))
                    <li><a href="{{ route('admin.lead-magnets.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.lead-magnets.*') ? 'active' : '' }}">Lead
                            Magnets</a>
                    </li>
                    @endif
                    @if(Route::has('admin.leads.index'))
                    <li><a href="{{ route('admin.leads.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">Leads</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <!-- Settings -->
            @if(Route::has('admin.settings.index'))
            <li class="nav-item">
                <a href="javascript:void(0)"
                    class="nav-link toggle-dropdown {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i> Settings <i class="fas fa-chevron-down arrow"></i>
                </a>
                <ul class="nav-dropdown {{ request()->routeIs('admin.settings.*') ? 'show' : '' }}">
                    <li><a href="{{ route('admin.settings.index') }}"
                            class="nav-dropdown-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">General
                            Settings</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>

    <!-- Top Bar -->
    <div class="topbar">
        <div class="topbar-left">
            <button class="topbar-toggle" id="sidebar-toggle" aria-label="Toggle sidebar">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="topbar-right">
            <button class="topbar-icon" id="fullscreen-btn" title="Fullscreen">
                <i class="fas fa-expand"></i>
            </button>
            <form action="{{ route('admin.logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="topbar-icon" title="Logout">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
            <img src="{{ asset('assets/logo.png') }}" alt="Profile" class="topbar-avatar">
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Dropdown toggle
        document.querySelectorAll('.toggle-dropdown').forEach(btn => {
            btn.addEventListener('click', () => {
                const dropdown = btn.nextElementSibling;
                const arrow = btn.querySelector('.arrow');
                dropdown.classList.toggle('show');
                if (dropdown.classList.contains('show')) {
                    arrow.style.transform = 'rotate(180deg)';
                } else {
                    arrow.style.transform = 'rotate(0deg)';
                }
            });
        });

        // Sidebar toggle (mobile)
        document.getElementById('sidebar-toggle').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('open');
        });

        // Fullscreen toggle
        document.getElementById('fullscreen-btn').addEventListener('click', () => {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                document.exitFullscreen();
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
