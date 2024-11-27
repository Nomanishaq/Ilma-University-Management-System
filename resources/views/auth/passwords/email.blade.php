@extends('auth.layouts.master')
@section('title', __('auth_email'))
@section('content')

<!-- Start Content-->
<div class="card">
    <div class="card-body text-center">

        <div class="pt-4 pb-5">    
            <img src="{{ asset('uploads/setting/'.$setting->logo_path) }}" class="img-fluid" alt="logo">
        </div>
        

        <h3 class="mb-4">{{ __('auth_email_title') }}</h3>

        @include('web.student.inc.message')

        <!-- Form Start -->
        <form method="POST" action="{{ route('password.email') }}">
        @csrf 
            <div class="input-group mb-5">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('field_email') }}" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="submit" class="btn w-75 rounded-4 btn-info shadow-2 mb-4 border-0" style="background-color: #a05052;" name="submit" value="{{ __('auth_send_reset_link') }}">
        </form>
        <!-- Form End -->

        @if (Route::has('login'))
        <p class="mb-0 text-muted">
            {{ __("auth_already_have_account") }} 
            <a href="{{ route('login') }}">
                {{ __('auth_login') }}
            </a>
        </p>
        @endif
    </div>
</div>
<!-- End Content-->

@endsection
