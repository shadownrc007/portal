@php
    $simplePage = true;
    $title      = 'Sign Up';
@endphp

@extends('layouts.app')

@section('styles')
    @vite(['resources/scss/light/assets/authentication/auth-boxed.scss'])
    @vite(['resources/scss/dark/assets/authentication/auth-boxed.scss'])
@endsection

@section('content')
<div class="auth-container d-flex">
    <div class="container mx-auto align-self-center">
        <div class="row">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <form action="{{ route('auth.register') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>Sign Up</h2>
                                    <p>Enter your name, email and password to register</p>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                           name="password"
                                           class="form-control">
                                    @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password"
                                           name="password_confirmation"
                                           class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <input class="form-check-input me-3"
                                               type="checkbox"
                                               name="terms"
                                               id="form-check-default"
                                               {{ old('terms') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="form-check-default">
                                            I agree to the
                                            <a href="#" class="text-primary">Terms and Conditions</a>
                                        </label>
                                    </div>
                                    @error('terms')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-4">
                                    <button type="submit" class="btn btn-secondary w-100">
                                        SIGN UP
                                    </button>
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="seperator">
                                        <hr>
                                        <div class="seperator-text"><span>Or continue with</span></div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-12 mb-4">
                                    <button type="button" class="btn btn-social-login w-100">
                                        <img src="{{ Vite::asset('resources/images/google-gmail.svg') }}"
                                             alt="" class="img-fluid">
                                        <span class="btn-text-inner">Google</span>
                                    </button>
                                </div>

                                <div class="col-sm-4 col-12 mb-4">
                                    <button type="button" class="btn btn-social-login w-100">
                                        <img src="{{ Vite::asset('resources/images/github-icon.svg') }}"
                                             alt="" class="img-fluid">
                                        <span class="btn-text-inner">Github</span>
                                    </button>
                                </div>

                                <div class="col-sm-4 col-12 mb-4">
                                    <button type="button" class="btn btn-social-login w-100">
                                        <img src="{{ Vite::asset('resources/images/twitter.svg') }}"
                                             alt="" class="img-fluid">
                                        <span class="btn-text-inner">Twitter</span>
                                    </button>
                                </div>

                                <div class="col-12 text-center">
                                    <p class="mb-0">
                                        Already have an account?
                                        <a href="{{ route('auth.login') }}" class="text-warning">
                                            Sign in
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
