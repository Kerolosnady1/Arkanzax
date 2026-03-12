@extends('admin.layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <div>
        <h1 class="page-title" style="margin:0;">Countries</h1>
        <p style="color:var(--text-muted);font-size:13px;margin-top:4px;"><a href="{{ route('admin.dashboard') }}" style="color:var(--primary);text-decoration:none;">Home</a> / Countries</p>
    </div>
    <a href="{{ route('admin.countries.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Country</a>
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
                    <th>Title EN</th>
                    <th>Title AR</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($countries as $i => $country)
                <tr>
                    <td>{{ ($countriesData['from'] ?? 1) + $i }}</td>
                    <td>{{ $country['title_en'] ?? $country['title'] ?? '-' }}</td>
                    <td>{{ $country['title_ar'] ?? '-' }}</td>
                    <td><span style="color:{{ ($country['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($country['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.countries.edit', $country['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.countries.destroy', $country['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;padding:40px;color:var(--text-muted);">No countries found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($countriesData['links']) && count($countriesData['links']) > 3)
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @foreach($countriesData['links'] as $link)
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
