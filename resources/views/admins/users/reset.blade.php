@extends('layouts.master')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="card shadow-lg border-0" style="max-width: 400px; width: 100%;">
        <div class="card-body p-4 p-md-5">

            <h2 class="fw-bold mb-3 text-center">Reset Password</h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('do.reset') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </form>

        </div>
    </div>
</div>
@endsection
