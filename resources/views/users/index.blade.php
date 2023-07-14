@extends('layouts2.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Quản lý</h4>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-box  pb-10">
        <div class="h5 pd-20 mb-0">Quản lý User</div>
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
                @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge {{ ($v=='Admin') ? 'badge-success' : 'badge-warning' }}">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="bx bx-edit mb-1"></i>
                                Edit & Change Role</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bx bx-trash mb-1"></i> Delete</button>
                        </form>
                    </td>
                    {{-- <td>
              <a class="btn btn-primary" href="{{ route('chat.view',$user->id) }}"><i class="bx bx-message"></i></a>
                    </td> --}}
                </tr>
                @endforeach
                {{-- <tr>
                    <td>
                        {!! $users->links("pagination::bootstrap-4") !!}
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
