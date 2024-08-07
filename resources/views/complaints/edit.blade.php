@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Complaint</h1>

    <form method="POST" action="{{ route('complaints.update', $complaint->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="home_address">Home Address:</label>
            <input type="text" name="home_address" id="home_address" class="form-control" value="{{ old('home_address', $complaint->home_address) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $complaint->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <textarea name="status" id="status" class="form-control" required>{{ old('status', $complaint->description) }}</textarea>
        </div>
        

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="receive" {{ $complaint->status == 'receive' ? 'selected' : '' }}>Receive</option>
                <option value="ongoing" {{ $complaint->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="done" {{ $complaint->status == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
