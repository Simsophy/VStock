@extends('layouts.master')

@section('title', 'Menu List')

@section('page_title')
Menus
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Menus List</h5>
        <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Menu
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $i => $m)
                        <tr>
                            <td>{{ $i + 1 }}</td>

                            <!-- Menu Name links to detail page -->
                            <td>
                                <a href="{{ route('menu.detail', $m->id) }}">
                                    {{ $m->name }}
                                </a>
                            </td>

                            <!-- External Link -->
                            <td>
                                <a href="{{ $m->link }}" target="_blank">
                                    {{ $m->link }}
                                </a>
                            </td>

                            <!-- Actions -->
                            <td>
                                <a href="{{ route('menu.edit', $m->id) }}" class="btn btn-sm btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('menu.delete', $m->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete menu: {{ $m->name }}?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                <i class="fas fa-info-circle me-1"></i> No menus found. Start by adding a new menu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('setting.index') }}" class="btn btn-secondary btn-sm mt-3 rounded-pill">
            <i class="fas fa-arrow-left me-1"></i> Back to Settings
        </a>
    </div>
</div>

@endsection
