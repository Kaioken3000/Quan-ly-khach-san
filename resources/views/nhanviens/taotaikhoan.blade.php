@extends('layouts3.app')

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('nhanviens.index') }}"> <i class="bx bx-chevron-left mb-1"></i> Back</a>
    </div>
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Nhân viên/</span> Create</h4>
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <!-- Basic Layout -->
    <h5 class="mb-0">Nhập thông tin tài khoản nhân viên</h5>
    <form action="/nhanviens-taotaikhoan" method="POST">
        @csrf
        <input type="hidden" name="nhanvienid" value="{{ $request->nhanvienid }}">
        <br>
        {{-- Username --}}
        <label for="username" class="form-label">Username</label>
        <div class="mb-3 input-group custom">
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
                placeholder="Enter your username" required="required" autofocus />
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
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                placeholder="Enter your email" required="required" />
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-email1"></i></span>
            </div>
            @if ($errors->has('email'))
                <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
            @endif
        </div>

        {{-- SDT --}}
        <label for="sdt" class="form-label">Phone Number</label>
        <div class="mb-3 input-group custom">
            <input type="text" class="form-control" id="sdt" name="sdt" value="{{ old('sdt') }}"
                placeholder="Enter your phone number" required="required"
                regex="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" />
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-phone-call"></i></span>
            </div>
            @if ($errors->has('sdt'))
                <div class="alert alert-danger" role="alert">{{ $errors->first('sdt') }}</div>
            @endif
        </div>

        {{-- Password --}}
        <label class="form-label" for="password">Password</label>
        <div class="mb-3 input-group custom">
            <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" required="required" />
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
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                value="{{ old('password_confirmation') }}"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password_confirmation" required="required" />
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
            </div>
            @if ($errors->has('password_confirmation'))
                <div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
@endsection
