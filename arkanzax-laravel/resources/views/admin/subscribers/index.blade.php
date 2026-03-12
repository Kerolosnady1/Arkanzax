@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex; gap:10px; align-items:center; margin-bottom:20px;">
        <h1 class="page-title" style="margin:0;">Home</h1>
        <span style="color:var(--text-muted); font-size:13px;">/ Subscribes</span>
    </div>

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div
            style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px; margin-bottom:20px;">
            <div style="display:flex; gap:10px;">
                <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete Selected</button>
                <button class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</button>
            </div>
            <div style="flex-grow:1; max-width:300px;">
                <input type="text" id="search" class="form-control" placeholder="Search..." autofocus>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-md-nowrap" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>#</th>
                        <th>EMAIL</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscribers as $i => $sub)
                        <tr>
                            <td><input type="checkbox" class="row-checkbox" value="{{ $sub['id'] }}"></td>
                            <td>{{ ($subscribersData['from'] ?? 1) + $i }}</td>
                            <td>{{ $sub['email'] ?? '-' }}</td>
                            <td>
                                <form action="{{ route('admin.subscribers.destroy', $sub['id']) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;padding:40px;color:var(--text-muted);">No subscribers
                                found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($subscribersData['links']) && count($subscribersData['links']) > 3)
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @foreach($subscribersData['links'] as $link)
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
