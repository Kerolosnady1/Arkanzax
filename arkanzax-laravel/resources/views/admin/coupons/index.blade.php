@extends('admin.layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <h1 class="page-title" style="margin:0;">Coupons</h1>
    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Coupon</a>
</div>

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="content-card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Applied To</th>
                    <th>Value</th>
                    <th>Times Used</th>
                    <th>Usage Limit</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($coupons as $i => $coupon)
                <tr>
                    <td>{{ ($couponsData['from'] ?? 1) + $i }}</td>
                    <td><code style="background:rgba(49,165,161,0.1);padding:3px 8px;border-radius:4px;color:var(--primary);">{{ $coupon['code'] ?? '-' }}</code></td>
                    <td>{{ ucfirst($coupon['type'] ?? 'percentage') }}</td>
                    <td>{{ $coupon['applied_to'] ?? 'All' }}</td>
                    <td>{{ $coupon['value'] ?? 0 }}{{ ($coupon['type'] ?? 'percentage') == 'percentage' ? '%' : ' EGP' }}</td>
                    <td>{{ $coupon['times_used'] ?? 0 }}</td>
                    <td>{{ $coupon['usage_limit'] ?? 'Unlimited' }}</td>
                    <td>{{ $coupon['expiry_date'] ?? '-' }}</td>
                    <td><span style="color:{{ ($coupon['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($coupon['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.coupons.edit', $coupon['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.coupons.destroy', $coupon['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="10" style="text-align:center;padding:40px;color:var(--text-muted);">No coupons found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($couponsData['links']) && count($couponsData['links']) > 3)
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @foreach($couponsData['links'] as $link)
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
