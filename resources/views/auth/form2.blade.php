<form id="formAuthentication" class="mb-3" method="post" action="{{ route('login.perform') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    @include('layouts2.messages')

    {{-- Email --}}
    <div class="mb-3 text-start">
        <label for="email" class="form-label">Email hoặc Username</label>
        <div class="form-icon-container">
            <input type="text" class="form-control form-icon-input" id="email" name="username"
                value="{{ old('username') }}" placeholder="Enter your email or username" autofocus
                required="required" />
            <span class="fas fa-user text-900 fs--1 form-icon"></span>
        </div>
        @if ($errors->has('username'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
        @endif
    </div>

    {{-- Password --}}
    <div class="mb-3 text-start">
        <label class="form-label" for="password">Mật khẩu</label>
        <div class="form-icon-container">
            <input type="password" id="password" class="form-control form-icon-input" name="password"
                value="{{ old('password') }}"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                required="required" />
            <span class="fas fa-key text-900 fs--1 form-icon"></span>
        </div>
        @if ($errors->has('password'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
        @endif
    </div>

    {{-- Remember me --}}
    {{-- <div class="row flex-between-center mb-7">
        <div class="col-auto">
            <div class="form-check mb-0"><input class="form-check-input" id="basic-checkbox" type="checkbox"
                    checked="checked" /><label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
            </div>
        </div>
        <div class="col-auto"><a class="fs--1 fw-semi-bold" href="#">Forgot Password?</a></div>
    </div> --}}
    {{-- Sign in --}}
    <button class="btn btn-primary w-100 mb-3" type="submit">Đăng nhập</button>

</form>
