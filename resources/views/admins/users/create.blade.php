@extends('layouts.master')

@section('title', 'Create User')
@section('page_title', 'Create New User')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Back to Users List
        </a>

        <!-- 🚨 CRITICAL FIX: Ensure the form targets the POST route and includes CSRF -->
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            
            @if($errors->any())
                <div class="alert alert-danger">
                    Please correct the following errors:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}" 
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" 
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>
</div>
@endsection
