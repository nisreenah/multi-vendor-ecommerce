@extends('auth.master')

@section('body')
    <body>
        <!-- wrapper -->
        <div class="wrapper">
            <div class="authentication-reset-password d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-lg-5 border-end">
                                    <div class="card-body">

                                        <form method="POST" action="{{ route('password.store') }}">
                                            @csrf

                                            <!-- Password Reset Token -->
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                            <div class="p-5">
                                                <div class="text-start">
                                                    <img src="{{ asset('backend/assets/images/logo-img.png') }}" width="180" alt="">
                                                </div>
                                                <h4 class="mt-5 font-weight-bold">Generate New Password</h4>
                                                <p class="text-muted">We received your reset password request. Please enter your new password!</p>

                                                <!-- Email Address -->
                                                <div class="mb-3 mt-5">
                                                    <x-input-label for="email" class="form-label" :value="__('Email')" />
                                                    <x-text-input id="email" class="form-control" type="email" name="email"
                                                                  :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>

                                                <!-- Password -->
                                                <div class="mb-3 mt-5">
                                                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                                                    <x-text-input id="password" class="form-control" type="password" name="password"
                                                                  required autocomplete="new-password" placeholder="Nwe password"/>
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>


                                                <!-- Confirm Password -->
                                                <div class="mb-4">
                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label"/>

                                                    <x-text-input id="password_confirmation" class="form-control"
                                                                  type="password" placeholder="Confirm password"
                                                                  name="password_confirmation" required autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>

                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                                                    <a href="{{ route('login') }}" class="btn btn-light">
                                                        <i class='bx bx-arrow-back mr-1'></i>Back to Login
                                                    </a>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <img src="{{ asset('backend/assets/images/login-images/forgot-password-frent-img.jpg') }}" class="card-img login-img h-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end wrapper -->
    </body>
@endsection
