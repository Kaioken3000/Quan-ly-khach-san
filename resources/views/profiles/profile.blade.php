@extends('layouts2.appForCalendar')

@section('content')
<style>
    .fc-title {
        color: white;
    }
</style>
<div class="row m-0 p-0">
    <div class="col-3 my-3">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card-box">
            <div class="h5 pd-20 mb-0">Thông tin tài khoản</div>
            <div class="text-center">
                <img class="w-50 rounded-circle m-auto" src="/adminresource/assets/img/avatars/blank.jpeg" alt="">
            </div>
            <div class="card-body">
                <p>ID: {{ Auth::user()->id }}</p>
                <p>Username: {{ Auth::user()->username }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                @hasrole('Admin')
                <p>Role: Admin</p>
                @else
                <p>Role: User</p>
                @endhasrole
                <a class="btn btn-primary" href="/profiles/vieweditprofile"><i class="bx bx-edit mb-1"></i> Edit</a>
            </div>
        </div>
    </div>
    <div class="col">
        @include('layouts2.viewCalendar')
    </div>
</div>

@endsection
