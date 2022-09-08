@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Đặt phòng /</span> Quản lý</h4>
  <a class="btn btn-success mb-4" href="{{ route('khachhangs.create') }}"><i class="bx bx-plus mb-1"></i> Đặt phòng</a>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card">
    <h5 class="card-header">Quản lý phòng</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="thead-dark">
            <th>id</th>
            <th>Ngày đặt</th>
            <th>Ngày trả</th>
            <th>Số luọng</th>
            <th>Phòng</th>
            <th>Khách hàng</th>
            <th>Thanh toán</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datphongs as $datphong)
          <tr>
            <td>{{ $datphong->id }}</td>
            <td>{{ $datphong->ngaydat }}</td>
            <td>{{ $datphong->ngaytra }}</td>
            <td>{{ $datphong->soluong }}</td>
            <td>{{ $datphong->phongid }}</td>
            <td>{{ $datphong->khachhangid }}</td>
            <td>
              <label class="badge {{ ($datphong->tinhtrangthanhtoan == 0) ? 'bg-warning' : 'bg-success' }}">
              {{ ($datphong->tinhtrangthanhtoan == 0) ? 'Chưa' : 'Rồi' }}
              </label>
            </td>
            <td class="d-flex gap-1">
              @if($datphong->tinhtrangthanhtoan == 0)
              <form action="{{ route('datphongs.destroy',$datphong->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('datphongs.edit',$datphong->id) }}"><i class="bx bx-edit mb-1"></i> Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bx bx-trash mb-1"></i> Delete</button>
              </form>
              <form action="{{ route('datphongs.thanhtoan',$datphong->id) }}" method="Post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $datphong->id }}">
                <button type="submit" class="btn btn-warning"><i class="bx bx-coin mb-1"></i> Thanh toán</button>
              </form>
              @else
                @can('role-edit')
                <form action="{{ route('datphongs.chinhthanhtoan',$datphong->id) }}" method="Post">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{ $datphong->id }}">
                  <button type="submit" class="btn btn-warning"><i class="bx bx-coin mb-1"></i> Chỉnh sửa thanh toán</button>
                </form>
                <form action="generate-invoice-pdf" method="get">
                  @csrf
                  <input type="hidden" name="id" value="{{ $datphong->id }}">
                  <button type="submit" class="btn btn-info"><i class="bx bx-spreadsheet mb-1"></i> In hoá đơn</button>
                </form>
                @endcan
              @endif  
              <br>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
              {!! $datphongs->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection