@extends('layouts.app')

@section('content')
    <!-- loader start -->
    <div class="bookshelf_wrapper">
        <ul class="books_list">
            <li class="book_item first"></li>
            <li class="book_item second"></li>
            <li class="book_item third"></li>
            <li class="book_item fourth"></li>
            <li class="book_item fifth"></li>
            <li class="book_item sixth"></li>
        </ul>
        <div class="shelf"></div>
    </div>
    <!-- loader end -->



    <!-- banner section start -->
    <div class="comman-log-in clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-6 col-centered">
                    <div class="sign-in clearfix">
                        <div class="title">
                            <h1>sign in</h1>
                        </div>
                        <!-- contact-social section start -->
                        <div class="social clearfix">
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#" class="google"><i class="fa fa-google-plus"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest-p"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="or-line clearfix">
                            <h3>or</h3>
                        </div>

                        <form method="POST" action="{{ route('login') }}">

                            @csrf

                            <div class="sign-in-form clearfix">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input id="username" type="text"
                                            class="form-control form-control-lg @error('username') is-invalid @enderror"
                                            name="username" placeholder="Enter Your Name" value="{{ old('username') }}"
                                            required autocomplete="username" autofocus id="email">
                                        @error('username')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter Your Password" required
                                            autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                @if (Route::has('password.request'))
                                    <p class="condition">
                                        <a href="{{ route('password.request') }}">Forgot-password</a>
                                    </p>
                                @endif
                                <div class="col-12 mb-3">
                                    <div class="form-group d-flex align-item-center justify-content-between flex-wrap">
                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-default btn-red" style="width: 100%">
                                                {{ __('Login') }}
                                            </button>

                                        </div>

                                        @if (Route::has('register'))
                                            <p class="have-account">Don’t have an account? <a
                                                    href="{{ route('register') }}">SIGN up</a></p>
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner section end -->
@endsection
