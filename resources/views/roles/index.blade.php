@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="">
        <div class="d-flex">
            <div class="flex-grow-1">
                @include('layouts3.title', ['titlePage' => 'Quản lý vai trò'])
            </div>
            <div>
                <a class="btn btn-success mb-4" href="{{ route('roles.create') }}"><i class="fas fa-plus"></i> Tạo
                    Role</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('role-delete')
                                <form action="{{ route('roles.destroy', $role->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}"><i
                                            class="bx bx-edit mb-1"></i> Cập nhật</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bx bx-trash mb-1"></i>
                                        Xóa</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                {{-- <tr>
            <td>
              {!! $roles->links("pagination::bootstrap-4") !!}
            </td>
          </tr> --}}
            </tbody>
        </table>
    </div>
@endsection
