@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Báo cáo</h4>
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
            <th colspan="2">Phòng hiện tại</th>
            <th>Khách hàng</th>
            <th>Thanh toán</th>
            <th>Hoá đơn</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datphongs as $datphong)
          <tr>
            <td>{{ $datphong->id }}</td>
            <td>{{ $datphong->ngaydat }}</td>
            <td>{{ $datphong->ngaytra }}</td>
            <td>{{ $datphong->soluong }}</td>
            <td>
              <?php
              $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)->orderBy('id', 'desc')->first();
              ?>
              {{ $phongmax->phongid }}
            </td>
            <td>
              <form action="{{ route('danhsachdatphongs.index') }}" method="get">
                <input type="hidden" name="datphongid" value="{{ $datphong->id }}">
                <button class="badge bg-info border-info" type="submit"> Lịch sử</button>
              </form>
            </td>
            <td>{{ $datphong->khachhangid }}</td>
            <td>
              <label class="badge {{ ($datphong->tinhtrangthanhtoan == 0) ? 'bg-danger' : 'bg-success' }}">
                {{ ($datphong->tinhtrangthanhtoan == 0) ? 'Chưa' : 'Xác nhận' }}
              </label>
            </td>
            <td>
            <form action="generate-invoice-pdf" method="get">
                @csrf
                <input type="hidden" name="id" value="{{ $datphong->id }}">
                <button type="submit" class="w-100 btn btn-info"><i class="bx bx-spreadsheet mb-1"></i> Xem hoá đơn</button>
              </form>
            </td>
            <td>
            <?php 
            $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid',$datphong->id)->get();
            $tonggia=0;
            foreach($danhsachdatphongs as $danhsachdatphong){
                //tim phong va loai phong
                $phong = App\Models\Phong::find($danhsachdatphong->phongid);
                $loaiphong = App\Models\Loaiphong::find($phong->loaiphongid);
    
                //tinh gia tien
                $songay = strtotime($danhsachdatphong->ngayketthuco) - strtotime($danhsachdatphong->ngaybatdauo);
                $songay = abs(round($songay / 86400));
                $tonggia += $songay*$loaiphong->gia*$datphong->soluong;
            }
            ?>
            {{$tonggia}} VND
            </td>
          </tr>
          @endforeach
          <tr class="text-end">
              <td colspan="10">
                <p>Tổng cộng: {{ $tonggiatatca }} VND</p>
              </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection