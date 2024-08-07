@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New User</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="nik" name="nik" id="nik" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Role:</label>
            <div class="form-check">
                <input type="radio" name="role" id="petugas" value="petugas" class="form-check-input" required>
                <label for="petugas" class="form-check-label">Petugas</label>
            </div>
            <div class="form-check">
                <input type="radio" name="role" id="customer" value="customer" class="form-check-input" required>
                <label for="customer" class="form-check-label">Customer</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection
