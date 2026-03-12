@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex; gap:10px; align-items:center; margin-bottom:20px;">
        <h1 class="page-title" style="margin:0;">Home</h1>
        <span style="color:var(--text-muted); font-size:13px;">/ Pages</span>
    </div>

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div style="margin-bottom:20px;">
            <a href="{{ route('admin.custom-pages.create') }}" class="btn btn-primary">Add New Page</a>
        </div>

        <div class="table-responsive">
            <table class="table text-md-nowrap" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TITLE EN</th>
                        <th>TITLE AR</th>
                        <th>LINK</th>
                        <th>STATUS</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $i => $page)
                        <tr>
                            <td>{{ ($pagesData['from'] ?? 1) + $i }}</td>
                            <td>{{ $page['title_en'] ?? $page['title'] ?? '-' }}</td>
                            <td>{{ $page['title_ar'] ?? '-' }}</td>
                            <td><code
                                    style="background:rgba(49,165,161,0.1);padding:3px 8px;border-radius:4px;color:var(--primary);">{{ $page['slug'] ?? '-' }}</code>
                            </td>
                            <td><span
                                    style="color:{{ ($page['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($page['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.custom-pages.edit', $page['id']) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.custom-pages.destroy', $page['id']) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;padding:40px;color:var(--text-muted);">No custom pages
                                found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($pagesData['links']) && count($pagesData['links']) > 3)
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @foreach($pagesData['links'] as $link)
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
