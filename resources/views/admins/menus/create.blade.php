@extends('layouts.master')

@section('title', 'Create Menu')

@section('page_title')
Add New Menu
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New Menu</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('menu.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Menu Name</label>
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}" 
                    placeholder="Enter menu name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Menu Link</label>
                <input 
                    type="text" 
                    class="form-control @error('link') is-invalid @enderror" 
                    id="link" 
                    name="link" 
                    value="{{ old('link') }}" 
                    placeholder="Enter menu link">
                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Add Menu
            </button>

            <a href="{{ route('menu.index') }}" class="btn btn-secondary ms-2">
                <i class="fas fa-arrow-left me-1"></i> Back to Menus
            </a>
        </form>
    </div>
</div>
@endsection
