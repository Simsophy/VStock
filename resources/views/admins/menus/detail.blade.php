@extends('layouts.master')

@section('title', 'Menu Detail')
@section('page_title', 'Menu Detail')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Menu Detail</h5>
        <div>
            <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-sm">Back</a>
            <a href="{{ route('menu.edit', $m->id) }}" class="btn btn-primary btn-sm">Edit</a>

            <form action="{{ route('menu.delete', $m->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this menu?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <!-- Name Column -->
            <div class="col-md-4">
                <label class="form-label fw-bold">Name</label>
                <label class="form-control">{{ $m->name }}</label>
            </div>

            <!-- Link Column -->
            <div class="col-md-4">
                <label class="form-label fw-bold">Link</label>
                <a href="{{ $m->link }}" target="_blank" class="form-control">{{ $m->link }}</a>
            </div>

            <!-- Sub-menus Column -->
            <div class="col-md-4">
                <label class="form-label fw-bold">Sub-menus</label>
                @if($m->subMenus->count())
                    <ul class="list-group">
                        @foreach($m->subMenus as $sub)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ route('menu.detail', $sub->id) }}">{{ $sub->name }}</a>
                                <div>
                                    <a href="{{ route('menu.edit', $sub->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <form action="{{ route('menu.delete', $sub->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this sub-menu?')">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <label class="form-control">No sub-menus</label>
                @endif
            </div>
        </div>

        <a href="{{ route('menu.create', ['parent_id' => $m->id]) }}" class="btn btn-success btn-sm">
            + Add Sub-menu
        </a>
    </div>
</div>
@endsection
