@extends('store.master')

@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                        <div class="row">
                            <div class="heading_s1">
                                <img class="border-radius-15"
                                     src="{{ asset('frontend/assets/imgs/page/reset_password.svg') }}" alt=""/>
                                <h2 class="mb-15 mt-15">Generate New Password</h2>
                                <p class="mb-30">
                                    We received your reset password request. Please enter your new password!
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">

                                        <form method="POST" action="{{ route('password.store') }}">
                                            @csrf

                                            <!-- Password Reset Token -->
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                            <!-- Email Address -->
                                            <div class="form-group">
                                                <input id="email" class="form-control" type="email" name="email"
                                                       value="{{ old('email', $request->email) }}"
                                                       placeholder="{{__('Email')}}"
                                                       required autofocus autocomplete="username"/>
                                            </div>

                                            <!-- Password -->
                                            <div class="form-group">
                                                <x-text-input id="password" class="form-control" type="password"
                                                              name="password"
                                                              required autocomplete="new-password"
                                                              placeholder="Nwe password"/>
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="form-group">
                                                <x-text-input id="password_confirmation" class="form-control"
                                                              type="password" placeholder="Confirm password"
                                                              name="password_confirmation" required
                                                              autocomplete="new-password"/>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up"
                                                        name="login">
                                                    {{ __('Reset Password') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pl-50">
                                <h6 class="mb-15">Password must:</h6>
                                <p>Be between 9 and 64 characters</p>
                                <p>Include at least tow of the following:</p>
                                <ol class="list-insider mb-3">
                                    <li>An uppercase character</li>
                                    <li>A lowercase character</li>
                                    <li>A number</li>
                                    <li>A special character</li>
                                </ol>
                                <a href="{{ route('login') }}" class="btn btn-light">
                                    <i class='bx bx-arrow-back mr-1'></i>Back to Login
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
