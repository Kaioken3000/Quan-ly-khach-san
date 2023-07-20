@extends('layouts3.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('khachhangs.index') }}"><i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Khách hàng/</span> Create</h4>
  @if(session('status'))
  <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
  </div>
  @endif
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card-box">
        <div class="card-header">
          <h5 class="mb-0">From nhập liệu</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('khachhangs.store') }}" method="POST" class="row" id="payment-form">
            @csrf
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="ten">Họ tên</label>
                <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Lý Nhựt Nam" />
                @error('ten')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="sdt">Số điện thoại</label>
                <input type="text" name="sdt" class="form-control" id="sdt" placeholder="VD: 0123456789" />
                @error('sdt')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="example@mail.com" />
                @error('email')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label class="form-label" for="diachi">Địa chỉ</label>
                <input type="diachi" name="diachi" class="form-control" id="diachi"
                  placeholder="VD: Q.Ninh Kiều, TP.Cần Thơ" />
                @error('diachi')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="gioitinh">Giới tính</label> <br>
                <input class="form-check-input" type="radio" name="gioitinh" id="gioitinnam" checked value="nam">
                <label class="form-check-label" for="gioitinhnam">
                  Nam
                </label>
                <input class="form-check-input" type="radio" name="gioitinh" id="gioitinhnu" value="nu">
                <label class="form-check-label" for="gioitinhnu">
                  Nữ
                </label>
                @error('gioitinh')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="vanbang">Số CMND hoặc Passport (hoặc các văn bằng khác có hình).</label>
                <input type="vanbang" name="vanbang" class="form-control" id="vanbang"
                  placeholder="VD: 01234567891000" />
                @error('vanbang')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>
            {{-- <div class="mb-3">
              <label class="form-label" for="datcoc">Chọn hình thức đặt cọc:</label> <br>
              <input class="form-check-input tructiep" type="radio" name="datcoc" id="tructiep" checked value="tructiep"
                onchange="doitructiep_chuyenkhoan()">
              <label class="form-check-label" for="tructiep">
                Trực tiếp
              </label>
              <input class="form-check-input chuyenkhoan" type="radio" name="datcoc" id="chuyenkhoan"
                value="chuyenkhoan" onchange="doitructiep_chuyenkhoan()">
              <label class="form-check-label" for="chuyenkhoan">
                Chuyển khoản
              </label>
            </div> --}}
            <div class="col-6" name="nhapsotien">
              <div class="mb-3">
                <label class="form-label" for="tiendatcoc">Số tiền (Tiền đặt cọc bằng 50% số tiền loại phòng)</label>
                @foreach($phongs as $phong)
                @if($phong->so_phong == (int)$request['phongid'])
                <input type="text" name="tiendatcoc" class="form-control" id="tiendatcoc" placeholder="VD: 300"
                  value="{{$phong->loaiphongs->gia/2}}" readonly />
                @endif
                @endforeach
                @error('tiendatcoc')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>
            {{-- <div class="col-6" name="nhapchuyenkhoan">
              <div class="mb-3">
                <label class="form-label" for="tienchuyenkhoan">Nhập thông tin chuyển khoản</label>
                <label class="form-label" for="tienchuyenkhoan">(Tiền đặt cọc bằng 50% số tiền loại phòng)</label>
                <div class="row">
                  <div class="card-box p-2">
                    <script src="https://js.stripe.com/v3/"></script>

                    <div class="form-row" id="card_stripe">
                      <label for="card-element">
                        Credit or debit card
                      </label>
                      <div id="card-element">
                        
                      </div>

                      <div id="card-errors" role="alert"></div>
                    </div>
                    <br>
                    <script src="/adminresource/js/tructiep_chuyenkhoan.js"></script>
                    <script>
                    </script>
                  </div>
                </div>
              </div>
            </div> --}}
            <input type="hidden" name="ngaydat" id="ngaydat" value="{{ $request->ngaydat }}" />
            <input type="hidden" name="ngaytra" id="ngaytra" value="{{ $request->ngaytra }}" />
            <input type="hidden" name="soluong" id="soluong" value="{{ $request->soluong }}" />
            <input type="hidden" name="phongid" value="{{$request->phongid}}">
            <input type="hidden" name="tinhtrangthanhtoan" value=0>
            <input type="hidden" name="tinhtrangnhanphong" value=0>
            <input type="hidden" name="loaitien" value="datcoc">
            <input type="hidden" name="hinhthucthanhtoan" value="tructiep">
            <div class="d-flex align-items-center mt-3">
              <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/adminresource/js/tructiep_chuyenkhoan.js"></script>
<script>
  doitructiep_chuyenkhoan()
</script>
@endsection