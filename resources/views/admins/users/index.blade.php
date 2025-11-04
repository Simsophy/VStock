@extends('layouts.master')

@section('title', 'Users List')

@section('page_title')
Users
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
        <h5 class="mb-0">Users List</h5>
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add User
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th style="width: 35%;">UUID</th>
                        <th style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @forelse($users as $u)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td class="small">{{ $u->uuid }}</td>
                            <td>
                                <a href="{{ route('user.edit', $u->uuid) }}" class="btn btn-sm btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('user.delete', ['uuid' => $u->uuid]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete user: {{ $u->name }}?');"
                                        {{ (Auth::check() && Auth::id() == $u->id) ? 'disabled' : '' }}
                                        title="{{ (Auth::check() && Auth::id() == $u->id) ? 'Cannot delete your own account' : '' }}"
                                    >
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                <i class="fas fa-info-circle me-1"></i> No users found. Start by adding a new user.
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
