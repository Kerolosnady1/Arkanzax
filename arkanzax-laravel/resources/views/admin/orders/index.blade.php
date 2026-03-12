@extends('admin.layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-input {
            background-color: var(--card-bg) !important;
            color: var(--text-main) !important;
            border: 1px solid var(--border-color) !important;
        }

        .input-group-text {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--text-muted);
            border: 1px solid var(--border-color);
            border-right: none;
            padding: 0 12px;
            display: flex;
            align-items: center;
            border-radius: 8px 0 0 8px;
        }

        #date_range {
            border-radius: 0 8px 8px 0;
        }

        .card-header-filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        .orders-filter-container {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            gap: 15px;
            width: 100%;
        }

        .orders-filter-group {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            gap: 10px;
        }

        .content-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 24px;
            margin-bottom: 30px;
        }

        .filter-item-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            min-height: 44px;
        }

        .filter-item-wrapper i {
            position: absolute;
            left: 15px;
            color: var(--primary);
            z-index: 5;
            pointer-events: none;
        }

        .premium-select,
        .premium-input {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-main) !important;
            border-radius: 8px !important;
            height: 44px !important;
            font-size: 13px !important;
            width: 100%;
        }

        .premium-input-with-icon {
            padding-left: 42px !important;
        }

        .premium-input::placeholder {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .premium-select:focus,
        .premium-input:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 2px rgba(49, 165, 161, 0.1) !important;
        }

        table {
            background: transparent !important;
        }

        table thead th {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ffffff !important;
            border-bottom: 1px solid var(--border-color) !important;
            padding: 16px 12px !important;
            background: rgba(255, 255, 255, 0.03) !important;
        }

        table tbody td {
            background: transparent !important;
            color: var(--text-light) !important;
            border-bottom: 1px solid var(--border-color) !important;
        }

        table tr:hover td {
            background: rgba(255, 255, 255, 0.04) !important;
        }

        .badge-premium {
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .status-paid {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
        }

        .status-rejected {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .status-reviewing {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }
    </style>
@endpush

@section('content')
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:30px;">
        <div style="display:flex; gap:12px; align-items:center;">
            <h1 class="page-title" style="margin:0; font-size: 24px;">Dashboard</h1>
            <span style="color:var(--text-muted); font-size:14px; font-weight: 500;">/ Orders</span>
        </div>
    </div>

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div class="orders-filter-container mb-4">
            <div class="orders-filter-group">
                <select id="filter_method" class="form-control premium-select" style="min-width: 160px;">
                    <option value="">All Methods</option>
                    <option value="creditcard">Credit Card</option>
                    <option value="instapay">InstaPay</option>
                    <option value="cash_on_delivery">Cash</option>
                </select>

                <select id="filter_status" class="form-control premium-select" style="min-width: 160px;">
                    <option value="">All Statuses</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="reviewing">Reviewing</option>
                    <option value="rejected">Rejected</option>
                    <option value="canceled">Canceled</option>
                </select>

                <div class="filter-item-wrapper" style="min-width: 240px;">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="text" id="date_range"
                        class="form-control premium-input premium-input-with-icon flatpickr-input"
                        placeholder="Select Date Range" readonly="readonly">
                </div>
            </div>

            <div class="ms-auto" style="width: 320px;">
                <div class="filter-item-wrapper">
                    <i class="fas fa-search"></i>
                    <input autofocus="" type="text" id="search" class="form-control premium-input premium-input-with-icon"
                        placeholder="Search orders..." value="">
                </div>
            </div>
        </div>

        <div id="orders-table">
            <div class="table-responsive">
                <table class="table text-md-nowrap" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Info</th>
                            <th>Total Amount</th>
                            <th>Method</th>
                            <th>Proof</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $i => $order)
                            <tr>
                                <td>{{ ($ordersData['from'] ?? 1) + $i }}</td>
                                <td>{{ $order['customer_name'] ?? '-' }}<br><small
                                        style="color:var(--text-muted);">{{ $order['customer_email'] ?? '' }}</small></td>
                                <td>{{ number_format($order['total'] ?? $order['total_price'] ?? 0, 2) }} EGP</td>
                                <td>{{ ucfirst($order['payment_method'] ?? $order['method'] ?? '-') }}</td>
                                <td>
                                    @if(isset($order['proof']))
                                        <button type="button" class="btn btn-sm btn-info view-proof-btn"
                                            data-image="{{ Str::startsWith($order['proof'], 'http') ? $order['proof'] : asset('storage/' . $order['proof']) }}" data-bs-toggle="modal"
                                            data-bs-target="#receiptModal">
                                            <i class="fas fa-file-image"></i> View
                                        </button>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $status = $order['status'] ?? 'pending';
                                        $statusClass = 'status-pending';
                                        if (in_array($status, ['paid', 'completed']))
                                            $statusClass = 'status-paid';
                                        if (in_array($status, ['rejected', 'cancelled', 'canceled']))
                                            $statusClass = 'status-rejected';
                                        if ($status == 'reviewing')
                                            $statusClass = 'status-reviewing';
                                    @endphp
                                    <span class="badge-premium {{ $statusClass }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td>{{ $order['created_at'] ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order['id']) }}" class="btn btn-sm btn-info"><i
                                            class="fas fa-eye"></i></a>

                                    <form action="{{ route('admin.orders.destroy', $order['id']) }}" method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Delete? This action cannot be undone.')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align:center;padding:40px;color:var(--text-muted);">No orders found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(isset($ordersData['links']) && count($ordersData['links']) > 3)
            <div class="mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        @foreach($ordersData['links'] as $link)
                            <li class="page-item {{ $link['active'] ? 'active' : '' }} {{ is_null($link['url']) ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $link['url'] ? '?' . parse_url($link['url'], PHP_URL_QUERY) : '#' }}">
                                    {!! $link['label'] !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>

    <!-- Receipt Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background:var(--card-bg); border:1px solid var(--border-color);">
                <div class="modal-header" style="border-bottom:1px solid var(--border-color);">
                    <h5 class="modal-title" id="receiptModalLabel">Payment Receipt</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" style="background:rgba(0,0,0,0.2);">
                    <img src="" id="modalImage" class="img-fluid rounded" alt="Receipt Proof" style="max-height: 70vh;">
                </div>
                <div class="modal-footer" style="border-top:1px solid var(--border-color);">
                    <a href="#" id="openNewTabLink" target="_blank" class="btn btn-primary">
                        <i class="fas fa-external-link-alt"></i> Open Original
                    </a>
                    <button type="button" class="btn" style="background:rgba(255,255,255,0.1); color:white;"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).on('click', '.view-proof-btn', function () {
            var imageUrl = $(this).data('image');
            $('#modalImage').attr('src', imageUrl);
            $('#openNewTabLink').attr('href', imageUrl);
        });

        $(document).ready(function () {
            if ($("#date_range").length > 0) {
                flatpickr("#date_range", {
                    mode: "range",
                    dateFormat: "Y-m-d",
                    static: true
                });
            }
        });
    </script>
@endpush
