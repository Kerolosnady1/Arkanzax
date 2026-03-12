@extends('admin.layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <h1 class="page-title" style="margin:0;">Careers</h1>
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Career</a>
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
                @forelse($jobs as $i => $job)
                <tr>
                    <td>{{ ($jobsData['from'] ?? 1) + $i }}</td>
                    <td>{{ $job['title_en'] ?? $job['title'] ?? '-' }}</td>
                    <td>{{ $job['title_ar'] ?? '-' }}</td>
                    <td><span style="color:{{ ($job['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($job['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.jobs.edit', $job['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.jobs.destroy', $job['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;padding:40px;color:var(--text-muted);">No careers found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($jobsData['links']) && count($jobsData['links']) > 3)
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @foreach($jobsData['links'] as $link)
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
