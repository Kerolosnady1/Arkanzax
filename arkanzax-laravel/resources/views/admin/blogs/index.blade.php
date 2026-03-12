@extends('admin.layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <h1 class="page-title" style="margin:0;">Blogs</h1>
    <div style="display:flex;gap:10px;">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Blog Manually</a>
        <button class="btn btn-info"><i class="fas fa-robot"></i> Add Blogs With AI</button>
    </div>
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
                    <th>Category</th>
                    <th>Feature</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $i => $blog)
                <tr>
                    <td>{{ ($blogsData['from'] ?? 1) + $i }}</td>
                    <td>{{ $blog['title_en'] ?? '-' }}</td>
                    <td>{{ $blog['title_ar'] ?? '-' }}</td>
                    <td>{{ $blog['category']['name_en'] ?? '-' }}</td>
                    <td><span style="color:{{ ($blog['is_feature'] ?? false) ? 'var(--success)' : 'var(--text-muted)' }}">{{ ($blog['is_feature'] ?? false) ? 'Yes' : 'No' }}</span></td>
                    <td><span style="color:{{ ($blog['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($blog['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.blogs.edit', $blog['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.blogs.destroy', $blog['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;padding:40px;color:var(--text-muted);">No blogs found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($blogsData['links']) && count($blogsData['links']) > 3)
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @foreach($blogsData['links'] as $link)
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
