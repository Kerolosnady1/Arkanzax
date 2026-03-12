@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex; gap:10px; align-items:center; margin-bottom:20px;">
        <h1 class="page-title" style="margin:0;">Home</h1>
        <span style="color:var(--text-muted); font-size:13px;">/ Testimonials</span>
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
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Create Testimonial</a>
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
                        <th>IMAGE</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>TESTIMONIAL</th>
                        <th>STATUS</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $i => $test)
                        <tr>
                            <td><input type="checkbox" class="row-checkbox" value="{{ $test['id'] }}"></td>
                            <td>
                                @if(isset($test['image']))
                                    <img src="{{ Str::startsWith($test['image'], 'http') ? $test['image'] : asset('storage/' . $test['image']) }}"
                                        style="width:40px;height:40px;object-fit:cover;border-radius:50%;">
                                @else
                                    <div
                                        style="width:40px;height:40px;border-radius:50%;background:#334155;display:flex;align-items:center;justify-content:center;">
                                        <i class="fas fa-user-circle" style="color:#64748b;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $test['name'] ?? '-' }}</td>
                            <td>{{ $test['email'] ?? '-' }}</td>
                            <td style="max-width:300px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                {{ $test['comment'] ?? $test['testimonial'] ?? '-' }}</td>
                            <td><span
                                    style="color:{{ ($test['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($test['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $test['id']) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.testimonials.destroy', $test['id']) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center;padding:40px;color:var(--text-muted);">No testimonials
                                found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($testimonialsData['links']) && count($testimonialsData['links']) > 3)
        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @foreach($testimonialsData['links'] as $link)
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
