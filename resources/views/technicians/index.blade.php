@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Petugas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>NIK</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technicians as $technician)
            <tr>
                <td>{{ $technician->id }}</td>
                <td>{{ $technician->name }}</td>
                <td>{{ $technician->email }}</td>
                <td>{{ $technician->nik }}</td>
                <td>
                    <a href="{{ route('technicians.edit', $technician->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('technicians.destroy', $technician->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
