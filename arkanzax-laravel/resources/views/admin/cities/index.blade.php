@extends('admin.layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <div>
        <h1 class="page-title" style="margin:0;">Cities</h1>
        <p style="color:var(--text-muted);font-size:13px;margin-top:4px;"><a href="{{ route('admin.dashboard') }}" style="color:var(--primary);text-decoration:none;">Home</a> / Cities</p>
    </div>
    <a href="{{ route('admin.cities.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add City</a>
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
                    <th>Country</th>
                    <th>State</th>
                    <th>Title EN</th>
                    <th>Title AR</th>
                    <th>Cost</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cities as $i => $city)
                <tr>
                    <td>{{ ($citiesData['from'] ?? 1) + $i }}</td>
                    <td>{{ $city['country']['title_en'] ?? $city['country']['title'] ?? '-' }}</td>
                    <td>{{ $city['state']['title_en'] ?? $city['state']['title'] ?? '-' }}</td>
                    <td>{{ $city['title_en'] ?? $city['title'] ?? '-' }}</td>
                    <td>{{ $city['title_ar'] ?? '-' }}</td>
                    <td>{{ $city['cost'] ?? $city['price'] ?? '0.00' }}</td>
                    <td><span style="color:{{ ($city['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($city['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.cities.edit', $city['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.cities.destroy', $city['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" style="text-align:center;padding:40px;color:var(--text-muted);">No cities found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($citiesData['links']) && count($citiesData['links']) > 3)
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @foreach($citiesData['links'] as $link)
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
