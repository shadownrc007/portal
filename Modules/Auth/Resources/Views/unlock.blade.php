
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
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="media mb-4">
                                    <div class="avatar avatar-lg me-3">
                                        <img alt="avatar" src="{{ asset(Auth::user()->avatar ?? 'assets/images/avtar/default.png') }}" class="rounded-circle">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                        <p class="mb-0">Enter your password to unlock your session</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <form method="POST" action="{{ route('auth.unlock.post') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required autofocus>
                                        @error('password')
                                            <span class="text-danger small d-block mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">UNLOCK</button>
                                    </div>
                                </form>
                            </div>

                        </div> <!-- row -->
                    </div> <!-- card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
       

@section('scripts')
{{-- Scripts específicos (si los hubiera) --}}
@endsection
