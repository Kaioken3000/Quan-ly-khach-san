@extends('layouts3.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="">
            <div class="d-flex">
                <div class="flex-grow-1">
                    @include('layouts3.title', ['titlePage' => 'Quản lý nhân viên'])
                </div>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <label
                                    class="badge {{ $user->getRoleNames()[0] == 'MainAdmin' ? 'bg-success' 
                                    : 
                                    ($user->getRoleNames()[0] == 'Admin' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ $user->getRoleNames()[0] }}</label>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                            class="bx bx-edit mb-1"></i>
                                        Cập nhật & Đổi vai trò</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bx bx-trash mb-1"></i>
                                        Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
