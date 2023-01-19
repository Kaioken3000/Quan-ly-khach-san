<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/adminresource/assets/"
  data-template="vertical-menu-template-free"
>
  @include('layouts.head')

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                @include('layouts.logo')
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Make your app management easy and fun!</p>

              <form id="formAuthentication" class="mb-3" method="post" action="{{ route('client.register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username" 
                    value="{{ old('username') }}"
                    placeholder="Enter your username"
                    required="required"
                    autofocus
                  />
                  @if ($errors->has('username'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
                  @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Enter your email" 
                    required="required"/>
                    @if ($errors->has('email'))
                      <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      value="{{ old('password') }}"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required="required"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @if ($errors->has('password'))
                      <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password_confirmation">Password confirm`</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password_confirmation"
                      class="form-control"
                      name="password_confirmation"
                      value="{{ old('password_confirmation') }}"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password_confirmation"
                      required="required"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @if ($errors->has('password_confirmation'))
                      <div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login.perform') }}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    @include('layouts.script')
  </body>
</html>
