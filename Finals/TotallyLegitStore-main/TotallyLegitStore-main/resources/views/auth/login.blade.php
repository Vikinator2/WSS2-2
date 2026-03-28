@extends('layouts.app')

@section('title', 'Login - Totally Legit Store')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-store-teal">Totally Legit Store</h1>
                <p class="lead text-store-muted">Admin Portal - A Legit store with Legit Products</p>
            </div>

            <div class="card store-card">
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label text-store-light">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="admin@legitadmin.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-store-light">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-store-light">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password"
                                   placeholder="Enter password (67-8)">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-store-light">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-store-muted" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-store btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Login to Dashboard
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-store-muted">
                    <strong class="text-store-teal">Demo Credentials:</strong><br>
                    <span class="text-store-light">Email: admin@legitadmin.com</span><br>
                    <span class="text-store-light">Password: 67-8</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection