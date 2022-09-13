@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-right mb-2 row">
        <div class="col-4 mb-3">
          <label class="form-label" for="ngaydat">Ngày vào</label>
          <input disabled type="date" name="ngaydat" class="form-control" id="ngaydat" placeholder="VD: Lý Nhựt Nam" value="{{ $request->ngaydat }}" />
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="ngaytra">Ngày ra</label>
          <input disabled type="date" name="ngaytra" class="form-control" id="ngaytra" placeholder="VD: Lý Nhựt Nam" value="{{ $request->ngaytra }}" />
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="soluong">Số lượng</label>
          <input disabled type="number" name="soluong" class="form-control" id="soluong" placeholder="VD: 001" value="{{ $request->soluong }}" />
        </div>
        <input disabled type="hidden" name="khachhangid" value="{{$request->khachhangid}}">
        <div class="d-flex gap-1">
          @foreach($loaiphongs as $loaiphong)
          <button type="button" value="{{ $loaiphong->ten }}" class="m-3 btn btn-primary" id="myInput{{$loaiphong->ma}}" onclick="myFunction( '{{ $loaiphong->ma }}' )">
          {{ $loaiphong->ten }}
          </button>
          @endforeach
          <script>
            function myFunction(ma) {
              input = document.getElementById("myInput"+ma);

              // Declare variables
              var input, filter, table, tr, td, i, txtValue;
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");

              // Loop through all table rows, and hide those who don't match the search query
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              }
            }
          </script>
        </div>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card">
    <h5 class="card-header">Quản lý phòng</h5>
    <div class="table-responsive text-nowrap">
      <table class="table" id="myTable">
        <thead>
          <tr class="thead-dark">
            <th>Số phòng</th>
            <th>Loại phòng</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($phongs as $phong)
          <tr>
            <td>{{ $phong->so_phong }}</td>
            @foreach ($loaiphongs as $loaiphong)
              @if($loaiphong->ma == $phong->loaiphongid)
              <td>{{ $loaiphong->ten }}</td>
              @endif
            @endforeach
            <td>
              <form action="{{ route('khachhangs.create') }}" method="get">
                <input type="hidden" name="ngaydat" id="ngaydat" value="{{ $request->ngaydat }}" />
                <input type="hidden" name="ngaytra" id="ngaytra" value="{{ $request->ngaytra }}" />
                <input type="hidden" name="soluong" id="soluong" value="{{ $request->soluong }}" />
                <input type="hidden" name="phongid" value="{{$phong->so_phong}}">
                <input type="hidden" name="tinhtrangthanhtoan" value=0>
                <input type="hidden" name="tinhtrangnhanphong" value=0>
                <button type="submit" class="btn btn-success"><i class="bx bx-plus mb-1"></i> Đặt phòng</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  
</div>
@endsection