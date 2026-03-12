@extends('admin.layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <h1 class="page-title" style="margin:0;">Clients / Brands</h1>
    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Client</a>
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
                    <th>Image</th>
                    <th>Name EN</th>
                    <th>Name AR</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $i => $client)
                <tr>
                    <td>{{ ($clientsData['from'] ?? 1) + $i }}</td>
                    <td>
                        @if(isset($client['image']) && $client['image'])
                            <img src="{{ Str::startsWith($client['image'], 'http') ? $client['image'] : asset('storage/' . $client['image']) }}" alt="{{ $client['name_en'] ?? 'Client' }}" style="width: 50px; height: 50px; object-fit: contain; border-radius: 4px; background: #fff; padding: 2px; border: 1px solid var(--border-color);">
                        @else
                            <div style="width: 50px; height: 50px; border-radius: 4px; background: rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: center; font-size: 12px; color: var(--text-muted); border: 1px solid var(--border-color);">No Img</div>
                        @endif
                    </td>
                    <td>{{ $client['name_en'] ?? $client['name'] ?? '-' }}</td>
                    <td>{{ $client['name_ar'] ?? '-' }}</td>
                    <td><span style="color:{{ ($client['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($client['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.clients.edit', $client['id'] ?? 0) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.clients.destroy', $client['id'] ?? 0) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--text-muted);">No clients found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($clientsData['links']) && count($clientsData['links']) > 3)
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @foreach($clientsData['links'] as $link)
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
