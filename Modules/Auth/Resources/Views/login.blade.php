@extends('layouts.app')

@section('styles')
{{-- Aquí van tus estilos --}}
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
            <form action="{{ route('auth.login') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-12 mb-3">
                  <h2>Sign In</h2>
                  <p>Enter your email and password to login</p>
                </div>

                <div class="col-md-12 mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                  @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12 mb-4">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                  @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12 mb-3">
                  <div class="form-check form-check-primary form-check-inline">
                    <input class="form-check-input me-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember me</label>
                  </div>
                </div>

                <div class="col-12 mb-4">
                  <button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
                </div>

                <div class="col-12 mb-4">
                  <div class="seperator">
                    <hr>
                    <div class="seperator-text"><span>Or continue with</span></div>
                  </div>
                </div>

                {{-- Botones sociales (puedes añadir rutas sociales aquí) --}}
                <div class="col-sm-4 col-12 mb-4">
                  <button type="button" class="btn btn-social-login w-100">
                    <img src="{{ Vite::asset('resources/images/google-gmail.svg') }}" alt="" class="img-fluid">
                    <span class="btn-text-inner">Google</span>
                  </button>
                </div>
                <div class="col-sm-4 col-12 mb-4">
                  <button type="button" class="btn btn-social-login w-100">
                    <img src="{{ Vite::asset('resources/images/github-icon.svg') }}" alt="" class="img-fluid">
                    <span class="btn-text-inner">Github</span>
                  </button>
                </div>
                <div class="col-sm-4 col-12 mb-4">
                  <button type="button" class="btn btn-social-login w-100">
                    <img src="{{ Vite::asset('resources/images/twitter.svg') }}" alt="" class="img-fluid">
                    <span class="btn-text-inner">Twitter</span>
                  </button>
                </div>

                <div class="col-12 text-center">
                  <p class="mb-0">
                      Don’t have an account?
                      <a href="{{ route('auth.register') }}" class="text-warning">Sign Up</a>
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
{{-- Scripts específicos (si los hubiera) --}}
@endsection
