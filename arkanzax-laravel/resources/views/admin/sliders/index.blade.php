@extends('admin.layouts.admin')

@section('content')
    <div style="display:flex; gap:10px; align-items:center; margin-bottom:20px;">
        <h1 class="page-title" style="margin:0;">Home</h1>
        <span style="color:var(--text-muted); font-size:13px;">/ Sliders</span>
    </div>

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div style="margin-bottom:20px;">
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Add Slider</a>
        </div>

        <div class="table-responsive">
            <table class="table text-md-nowrap" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NAME EN</th>
                        <th>NAME AR</th>
                        <th>IMAGE</th>
                        <th>STATUS</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $i => $slider)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $slider['title_en'] ?? $slider['title'] ?? '-' }}</td>
                            <td>{{ $slider['title_ar'] ?? '-' }}</td>
                            <td>
                                @if(isset($slider['banner_en']))
                                    <img src="{{ $slider['banner_en'] }}"
                                    style="width:60px;height:40px;object-fit:cover;border-radius:6px;">
                                @else 
                                    - 
                                @endif
                            </td>
                            <td><span
                                    style="color:{{ ($slider['status'] ?? 0) == 1 ? 'var(--success)' : 'var(--danger)' }}">{{ ($slider['status'] ?? 0) == 1 ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.sliders.edit', $slider['id']) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.sliders.destroy', $slider['id']) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;padding:40px;color:var(--text-muted);">No sliders found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
