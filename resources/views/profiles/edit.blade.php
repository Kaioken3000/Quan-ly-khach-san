@extends('layouts2.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="/profile"><i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Role/</span> Edit</h4>
  @if(session('status'))
  <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
  </div>
  @endif
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card-box">
        <div class="card-header">
          <h5 class="mb-0">From nhập liệu</h5>
          
        </div>
        <div class="card-body">
          <form action="{{ route('profile.editprofile', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="VD: Admin@gmail.com" value="{{ $user->email }}"/>
              @error('email')
              <div class="alert alert-danger" user="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="VD: Admin" value="{{ $user->username }}"/>
              @error('username')
              <div class="alert alert-danger" user="alert">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection