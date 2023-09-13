<form id="formAuthentication" class="mb-3" method="post" action="{{ route('register.perform') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    {{-- Username --}}
    <label for="username" class="form-label">Username</label>
    <div class="mb-3 text-start">
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
            placeholder="Enter your username" required="required" autofocus />
        @if ($errors->has('username'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
        @endif
    </div>

    {{-- Email --}}
    <label for="email" class="form-label">Email</label>
    <div class="mb-3 text-start">
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
            placeholder="Enter your email" required="required" />
        @if ($errors->has('email'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
        @endif
    </div>

    {{-- SDT --}}
    <label for="sdt" class="form-label">Số Điện Thoại</label>
    <div class="mb-3 text-start">
        <input type="text" class="form-control" id="sdt" name="sdt" value="{{ old('sdt') }}"
            placeholder="Enter your phone number" required="required"
            regex="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" />
        @if ($errors->has('sdt'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('sdt') }}</div>
        @endif
    </div>

    {{-- Password --}}
    <label class="form-label" for="password">Mật khẩu</label>
    <div class="mb-3 text-start">
        <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password" required="required" />
        @if ($errors->has('password'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
        @endif
    </div>

    {{-- Password confirm --}}
    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu</label>
    <div class="mb-3 text-start">
        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
            value="{{ old('password_confirmation') }}"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password_confirmation" required="required" />
        @if ($errors->has('password_confirmation'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation') }}</div>
        @endif
    </div>

    {{-- Checkbox --}}
    {{-- <div class="form-check mb-3"><input class="form-check-input" id="termsService" type="checkbox"><label
            class="form-label fs--1 text-none" for="termsService">I accept the <a href="#!">terms </a>and <a
                href="#!">privacy policy</a></label></div> --}}

    {{-- Sign up --}}
    <button class="btn btn-primary d-grid w-100">Đăng ký</button>
</form>
