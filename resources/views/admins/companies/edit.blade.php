@extends('layouts.master')

@section('title', 'Edit Company')
@section('page_title', 'Edit Company')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('company.index') }}" class="btn btn-secondary btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Back to Company List
        </a>

        <!-- ✅ Correct form with CSRF + PUT method -->
        <form action="{{ route('company.update', $com->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Please correct the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Company Name -->
            <div class="form-group mb-3">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name', $com->name) }}" 
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email', $com->email) }}" 
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-group mb-3">
                <label for="phone">Phone <span class="text-danger">*</span></label>
                <input 
                    type="text" 
                    name="phone" 
                    id="phone" 
                    class="form-control @error('phone') is-invalid @enderror" 
                    value="{{ old('phone', $com->phone) }}" 
                    required
                >
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Working Hour -->
            <div class="form-group mb-3">
                <label for="working_hour">Working Hour <span class="text-danger">*</span></label>
                <input 
                    type="text" 
                    name="working_hour" 
                    id="working_hour" 
                    class="form-control @error('working_hour') is-invalid @enderror" 
                    value="{{ old('working_hour', $com->working_hour) }}" 
                    required
                >
                @error('working_hour')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="form-group mb-3">
                <label for="address">Address <span class="text-danger">*</span></label>
                <textarea 
                    name="address" 
                    id="address" 
                    cols="30" 
                    rows="3" 
                    class="form-control @error('address') is-invalid @enderror" 
                    required
                >{{ old('address', $com->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Logo -->
            <div class="form-group mb-4">
                <label for="logo">Logo</label>
                <input 
                    type="file" 
                    name="logo" 
                    id="logo" 
                    class="form-control @error('logo') is-invalid @enderror" 
                    accept="image/*"
                >
                @if($com->logo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $com->logo) }}" 
                             alt="Current Logo" 
                             style="max-width: 120px; border-radius: 5px;">
                    </div>
                @endif
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Save</button>
                <a href="{{ route('company.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
            <div class="form-group mb-4">
    <label for="map">Location Map</label>
    <iframe 
        src="https://www.google.com/maps?q={{ urlencode($com->address) }}&output=embed" 
        width="100%" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>
</div>

        </form>
    </div>
</div>
@endsection
