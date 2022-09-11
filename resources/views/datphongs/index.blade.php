@extends('layouts.app')
<style>
  td:nth-child(1) {
    width: 5px;
  }
</style>
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Đặt phòng /</span> Quản lý</h4>
  <a class="btn btn-success mb-4" href="{{ route('datphongs.create') }}"><i class="bx bx-plus mb-1"></i> Đặt phòng</a>
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
            <th>Nhận phòng</th>
            <th>Action</th>
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
            <td>
              <label class="badge {{ ($datphong->tinhtrangnhanphong == 0) ? 'bg-warning' : 'bg-success' }}">
                {{ ($datphong->tinhtrangnhanphong == 0) ? 'Chưa' : 'Rồi' }}
              </label>
            </td>
            <!-- Action -->
            <td class="d-block">

              <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
              @if($datphong->tinhtrangthanhtoan == 0)
              <form class="mb-1" action="{{ route('datphongs.destroy',$datphong->id) }}" method="Post">
                <a class=" btn btn-primary" href="{{ route('datphongs.edit',$datphong->id) }}"><i class="bx bx-edit mb-1"></i> </a>
                @csrf
                @method('DELETE')
                <button type="submit" class=" btn btn-danger"><i class="bx bx-trash mb-1"></i> </button>
              </form>
              <form class="mb-1" action="{{ route('datphongs.thanhtoan',$datphong->id) }}" method="Post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $datphong->id }}">
                <button type="submit" class="w-100 btn btn-warning"><i class="bx bx-coin mb-1"></i> Thanh toán</button>
              </form>
              <form class="mb-1" action="{{ route('datphongs.nhanphong',$datphong->id) }}" method="Post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $datphong->id }}">
                <button type="submit" class="w-100 btn btn-secondary"><i class="bx bx-hotel mb-1"></i>
                  {{ ($datphong->tinhtrangnhanphong == 0) ? ' Nhận phòng' : ' Sửa nhận phòng' }}</button>
              </form>

              <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
              @else
              @can('role-edit')
              <form class="mb-1" action="{{ route('datphongs.chinhthanhtoan',$datphong->id) }}" method="Post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $datphong->id }}">
                <button type="submit" class="w-100 btn btn-warning"><i class="bx bx-coin mb-1"></i> Sửa thanh toán</button>
              </form>
              @endcan
              <form action="generate-invoice-pdf" method="get">
                @csrf
                <input type="hidden" name="id" value="{{ $datphong->id }}">
                <button type="submit" class="w-100 btn btn-info"><i class="bx bx-spreadsheet mb-1"></i> In hoá đơn</button>
              </form>
              @endif
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