<form id="formAuthentication" class="mb-3" method="post" action="{{ route('client.loginclient') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    @include('layouts2.messages')
    <div class="mb-3">
        <label for="email" class="form-label">Email hoặc Username</label>
        <input type="text" class="form-control" id="email" name="username" value="{{ old('username') }}" placeholder="Enter your email or username" autofocus required="required" />
        @if ($errors->has('username'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
        @endif
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Mật khẩu</label>
        </div>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required="required" />
            @if ($errors->has('password'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
            @endif
        </div>
    </div>
    {{-- <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" />
            <label class="form-check-label" for="remember-me"> Remember Me </label>
        </div>
    </div> --}}
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Xác nhận</button>
    </div>
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
    <div class="mt-4 text-center">
        <p class="text-center">
            <a href="{{ route('client.registershow') }}" class="primary-btn text-dark">
                <span>Tạo tài khoản</span>
            </a>
        </p>
    </div>
</form>
