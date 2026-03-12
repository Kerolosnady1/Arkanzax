@extends('admin.layouts.admin')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <h1 class="page-title" style="margin:0;">Contact Us</h1>
    <div style="display:flex;gap:10px;">
        <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete Selected</button>
        <button class="btn btn-info"><i class="fas fa-file-excel"></i> Export Excel</button>
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
                    <th><input type="checkbox"></th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Message</th>
                    <th>Reply</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $i => $msg)
                <tr>
                    <td><input type="checkbox" value="{{ $msg['id'] }}"></td>
                    <td>{{ ($messagesData['from'] ?? 1) + $i }}</td>
                    <td>{{ $msg['name'] ?? '-' }}</td>
                    <td>{{ $msg['email'] ?? '-' }}</td>
                    <td>{{ $msg['phone'] ?? '-' }}</td>
                    <td><span style="color:{{ ($msg['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--warning)' }}">{{ ($msg['status'] ?? 0) == 1 ? 'Read' : 'New' }}</span></td>
                    <td>{{ Str::limit($msg['message'] ?? '-', 40) }}</td>
                    <td>{{ ($msg['reply'] ?? null) ? 'Replied' : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.contact-messages.show', $msg['id']) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('admin.contact-messages.destroy', $msg['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" style="text-align:center;padding:40px;color:var(--text-muted);">No contact messages found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($messagesData['links']) && count($messagesData['links']) > 3)
    <div class="mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @foreach($messagesData['links'] as $link)
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
