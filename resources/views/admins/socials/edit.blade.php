
@extends('layouts.master')

@section('title', 'Edit Social')
@section('page_title', 'Edit Social: ' . $social->name)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Social Details</h5>
    </div>

    <div class="card-body">
        <!-- ✅ Correct form for updating Social -->
     <form action="{{ route('social.update', $social->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH') <!-- PATCH works with resource route -->

    <!-- Platform Name -->
    <input type="text" name="name" value="{{ old('name', $social->name) }}" >

    <!-- Icon Upload -->
    <input type="file" name="icon" accept="image/*">

    <!-- Link -->
    <input type="url" name="link" value="{{ old('link', $social->link) }}" >

    <button type="submit">Update</button>
</form>

    </div>
</div>
@endsection
