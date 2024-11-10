@extends('layouts.admin-auth')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#"
                                            class="noble-ui-logo d-block mb-2">{{ __('panel.university') }}<span>{{ __('panel.ibb') }}</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                        <form class="forms-sample">
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">Email address</label>
                                                <input type="email" class="form-control" id="userEmail"
                                                    placeholder="Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="userPassword"
                                                    autocomplete="current-password" placeholder="Password">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck">
                                                <label class="form-check-label" for="authCheck">
                                                    Remember me
                                                </label>
                                            </div>
                                            <div>
                                                <a href="../../dashboard.html"
                                                    class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</a>
                                                <button type="button"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    <i class="btn-icon-prepend" data-feather="twitter"></i>
                                                    Login with twitter
                                                </button>
                                            </div>
                                            <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a>
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

    <div class="card">
        <div class="card-body">

            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="{{ route('admin.index') }}" class="auth-logo">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto"
                            alt="">
                        <img src="{{ asset('backend/images/logo-light.png') }}" height="30" class="logo-light mx-auto"
                            alt="">
                    </a>
                </div>
            </div>

            <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

            <div class="p-3">
                <form class="form-horizontal mt-3" action="{{ route('login') }}" method="POST" class="user">
                    @csrf
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" type="text" name='username' id="username"
                                value="{{ old('username') }}" placeholder="Username">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" type="password" name="password" id="password"
                                placeholder="Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-label ms-1" for="remember">Remember me</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>


                </form>
                <div class="form-group mb-0 row mt-2">
                    <div class="col-sm-7 mt-3">
                        <a href="{{ route('admin.recover-password') }}" class="text-muted"><i class="mdi mdi-lock"></i>
                            Forgot your password?</a>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
        <!-- end cardbody -->
    </div>
@endsection
