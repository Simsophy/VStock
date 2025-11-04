@extends('layouts.master')

@section('title', 'Social List')

@section('page_title')
Socials
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
        <h5 class="mb-0">Social</h5>
        <a href="{{ route('social.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add Social
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
             
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Link</th>
 <th>
    @php
        $currentSort = request('sort', 'asc');
    @endphp
    Position
    <a href="{{ route('social.index', ['sort' => 'asc']) }}"
       class="btn btn-sm ms-1 {{ $currentSort === 'asc' ? 'btn-primary' : 'btn-outline-primary' }}">
        <i class="fas fa-arrow-up"></i>
    </a>

    <a href="{{ route('social.index', ['sort' => 'desc']) }}"
       class="btn btn-sm ms-1 {{ $currentSort === 'desc' ? 'btn-primary' : 'btn-outline-primary' }}">
        <i class="fas fa-arrow-down"></i>
    </a>
</th>


                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($socials as $i => $s)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $s->name }}</td>
                            <td>
                                <img src="{{ asset($s->icon) }}" width="27" alt="">
                            </td>
                            <td class="small">{{ $s->link }}</td>
                            <td>{{ $s->position }}</td>
                            <td>
                                <a href="{{ route('social.edit', $s->id) }}" class="btn btn-sm btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <!-- Delete via POST -->
                                <form action="{{ route('social.delete', ['id' => $s->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete social: {{ $s->name }}?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No social data found.</td>
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
