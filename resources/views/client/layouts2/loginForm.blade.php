<form id="formAuthentication" class="mb-3" method="post" action="{{ route('client.loginclient') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    @include('layouts.messages')
    <div class="mb-3">
        <label for="email" class="form-label">Email or Username</label>
        <input type="text" class="form-control" id="email" name="username" value="{{ old('username') }}" placeholder="Enter your email or username" autofocus required="required" />
        @if ($errors->has('username'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
        @endif
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
            <a href="auth-forgot-password-basic.html">
                <small>Forgot Password?</small>
            </a>
        </div>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required="required" />
            @if ($errors->has('password'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
            @endif
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" />
            <label class="form-check-label" for="remember-me"> Remember Me </label>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('auth.google') }}">
            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
        </a>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ url('auth/facebook') }}">
            <img width="60%" src="https://scontent.fvca1-1.fna.fbcdn.net/v/t39.2365-6/294967112_614766366879300_4791806768823542705_n.png?_nc_cat=105&ccb=1-7&_nc_sid=ad8a9d&_nc_ohc=lY6o8dYUVBoAX-7_cZi&_nc_ht=scontent.fvca1-1.fna&oh=00_AfAY3ICsQeIK7TuxPmXUxYEkC2m3HvMa__0daElgATQILQ&oe=64A30EA4">
        </a>
    </div>
    <div class="mt-4 text-center">
        <p class="text-center">
            <a href="{{ route('client.registershow') }}" class="primary-btn text-dark">
                <span>Create an account</span>
            </a>
        </p>
    </div>
</form>
