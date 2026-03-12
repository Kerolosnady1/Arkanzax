@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
        <h1 class="page-title" style="margin:0;">Items</h1>
        <div style="display:flex;gap:10px;">
            <a href="{{ route('admin.items.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Item</a>
            <button class="btn btn-info"><i class="fas fa-file-excel"></i> Export Excel Temp</button>
            <button class="btn btn-warning"><i class="fas fa-file-import"></i> Import Excel</button>
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
                        <th>Cost</th>
                        <th>Order</th>
                        <th>Feature</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $i => $item)
                        <tr>
                            <td>{{ ($itemsData['from'] ?? 1) + $i }}</td>
                            <td>{{ $item['title_en'] ?? '-' }}</td>
                            <td>{{ $item['title_ar'] ?? '-' }}</td>
                            <td>{{ $item['price'] ?? '0.00' }}</td>
                            <td>{{ $item['order'] ?? 0 }}</td>
                            <td><span
                                    style="color:{{ ($item['is_feature'] ?? 0) == 1 ? 'var(--success)' : 'var(--text-muted)' }}">{{ ($item['is_feature'] ?? 0) == 1 ? 'Yes' : 'No' }}</span>
                            </td>
                            <td><span
                                    style="color:{{ ($item['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($item['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.items.edit', $item['id']) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.items.destroy', $item['id']) }}" method="POST" style="display:inline;"
                                    onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align:center;padding:40px;color:var(--text-muted);">No items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($itemsData['links']) && count($itemsData['links']) > 3)
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @foreach($itemsData['links'] as $link)
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
