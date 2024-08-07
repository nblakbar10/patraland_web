@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Petugas</h1>

    <form method="POST" action="{{ route('technicians.update', $technician->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $technician->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $technician->email) }}" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="nik" name="nik" id="nik" class="form-control" value="{{ old('nik', $technician->nik) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
