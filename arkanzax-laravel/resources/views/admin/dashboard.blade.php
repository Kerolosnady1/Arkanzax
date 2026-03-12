@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:25px;">
        <h1 class="page-title" style="margin:0;">Dashboard</h1>
        <div style="color:var(--text-muted);font-size:14px;">Welcome back, <strong>{{ Session::get('admin_email') ?? 'Admin' }}</strong></div>
    </div>

    <!-- Welcome Card -->
    <div class="content-card" style="margin-bottom:25px;background:linear-gradient(135deg,rgba(17,164,212,0.1),transparent);border:1px solid rgba(17,164,212,0.2);">
        <div style="display:flex;align-items:center;gap:20px;padding:10px;">
            <img src="{{ asset('assets/logo.png') }}" alt="Arkanzax Logo" style="height:60px;filter:drop-shadow(0 0 10px rgba(17,164,212,0.3));">
            <div>
                <h2 style="margin:0;font-size:20px;color:var(--primary);">Arkanzax Management System</h2>
                <p style="margin:5px 0 0;color:var(--text-muted);">Manage your website content, offers, and settings from one central place.</p>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info"><span>Blogs</span><h2>{{ $stats['blogs'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-blue"><i class="fas fa-rss"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Offers</span><h2>{{ $stats['offers'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-green"><i class="fas fa-tag"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Items</span><h2>{{ $stats['items'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-yellow"><i class="fas fa-box"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Jobs</span><h2>{{ $stats['jobs'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-purple"><i class="fas fa-briefcase"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Leads</span><h2>{{ $stats['leads'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-teal"><i class="fas fa-user-plus"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Subscribers</span><h2>{{ $stats['subscribers'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-orange"><i class="fas fa-envelope-open-text"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Contact Messages</span><h2>{{ $stats['contact_messages'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-cyan"><i class="fas fa-headset"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Sliders</span><h2>{{ $stats['sliders'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-red"><i class="fas fa-images"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Portfolios</span><h2>{{ $stats['portfolios'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-teal"><i class="fas fa-layer-group"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Testimonials</span><h2>{{ $stats['testimonials'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-green"><i class="fas fa-comments"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Custom Pages</span><h2>{{ $stats['custom_pages'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-indigo"><i class="fas fa-file-alt"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info"><span>Orders</span><h2>{{ $stats['orders'] ?? 0 }}</h2></div>
            <div class="stat-icon icon-purple"><i class="fas fa-shopping-cart"></i></div>
        </div>
    </div>

    <!-- Chart Area -->
    <div class="chart-section">
        <h2>Monthly Activity In ({{ date('Y') }})</h2>
        <div class="chart-container">
            <canvas id="activityChart" height="80"></canvas>
        </div>
    </div>

    <!-- Social Integration Status -->

    <style>
        .integration-card { border-radius: 12px; background: var(--card-bg); border: 1px solid var(--border-color); transition: all 0.3s ease; position: relative; overflow: hidden; height: 100%; }
        .integration-card:hover { transform: translateY(-5px); box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); }
        .brand-line { height: 4px; width: 100%; position: absolute; top: 0; left: 0; }
        .card-body-custom { padding: 24px; }
        .brand-icon-box { width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 15px; }
        .id-box { background-color: rgba(255, 255, 255, 0.04); border: 1px dashed var(--border-color); border-radius: 8px; padding: 8px 12px; font-family: 'Courier New', Courier, monospace; font-size: 13px; color: var(--text-muted); margin: 15px 0; display: flex; align-items: center; justify-content: space-between; }
        .id-box i { color: var(--text-light); font-size: 12px; }
        .status-indicator { display: inline-flex; align-items: center; font-size: 12px; font-weight: 600; color: var(--text-muted); }
        .status-dot { width: 8px; height: 8px; border-radius: 50%; margin-right: 6px; display: inline-block; }
        .status-active { background-color: var(--success); box-shadow: 0 0 0 rgba(34, 197, 94, 0.4); animation: pulse-green 2s infinite; }
        .status-inactive { background-color: var(--danger); }
        @keyframes pulse-green { 0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); } 70% { box-shadow: 0 0 0 6px rgba(34, 197, 94, 0); } 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); } }
        .btn-manage-card { border-radius: 8px; font-weight: 500; font-size: 13px; padding: 8px 15px; background-color: rgba(255, 255, 255, 0.05); color: var(--text-main); border: 1px solid var(--border-color); transition: 0.2s; text-decoration: none; display: flex; justify-content: space-between; align-items: center; width: 100%; box-sizing: border-box; }
        .btn-manage-card:hover { background-color: rgba(255, 255, 255, 0.1); color: var(--text-main); }
    </style>
    
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-top:30px;">

        <div class="integration-card">
            <div class="brand-line" style="background-color: #1877f2;"></div>
            <div class="card-body-custom">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div class="brand-icon-box" style="background-color: rgba(24,119,242,0.15); color: #1877f2;">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    @if(($settings['facebook_status'] ?? '0') == '1')
                        <div class="status-indicator"><span class="status-dot status-active"></span>Active</div>
                    @else
                        <div class="status-indicator"><span class="status-dot status-inactive"></span>Inactive</div>
                    @endif
                </div>
                <h6 style="font-weight:600; font-size:16px; margin:0 0 4px 0; color:var(--text-main);">Facebook Pixel</h6>
                <p style="font-size:12px; color:var(--text-muted); margin:0;">
                    {{ ($settings['facebook_status'] ?? '0') == '1' ? 'Integration is active.' : 'Integration is currently disabled.' }}
                </p>
                <div class="id-box">
                    <span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:85%;">
                        {{ !empty($settings['facebook_pixel_id'] ?? '') ? 'Configured' : 'Not Configured' }}
                    </span>
                    @if(empty($settings['facebook_pixel_id'] ?? ''))
                        <i class="fas fa-exclamation-circle" style="color:var(--warning);" title="Missing ID"></i>
                    @else
                        <i class="fas fa-check-circle" style="color:var(--success);" title="Configured"></i>
                    @endif
                </div>
                <a href="#" class="btn-manage-card">
                    <span>Configure</span>
                    <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                </a>
            </div>
        </div>
        
        <div class="integration-card">
            <div class="brand-line" style="background-color: #ea4335;"></div>
            <div class="card-body-custom">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div class="brand-icon-box" style="background-color: rgba(234,67,53,0.15); color: #ea4335;">
                        <i class="fab fa-google"></i>
                    </div>
                    @if(($settings['google_status'] ?? '0') == '1')
                        <div class="status-indicator"><span class="status-dot status-active"></span>Active</div>
                    @else
                        <div class="status-indicator"><span class="status-dot status-inactive"></span>Inactive</div>
                    @endif
                </div>
                <h6 style="font-weight:600; font-size:16px; margin:0 0 4px 0; color:var(--text-main);">Google Analytics</h6>
                <p style="font-size:12px; color:var(--text-muted); margin:0;">
                    {{ ($settings['google_status'] ?? '0') == '1' ? 'Integration is active.' : 'Integration is currently disabled.' }}
                </p>
                <div class="id-box">
                    <span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:85%;">
                        {{ !empty($settings['google_analytics_id'] ?? '') ? 'Configured' : 'Not Configured' }}
                    </span>
                    @if(empty($settings['google_analytics_id'] ?? ''))
                        <i class="fas fa-exclamation-circle" style="color:var(--warning);" title="Missing ID"></i>
                    @else
                        <i class="fas fa-check-circle" style="color:var(--success);" title="Configured"></i>
                    @endif
                </div>
                <a href="#" class="btn-manage-card">
                    <span>Configure</span>
                    <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                </a>
            </div>
        </div>
        
        <div class="integration-card">
            <div class="brand-line" style="background-color: #10b981;"></div>
            <div class="card-body-custom">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div class="brand-icon-box" style="background-color: rgba(16,185,129,0.15); color: #10b981;">
                        <i class="fas fa-tags"></i>
                    </div>
                    @if(($settings['gtm_status'] ?? '0') == '1')
                        <div class="status-indicator"><span class="status-dot status-active"></span>Active</div>
                    @else
                        <div class="status-indicator"><span class="status-dot status-inactive"></span>Inactive</div>
                    @endif
                </div>
                <h6 style="font-weight:600; font-size:16px; margin:0 0 4px 0; color:var(--text-main);">Google Tag Manager</h6>
                <p style="font-size:12px; color:var(--text-muted); margin:0;">
                    {{ ($settings['gtm_status'] ?? '0') == '1' ? 'Integration is active.' : 'Integration is currently disabled.' }}
                </p>
                <div class="id-box">
                    <span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:85%;">
                        {{ !empty($settings['gtm_id'] ?? '') ? 'Configured' : 'Not Configured' }}
                    </span>
                    @if(empty($settings['gtm_id'] ?? ''))
                        <i class="fas fa-exclamation-circle" style="color:var(--warning);" title="Missing ID"></i>
                    @else
                        <i class="fas fa-check-circle" style="color:var(--success);" title="Configured"></i>
                    @endif
                </div>
                <a href="#" class="btn-manage-card">
                    <span>Configure</span>
                    <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                </a>
            </div>
        </div>
        
        <div class="integration-card">
            <div class="brand-line" style="background-color: #25f4ee;"></div>
            <div class="card-body-custom">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div class="brand-icon-box" style="background-color: rgba(37,244,238,0.15); color: #25f4ee;">
                        <i class="fa-brands fa-tiktok"></i>
                    </div>
                    @if(($settings['tiktok_status'] ?? '0') == '1')
                        <div class="status-indicator"><span class="status-dot status-active"></span>Active</div>
                    @else
                        <div class="status-indicator"><span class="status-dot status-inactive"></span>Inactive</div>
                    @endif
                </div>
                <h6 style="font-weight:600; font-size:16px; margin:0 0 4px 0; color:var(--text-main);">TikTok Pixel</h6>
                <p style="font-size:12px; color:var(--text-muted); margin:0;">
                    {{ ($settings['tiktok_status'] ?? '0') == '1' ? 'Integration is active.' : 'Integration is currently disabled.' }}
                </p>
                <div class="id-box">
                    <span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:85%;">
                        {{ !empty($settings['tiktok_pixel_id'] ?? '') ? 'Configured' : 'Not Configured' }}
                    </span>
                    @if(empty($settings['tiktok_pixel_id'] ?? ''))
                        <i class="fas fa-exclamation-circle" style="color:var(--warning);" title="Missing ID"></i>
                    @else
                        <i class="fas fa-check-circle" style="color:var(--success);" title="Configured"></i>
                    @endif
                </div>
                <a href="#" class="btn-manage-card">
                    <span>Configure</span>
                    <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                </a>
            </div>
        </div>
            </div>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px;">

        <div class="integration-card">
            <div class="brand-line" style="background-color: #fffc00;"></div>
            <div class="card-body-custom">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div class="brand-icon-box" style="background-color: rgba(255,252,0,0.15); color: #fffc00;">
                        <i class="fab fa-snapchat-ghost"></i>
                    </div>
                    @if(($settings['snapchat_status'] ?? '0') == '1')
                        <div class="status-indicator"><span class="status-dot status-active"></span>Active</div>
                    @else
                        <div class="status-indicator"><span class="status-dot status-inactive"></span>Inactive</div>
                    @endif
                </div>
                <h6 style="font-weight:600; font-size:16px; margin:0 0 4px 0; color:var(--text-main);">Snapchat Pixel</h6>
                <p style="font-size:12px; color:var(--text-muted); margin:0;">
                    {{ ($settings['snapchat_status'] ?? '0') == '1' ? 'Integration is active.' : 'Integration is currently disabled.' }}
                </p>
                <div class="id-box">
                    <span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:85%;">
                        {{ !empty($settings['snapchat_pixel_id'] ?? '') ? 'Configured' : 'Not Configured' }}
                    </span>
                    @if(empty($settings['snapchat_pixel_id'] ?? ''))
                        <i class="fas fa-exclamation-circle" style="color:var(--warning);" title="Missing ID"></i>
                    @else
                        <i class="fas fa-check-circle" style="color:var(--success);" title="Configured"></i>
                    @endif
                </div>
                <a href="#" class="btn-manage-card">
                    <span>Configure</span>
                    <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                </a>
            </div>
        </div>
        
        <div class="integration-card">
            <div class="brand-line" style="background-color: #9ca3af;"></div>
            <div class="card-body-custom">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div class="brand-icon-box" style="background-color: rgba(156,163,175,0.15); color: #9ca3af;">
                        <i class="fa-brands fa-x-twitter"></i>
                    </div>
                    @if(($settings['twitter_status'] ?? '0') == '1')
                        <div class="status-indicator"><span class="status-dot status-active"></span>Active</div>
                    @else
                        <div class="status-indicator"><span class="status-dot status-inactive"></span>Inactive</div>
                    @endif
                </div>
                <h6 style="font-weight:600; font-size:16px; margin:0 0 4px 0; color:var(--text-main);">X (Twitter) Pixel</h6>
                <p style="font-size:12px; color:var(--text-muted); margin:0;">
                    {{ ($settings['twitter_status'] ?? '0') == '1' ? 'Integration is active.' : 'Integration is currently disabled.' }}
                </p>
                <div class="id-box">
                    <span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:85%;">
                        {{ !empty($settings['twitter_pixel_id'] ?? '') ? 'Configured' : 'Not Configured' }}
                    </span>
                    @if(empty($settings['twitter_pixel_id'] ?? ''))
                        <i class="fas fa-exclamation-circle" style="color:var(--warning);" title="Missing ID"></i>
                    @else
                        <i class="fas fa-check-circle" style="color:var(--success);" title="Configured"></i>
                    @endif
                </div>
                <a href="#" class="btn-manage-card">
                    <span>Configure</span>
                    <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                </a>
            </div>
        </div>
        
        <div class="integration-card">
            <div class="brand-line" style="background-color: #e60023;"></div>
            <div class="card-body-custom">
                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                    <div class="brand-icon-box" style="background-color: rgba(230,0,35,0.15); color: #e60023;">
                        <i class="fa-brands fa-pinterest"></i>
                    </div>
                    @if(($settings['pinterest_status'] ?? '0') == '1')
                        <div class="status-indicator"><span class="status-dot status-active"></span>Active</div>
                    @else
                        <div class="status-indicator"><span class="status-dot status-inactive"></span>Inactive</div>
                    @endif
                </div>
                <h6 style="font-weight:600; font-size:16px; margin:0 0 4px 0; color:var(--text-main);">Pinterest Tag</h6>
                <p style="font-size:12px; color:var(--text-muted); margin:0;">
                    {{ ($settings['pinterest_status'] ?? '0') == '1' ? 'Integration is active.' : 'Integration is currently disabled.' }}
                </p>
                <div class="id-box">
                    <span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:85%;">
                        {{ !empty($settings['pinterest_tag_id'] ?? '') ? 'Configured' : 'Not Configured' }}
                    </span>
                    @if(empty($settings['pinterest_tag_id'] ?? ''))
                        <i class="fas fa-exclamation-circle" style="color:var(--warning);" title="Missing ID"></i>
                    @else
                        <i class="fas fa-check-circle" style="color:var(--success);" title="Configured"></i>
                    @endif
                </div>
                <a href="#" class="btn-manage-card">
                    <span>Configure</span>
                    <i class="fas fa-arrow-right" style="font-size: 11px;"></i>
                </a>
            </div>
        </div>
            </div>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    { label: 'Blogs', data: [0,0,{{ $stats['blogs'] ?? 0 }},0,0,0,0,0,0,0,0,0], backgroundColor: '#1877F2', borderRadius: 10, barThickness: 25 },
                    { label: 'Offers', data: [0,0,{{ $stats['offers'] ?? 0 }},0,0,0,0,0,0,0,0,0], backgroundColor: '#0F9D58', borderRadius: 10, barThickness: 25 },
                    { label: 'Items', data: [0,0,{{ $stats['items'] ?? 0 }},0,0,0,0,0,0,0,0,0], backgroundColor: '#FFC107', borderRadius: 10, barThickness: 25 },
                    { label: 'Orders', data: [0,0,{{ $stats['orders'] ?? 0 }},0,0,0,0,0,0,0,0,0], backgroundColor: '#dc3545', borderRadius: 10, barThickness: 25 }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'top' }, tooltip: { mode: 'index', intersect: false } },
                interaction: { mode: 'nearest', intersect: false },
                scales: {
                    x: { grid: { display: false }, stacked: false },
                    y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.04)' } }
                }
            }
        });
    </script>
@endpush
