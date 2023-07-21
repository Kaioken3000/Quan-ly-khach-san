<form id="formAuthentication" class="mb-3" method="post" action="{{ route('login.perform') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    @include('layouts2.messages')

    {{-- Email --}}
    <label for="email" class="form-label">Email or Username</label>
    <div class="mb-3 input-group custom">
        <input type="text" class="form-control" id="email" name="username" value="{{ old('username') }}"
            placeholder="Enter your email or username" autofocus required="required" />
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
        </div>
        @if ($errors->has('username'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
        @endif
    </div>

    {{-- Password --}}
    <label class="form-label" for="password">Password</label>
    <div class="mb-3 input-group custom">
        <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            required="required" />
        <div class="input-group-append custom">
            <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
        </div>
        @if ($errors->has('password'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
        @endif
    </div>

    {{-- Remember me --}}
    <div class="row pb-30">
        <div class="col-6">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" />
                <label class="custom-control-label" for="customCheck1">Remember</label>
            </div>
        </div>
        <div class="col-6">
            <div class="forgot-password">
                <a href="forgot-password.html">Forgot Password</a>
            </div>
        </div>
    </div>

    {{-- Sign in --}}
    <div class="mb-3">
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="input-group mb-0">
                <!--
                    use code for form submit
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                -->
                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign in</button>
            </div>
            <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                OR
            </div>
            <div class="input-group mb-0">
                <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('register.perform') }}">Register To
                    Create Account</a>
            </div>
            {{-- Orther sign in --}}
            <div class="mt-4 text-center">
                <a href="{{ route('auth.google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                </a>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ url('auth/facebook') }}">
                    <img width="60%" src="/client/images/facebookLogin.png">
                </a>
            </div>
        </div>
    </div>

</form>
