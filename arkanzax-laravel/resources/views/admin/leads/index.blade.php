@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex; gap:10px; align-items:center; margin-bottom:20px;">
        <h1 class="page-title" style="margin:0;">Home</h1>
        <span style="color:var(--text-muted); font-size:13px;">/ Leads</span>
    </div>

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div class="table-responsive">
            <table class="table text-md-nowrap" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>EMAIL</th>
                        <th>LEAD MAGNET</th>
                        <th>CREATED AT</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $i => $lead)
                        <tr>
                            <td>{{ ($leadsData['from'] ?? 1) + $i }}</td>
                            <td>{{ $lead['email'] ?? '-' }}</td>
                            <td>{{ $lead['lead_magnet_name'] ?? $lead['source'] ?? '-' }}</td>
                            <td>{{ $lead['created_at'] ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;padding:40px;color:var(--text-muted);">No leads found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($leadsData['links']) && count($leadsData['links']) > 3)
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @foreach($leadsData['links'] as $link)
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
