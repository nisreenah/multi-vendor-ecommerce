@extends('auth.master')

@section('body')

    <body class="bg-login">

        <!--wrapper-->
        <div class="wrapper">
            <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                        <div class="col mx-auto">
                            <div class="my-4 text-center">
                                <img src="{{ asset('backend/assets/images/logo-img.png') }}" width="180" alt="" />
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Sign Up</h3>
                                            <p>Already have an account? <a href="{{ route('login') }}">{{ __('Log in') }}</a>
                                            </p>
                                        </div>
                                        <div class="d-grid">
                                            <a class="btn my-4 shadow-sm btn-white" href="javascript:;">
                                                <span class="d-flex justify-content-center align-items-center">
                                                    <img class="me-2" src="{{ asset('backend/assets/images/icons/search.svg') }}"
                                                         width="16" alt="Image Description">
                                                    <span>Sign Up with Google</span>
                                                </span>
                                            </a> <a href="javascript:;" class="btn btn-facebook">
                                                <i class="bx bxl-facebook"></i>Sign Up with Facebook
                                            </a>
                                        </div>
                                        <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                            <hr/>
                                        </div>

                                        <div class="form-body">
                                            <form class="row g-3" method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <!-- Name -->
                                                <div class="col-sm-6">
                                                    <x-input-label for="name" :value="__('Name')" class="form-label" />
                                                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                                                                  placeholder="Jhon" required autofocus autocomplete="name" />
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </div>

                                                <!-- Username -->
                                                <div class="col-sm-6">
                                                    <x-input-label for="username" :value="__('Username')" class="form-label" />
                                                    <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')"
                                                                  placeholder="jhon" required autofocus autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                                </div>

                                                <!-- Email Address -->
                                                <div class="col-12">
                                                    <x-input-label for="email" :value="__('Email')" class="form-label"/>
                                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                                                                  placeholder="example@user.com" required autocomplete="email" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>


                                                <!-- Password -->
                                                <div class="col-sm-6">
                                                    <x-input-label for="password" :value="__('Password')" class="form-label" />

                                                    <x-text-input id="password" class="form-control"
                                                                  type="password" name="password" placeholder="Enter Password"
                                                                  required autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="col-sm-6">
                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />

                                                    <x-text-input id="password_confirmation" class="form-control"
                                                                  type="password" placeholder="Enter confirmation Password"
                                                                  name="password_confirmation" required autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                </div>

                                                <div class="col-12">
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                                        {{ __('Already registered?') }}
                                                    </a>

                                                </div>

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>{{ __('Register') }}</button>
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
