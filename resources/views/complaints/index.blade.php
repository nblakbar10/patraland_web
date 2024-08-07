@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Complaints</h1>

    <!-- Filter and Export Buttons in the Same Row -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form method="GET" action="{{ route('complaints.index') }}" class="form-inline">
                <div class="form-group mr-2">
                    <input type="month" name="month" value="{{ request('month') }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('export.complaints', ['month' => request('month')]) }}" class="btn btn-success">Export to Excel</a>
        </div>
    </div>

    <form method="GET" action="{{ route('complaints.index') }}">
        <div class="form-group">
            <label for="status">Filter by Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="">All</option>
                <option value="receive" {{ request('status') == 'receive' ? 'selected' : '' }}>Receive</option>
                <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID User</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Gambar Pengerjaan</th>
                <th>Gambar Keluhan</th>
                <th>Jenis Keluhan</th>
                <th>Ket. Pengerjaan</th>
                <th>Status</th>
                <th>Nama Petugas</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
            <tr>
                <td>{{ $complaint->id }}</td>
                <td>{{ $complaint->user_id }}</td>
                <td>{{ $complaint->home_address }}</td>
                <td>{{ $complaint->description }}</td>
                <td>
                    @if($complaint->handling_asset)
                        <img src="{{ $complaint->handling_asset }}" alt="Handling Asset" style="max-width: 100px; max-height: 100px;">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if($complaint->complaint_asset)
                        <img src="{{ $complaint->complaint_asset }}" alt="Complaint Asset" style="max-width: 100px; max-height: 100px;">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $complaint->sparepart }}</td>
                <td>{{ $complaint->handling_description }}</td>
                <td>{{ $complaint->status }}</td>
                <td>{{ $complaint->handler_name }}</td>
                <td>
                    <a href="{{ route('complaints.edit', $complaint->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $complaints->links() }}
</div>
@endsection
