@extends('auth.master')

@section('body')

    <body class="bg-login">
        <!--wrapper-->
        <div class="wrapper">
            <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="mb-4 text-center">
                                <img src="{{ asset('backend/assets/images/logo-img.png') }}" width="180" alt=""/>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Sign in</h3>
                                            <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a>
                                            </p>
                                        </div>
                                        <div class="d-grid">
                                            <a class="btn my-4 shadow-sm btn-white" href="javascript:;">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <img class="me-2" src="{{ asset('backend/assets/images/icons/search.svg') }}"
                                                         width="16" alt="Image Description">
                                                    <span>Sign in with Google</span>
                                                </span>
                                            </a>
                                            <a href="javascript:;" class="btn btn-facebook">
                                                <i class="bx bxl-facebook"></i>Sign in with Facebook
                                            </a>
                                        </div>
                                        <div class="login-separater text-center mb-4"><span>OR SIGN IN WITH EMAIL</span>
                                            <hr/>
                                        </div>
                                        <div class="form-body">

                                            <!-- Session Status -->
                                            <x-auth-session-status class="mb-4" :status="session('status')" />

                                            <form method="POST" action="{{ route('login') }}" class="row g-3">
                                                @csrf

                                                <!-- Email Address -->
                                                <div class="col-12">
                                                    <x-input-label for="email" :value="__('Email')" class="form-label"/>
                                                    <x-text-input id="email" class="form-control" type="email" name="email"
                                                                  placeholder="Email Address" :value="old('email')" required autofocus autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>

                                                <!-- Password -->
                                                <div class="col-12">
                                                    <x-input-label class="form-label" for="password" :value="__('Password')" />

                                                    <x-text-input id="password" class="form-control border-end-0"
                                                                  type="password" placeholder="Enter Password"
                                                                  name="password"
                                                                  required autocomplete="current-password" />

                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="remember_me" checked>
                                                        <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-end">
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}">
                                                            {{ __('Forgot your password?') }}
                                                        </a>
                                                    @endif
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bx bxs-lock-open"></i>{{ __('Log in') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end wrapper-->

        @include('auth.scripts')

    </body>

@endsection
