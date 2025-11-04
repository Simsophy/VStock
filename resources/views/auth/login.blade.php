<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            max-width: 450px;
            width: 100%;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
<div class="card login-card p-4">
    <div class="card-body">
        <h2 class="card-title fw-bold text-center mb-3">Welcome Back!</h2>
        <p class="text-center text-muted mb-4">Login with your username and password</p>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

   <form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input id="name" type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" 
               class="form-control @error('password') is-invalid @enderror" 
               name="password" required>
        @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3 text-end">
        <a href="{{ route('password.reset') }}" class="text-decoration-none">
            Forgot Password?
        </a>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Login</button>
    </div>
</form>


