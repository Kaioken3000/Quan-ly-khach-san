<!DOCTYPE html>
<html>
@include('layouts2.head')
<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="/bootstrap4//bootstrap4/vendors/images/deskapp-logo.svg" alt="" />
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ route('login.perform') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="/bootstrap4/vendors/images/login-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Register New Account</h2>
                        </div>

                        <form id="formAuthentication" class="mb-3" method="post" action="{{ route('register.perform') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            {{-- Username --}}
                            <label for="username" class="form-label">Username</label>
                            <div class="mb-3 input-group custom">
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username" required="required" autofocus />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                @if ($errors->has('username'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
                                @endif
                            </div>

                            {{-- Email --}}
                            <label for="email" class="form-label">Email</label>
                            <div class="mb-3 input-group custom">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required="required" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-email1"></i></span>
                                </div>
                                @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            {{-- Password --}}
                            <label class="form-label" for="password">Password</label>
                            <div class="mb-3 input-group custom">
                                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required="required" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            {{-- Password confirm --}}
                            <label class="form-label" for="password_confirmation">Password confirm</label>
                            <div class="mb-3 input-group custom">
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" required="required" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            {{-- Checkbox --}}
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                    <label class="custom-control-label" for="customCheck1">I agree to privacy policy & terms</label>
                                </div>
                            </div>

                            {{-- Sign up --}}
                            <button class="btn btn-primary d-grid w-100">Sign up</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts2.script')
</body>
</html>
