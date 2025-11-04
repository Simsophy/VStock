@extends('layouts.master')

@section('title', 'Edit User')
@section('page_title', 'Edit User: ' . $user->name)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit User Details</h5>
    </div>

    <!-- Single form for updating the user -->
    <form action="{{ route('user.update', ['uuid' => $user->uuid]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT for updates -->

        <div class="card-body">
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $user->name) }}"
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', $user->email) }}"
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank to keep current)</label>
                <input 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    id="password" 
                    name="password"
                    placeholder="Enter new password (optional)"
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password_confirmation" 
                    name="password_confirmation"
                    placeholder="Confirm new password"
                >
            </div>

            <!-- Submit Buttons -->
            <div class="d-flex justify-content-start gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
