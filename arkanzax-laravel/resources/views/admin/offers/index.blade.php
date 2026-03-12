@extends('admin.layouts.admin')

@section('content')
    <div class="content-header" style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <div>
            <h1 style="font-size:24px;margin-bottom:5px;">Offers</h1>
            <nav style="font-size:14px;color:var(--text-muted);">
                <a href="{{ route('admin.dashboard') }}" style="color:var(--primary);text-decoration:none;">Home</a> / Offers
            </nav>
        </div>
        <a href="{{ route('admin.offers.create') }}" class="btn btn-primary"
            style="background:var(--primary);border:none;padding:10px 20px;border-radius:8px;display:flex;align-items:center;gap:8px;color:white;text-decoration:none;">
            <i class="fas fa-plus"></i> Add New Offer
        </a>
    </div>

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div class="table-responsive">
            <table class="table" style="width:100%;border-collapse:collapse;color:var(--text-main);">
                <thead>
                    <tr style="text-align:left;border-bottom:1px solid var(--border-color);">
                        <th style="padding:15px;color:var(--text-muted);font-weight:500;font-size:13px;">#</th>
                        <th style="padding:15px;color:var(--text-muted);font-weight:500;font-size:13px;">TITLE EN</th>
                        <th style="padding:15px;color:var(--text-muted);font-weight:500;font-size:13px;">TITLE AR</th>
                        <th style="padding:15px;color:var(--text-muted);font-weight:500;font-size:13px;">COST</th>
                        <th style="padding:15px;color:var(--text-muted);font-weight:500;font-size:13px;">FEATURE</th>
                        <th style="padding:15px;color:var(--text-muted);font-weight:500;font-size:13px;">STATUS</th>
                        <th style="padding:15px;color:var(--text-muted);font-weight:500;font-size:13px;">OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($offers as $i => $offer)
                        <tr style="border-bottom:1px solid var(--border-color);">
                            <td style="padding:15px;">{{ ($offersData['from'] ?? 1) + $i }}</td>
                            <td style="padding:15px;">{{ $offer['title_en'] ?? '-' }}</td>
                            <td style="padding:15px;">{{ $offer['title_ar'] ?? '-' }}</td>
                            <td style="padding:15px;">{{ $offer['price'] ?? '0.00' }}</td>
                            <td style="padding:15px;">
                                <span class="badge"
                                    style="padding:4px 8px;border-radius:4px;font-size:11px;{{ ($offer['is_feature'] ?? 0) == 1 ? 'background:rgba(16,185,129,0.1);color:#10b981;' : 'background:rgba(239,68,68,0.1);color:#ef4444;' }}">
                                    {{ ($offer['is_feature'] ?? 0) == 1 ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td style="padding:15px;">
                                <span class="status-pill"
                                    style="display:flex;align-items:center;gap:6px;font-size:13px;{{ ($offer['status'] ?? 0) == 1 ? 'color:#10b981;' : 'color:#ef4444;' }}">
                                    <span
                                        style="width:8px;height:8px;border-radius:50%;{{ ($offer['status'] ?? 0) == 1 ? 'background:#10b981;' : 'background:#ef4444;' }}"></span>
                                    {{ ($offer['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td style="padding:15px;">
                                <div style="display:flex;gap:8px;">
                                    <a href="{{ route('admin.offers.edit', $offer['id']) }}" class="btn-icon"
                                        style="background:rgba(245,158,11,0.1);color:#f59e0b;padding:8px;border-radius:6px;text-decoration:none;"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.offers.destroy', $offer['id']) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon"
                                            style="background:rgba(239,68,68,0.1);color:#ef4444;padding:8px;border-radius:6px;border:none;cursor:pointer;"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding:30px;text-align:center;color:var(--text-muted);">No offers found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($offersData['links']) && count($offersData['links']) > 3)
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @foreach($offersData['links'] as $link)
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
@endsection
