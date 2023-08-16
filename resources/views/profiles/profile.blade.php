@extends('layouts3.appForCalendar')

@section('content')
    <style>
        .fc-title {
            color: white;
        }
    </style>
    <div class="row m-0 p-0">
        <div class="col-3 my-3" style="margin-top: 320px;">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card" style="margin-top: 60px">
                <div class="h5 card-header">Thông tin tài khoản</div>
                <div class="text-center mt-3">
                    <img class="w-50 rounded-circle m-auto" src="/adminresource/assets/img/avatars/blank.jpeg" alt="">
                </div>
                <div class="card-body">
                    <p>ID: {{ Auth::user()->id }}</p>
                    <p>Username: {{ Auth::user()->username }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    @hasanyrole('MainAdmin|Admin')
                        <p>Role: Admin</p>
                    @else
                        <p>Role: User</p>
                    @endhasanyrole
                    <a class="btn btn-primary" href="/profiles/vieweditprofile"><i class="bx bx-edit mb-1"></i> Edit</a>
                </div>
            </div>
        </div>
        <div class="col">
            @include('layouts2.viewCalendar')
        </div>
    </div>
@endsection
