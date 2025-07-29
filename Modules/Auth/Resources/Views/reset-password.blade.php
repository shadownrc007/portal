@extends('layouts.app')

@section('styles')
@vite(['resources/scss/light/assets/authentication/auth-boxed.scss'])
@vite(['resources/scss/dark/assets/authentication/auth-boxed.scss'])
@endsection

@section('content')
<div class="auth-container d-flex h-100">
    <div class="container mx-auto align-self-center">
        <div class="row">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <h4 class="mb-3">Reset Password</h4>

                        <form method="POST" action="{{ route('auth.password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $email ?? old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
