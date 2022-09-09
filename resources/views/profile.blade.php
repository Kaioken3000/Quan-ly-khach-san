@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card col-4">
        <h3 class="card-header">Thông tin tài khoản</h3>
        <img class="w-50 rounded-circle m-auto  " src="/adminresource/assets/img/avatars/blank.jpeg" alt="">
        <div class="card-body">
            <p>ID: {{ Auth::user()->id }}</p>
            <p>Username: {{ Auth::user()->username }}</p>
            <p>Email: {{ Auth::user()->email }}</p>
            @hasrole('Admin')
            <p>Role: Admin</p>
            @else
            <p>Role: User</p>
            @endhasrole
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="bx bx-edit mb-1"></i> Edit</a>
        </div>
    </div>
</div>

@endsection