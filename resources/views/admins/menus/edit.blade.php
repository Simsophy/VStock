@extends('layouts.master')

@section('title', 'Edit Menu')

@section('page_title')
Edit Menu
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Menu: {{ $menu->name }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('menu.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Menu Name</label>
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $menu->name) }}" 
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
                    value="{{ old('link', $menu->link) }}" 
                    placeholder="Enter menu link">
                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update Menu
            </button>

            <a href="{{ route('menu.index') }}" class="btn btn-secondary ms-2">
                <i class="fas fa-arrow-left me-1"></i> Back to Menus
            </a>
        </form>
    </div>
</div>
@endsection
