@extends('layouts.master')

@section('title', 'Create Social')
@section('page_title', 'Create New Social')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('social.index') }}" class="btn btn-secondary btn-sm mb-3">
            <i class="fas fa-arrow-left"></i> Back to Social List
        </a>

        <!-- ✅ Form to create new social -->
        <form action="{{ route('social.store') }}" method="POST" enctype="multipart/form-data">
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

            <!-- Name -->
            <div class="form-group mb-3">
                <label for="name">Platform Name <span class="text-danger">*</span></label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}" 
                    placeholder="e.g. Facebook, Twitter, Instagram"
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Icon Upload -->
            <div class="form-group mb-3">
                <label for="icon">Icon Image <span class="text-danger">*</span></label>
                <input 
                    type="file" 
                    name="icon" 
                    id="icon" 
                    class="form-control @error('icon') is-invalid @enderror"
                    accept="image/*"
                    required
                >
                <small class="text-muted">Upload a small logo or icon image (PNG/JPG).</small>
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Link -->
            <div class="form-group mb-4">
                <label for="link">Profile Link <span class="text-danger">*</span></label>
                <input 
                    type="url" 
                    name="link" 
                    id="link" 
                    class="form-control @error('link') is-invalid @enderror" 
                    value="{{ old('link') }}" 
                    placeholder="https://facebook.com/yourpage"
                    required
                >
                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

         
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save
            </button>
            <a href="{{ route('social.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
