@extends('layouts.app')

@section('styles')
{{-- Style Here --}}
@vite(['resources/scss/light/assets/authentication/auth-boxed.scss'])
@vite(['resources/scss/dark/assets/authentication/auth-boxed.scss'])
@endsection

@section('content')
{{-- Content Here --}}
<div class="auth-container d-flex h-100">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        <div class="row">
                     <form method="POST" action="{{ route('auth.password.email') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary w-100">Send Reset Link</button>
                    </form>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

</div>
@endsection

@section('scripts')
{{-- Scripts Here --}}
@endsection