<form id="formAuthentication" class="mb-3" method="post" action="{{ route('client.register') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username" required="required" autofocus />
        @if ($errors->has('username'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required="required" />
        @if ($errors->has('email'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="sdt" class="form-label">Phone</label>
        <input type="text" class="form-control" id="sdt" name="sdt" value="{{ old('sdt') }}" placeholder="Enter your phone number" required="required" />
        @if ($errors->has('sdt'))
        <div class="alert alert-danger" role="alert">{{ $errors->first('sdt') }}</div>
        @endif
    </div>
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required="required" />
            @if ($errors->has('password'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
            @endif
        </div>
    </div>
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password_confirmation">Password confirm`</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" required="required" />
            @if ($errors->has('password_confirmation'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>
    </div>
    <p class="text-center">
        <a href="{{ route('client.showclient') }}" class="primary-btn text-dark">
            <span>Sign in instead</span>
        </a>
    </p>
    <button class="btn btn-primary d-grid w-100">Sign up</button>
</form>
