@extends('layouts2.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân viên /</span> Quản lý</h4>
  <a class="btn btn-success mb-4" href="{{ route('nhanviens.create') }}"><i class="bx bx-plus mb-1"></i> Create Nhân viên</a>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card-box  pb-10">
        <div class="h5 pd-20 mb-0">Quản lý nhân viên</div>
        <table class="data-table table nowrap">
        <thead>
          <tr >
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Lương </th>
            <th class="datatable-nosort">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($nhanviens as $nhanvien)
          <tr>
            <td>{{ $nhanvien->ma }}</td>
            <td>{{ $nhanvien->ten }}</td>
            <td>{{ $nhanvien->luong }} VND</td>
            <td>
              <form action="{{ route('nhanviens.destroy',$nhanvien->ma) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('nhanviens.edit',$nhanvien->ma) }}"><i class="bx bx-edit mb-1"></i> Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bx bx-trash mb-1"></i> Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
              {!! $nhanviens->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection