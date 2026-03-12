@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex; gap:10px; align-items:center; margin-bottom:20px;">
        <h1 class="page-title" style="margin:0;">Home</h1>
        <span style="color:var(--text-muted); font-size:13px;">/ Portfolios</span>
    </div>

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div style="margin-bottom:20px;">
            <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">Add Portfolio</a>
        </div>

        <div class="table-responsive">
            <table class="table text-md-nowrap" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NAME EN</th>
                        <th>NAME AR</th>
                        <th>ORDER</th>
                        <th>STATUS</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $i => $portfolio)
                        <tr>
                            <td>{{ ($portfoliosData['from'] ?? 1) + $i }}</td>
                            <td>{{ $portfolio['name_en'] ?? '-' }}</td>
                            <td>{{ $portfolio['name_ar'] ?? '-' }}</td>
                            <td>{{ $portfolio['order'] ?? 0 }}</td>
                            <td><span
                                    style="color:{{ ($portfolio['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($portfolio['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.portfolios.edit', $portfolio['id']) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.portfolios.destroy', $portfolio['id']) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;padding:40px;color:var(--text-muted);">No portfolios found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($portfoliosData['links']) && count($portfoliosData['links']) > 3)
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @foreach($portfoliosData['links'] as $link)
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
