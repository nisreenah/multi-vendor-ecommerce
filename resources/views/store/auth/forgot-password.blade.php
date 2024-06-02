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
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{ asset('frontend/assets/imgs/page/login-1.png') }}" alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="mb-80">
                                            <div class="heading_s1">
                                                <h1 class="mb-5">Forgot Password</h1>
                                                <p class="mb-30">Enter your registered email address to reset the password </p>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <input type="text" required="" value="{{ old('email') }}" name="email" placeholder="example@user.com"/>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-heading btn-block hover-up">{{ __('Email Password Reset Link') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
