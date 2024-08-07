@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="nik" name="nik" id="nik" class="form-control" value="{{ old('nik', $user->nik) }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role:</label>
            <input type="role" name="role" id="role" class="form-control" value="{{ old('role', $user->role) }}" required>
        </div>

        <div class="form-group">
            <label>Role</label>
            <div class="form-check">
                <input type="radio" name="role" id="customer" value="customer" class="form-check-input" {{ old('role', $user->role) === 'customer' ? 'checked' : '' }} required>
                <label for="customer" class="form-check-label">Customer</label>
            </div>
            <div class="form-check">
                <input type="radio" name="role" id="petugas" value="petugas" class="form-check-input" {{ old('role', $user->role) === 'petugas' ? 'checked' : '' }} required>
                <label for="petugas" class="form-check-label">Petugas</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
