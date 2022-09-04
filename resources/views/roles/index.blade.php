@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Role /</span> Quản lý</h4>
  <a class="btn btn-success mb-4" href="{{ route('roles.create') }}"><i class="bx bx-plus mb-1"></i> Create Role</a>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card">
    <h5 class="card-header">Quản lý Role</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="thead-dark">
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($roles as $key => $role)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>            
            @can('role-delete')    
              <form action="{{ route('roles.destroy',$role->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="bx bx-edit mb-1"></i> Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bx bx-trash mb-1"></i> Delete</button>
              </form>
            @endcan
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
              {!! $roles->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection