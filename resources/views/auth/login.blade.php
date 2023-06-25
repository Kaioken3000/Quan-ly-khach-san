<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="/adminresource/assets/" data-template="vertical-menu-template-free">
@include('layouts.head')

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              @include('layouts.logo')
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to Nam.inc! 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>

            <form id="formAuthentication" class="mb-3" method="post" action="{{ route('login.perform') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              @include('layouts.messages')
              <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input type="text" class="form-control" id="email" name="username" value="{{ old('username') }}"
                  placeholder="Enter your email or username" autofocus required="required" />
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
                  <input type="password" id="password" class="form-control" name="password"
                    value="{{ old('password') }}"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" required="required" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
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
            </form>

            <p class="text-center">
              <span>New on our platform?</span>
              <a href="{{ route('register.perform') }}">
                <span>Create an account</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  @include('layouts.script')
</body>

</html>