@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Đặt phòng /</span> Quản lý</h4>

  <div class="d-flex align-items-end my-2 ">
    <div class="me-auto">
      <a class="btn btn-success" href="{{ route('datphongs.create') }}"><i class="bx bx-plus mb-1"></i> Đặt phòng</a>
    </div>

    <!-- Option 1 -->
    <div class="card">
      <div class="card-body">
        <label class="form-check-label">
          Thanh toán
        </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="thanhtoan" id="dathanhtoan" onchange="changeoption()">
          <label class="form-check-label" for="dathanhtoan">
            Đã thanh toán
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="thanhtoan" id="chuathanhtoan" onchange="changeoption()">
          <label class="form-check-label" for="chuathanhtoan">
            Chưa thanh toán
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="thanhtoan" id="tatcathanhtoan"  onchange="changeoption()">
          <label class="form-check-label" for="tatcathanhtoan">
            Tất cả
          </label>
        </div>
      </div>
    </div>
    <!-- end option1 -->

    <!-- Option 2 -->
    <div class="card mx-2">
      <div class="card-body">
        <label class="form-check-label">
          Nhận phòng
        </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="nhanphong" id="danhanphong" onchange="changeoption()">
          <label class="form-check-label" for="danhanphong">
            Đã nhận phòng
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="nhanphong" id="chuanhanphong" onchange="changeoption()">
          <label class="form-check-label" for="chuanhanphong">
            Chưa nhận phòng
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="nhanphong" id="tatcanhanphong"  onchange="changeoption()">
          <label class="form-check-label" for="tatcanhanphong">
            Tất cả
          </label>
        </div>
      </div>
    </div>
    <!-- end option2 -->


  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card">
    <h5 class="card-header">Quản lý phòng</h5>
    <div class="table-responsive text-nowrap">
      <table class="table" id="datphongtable">
        <thead>
          <tr class="thead-dark">
            <th>id</th>
            <th>Ngày đặt</th>
            <th>Ngày trả</th>
            <th>Số luọng</th>
            <th colspan="2">Phòng hiện tại</th>
            <th>Khách hàng</th>
            <th>Thanh toán</th>
            <th>Nhận phòng</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datphongs as $datphong)
          <tr>
            <td>{{ $datphong->datphongid }}</td>
            <td>{{ $datphong->ngaydat }}</td>
            <td>{{ $datphong->ngaytra }}</td>
            <td>{{ $datphong->soluong }}</td>
            <td>
              <?php
              $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphong->datphongid)->orderBy('id', 'desc')->first();
              ?>
              {{ $phongmax->phongid }}
            </td>
            <td>
              <?php
              $danhsachdatphongs = App\Models\Danhsachdatphong::where("datphongid", $datphong->datphongid)->get();
              ?>
              <!-- Button trigger modal -->
              <button type="button" class="badge bg-info border-info" data-bs-toggle="modal" data-bs-target="#LichsuModal{{ $datphong->datphongid }}">
                Lịch sử
              </button>

              <!-- Modal -->
              <div class="modal fade" id="LichsuModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Lịch sử đặt phòng</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      @foreach($danhsachdatphongs as $danhsachdatphong)
                      <p>Phòng: {{ $danhsachdatphong->phongid }}</p>
                      <p>Ngày bắt đầu ở: {{ $danhsachdatphong->ngaybatdauo }}</p>
                      <p>Ngày kết thúc ở: {{ $danhsachdatphong->ngayketthuco }}</p>
                      @endforeach
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>{{ $datphong->ten }}</td>
            <td>
              <label class="badge {{ ($datphong->tinhtrangthanhtoan == 0) ? 'bg-danger' : 'bg-success' }}">
                {{ ($datphong->tinhtrangthanhtoan == 0) ? 'Chưa' : 'Xác nhận' }}
              </label>
            </td>
            <td>
              <label class="badge {{ ($datphong->tinhtrangnhanphong == 0) ? 'bg-danger' : 'bg-success' }}">
                {{ ($datphong->tinhtrangnhanphong == 0) ? 'Chưa' : 'Xác nhận' }}
              </label>
            </td>
            <!-- Action -->
            <td>

              <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
              @if($datphong->tinhtrangthanhtoan == 0)
              <div class="d-flex">

                <!-- Đổi phòng -->
                <form class="m-1" action="/datphongs-kiemtra-capnhat" method="get">
                  <input type="hidden" name="datphongid" value="{{ $datphong->datphongid }}">
                  <button class="w-100 btn btn-primary" type="submit"><i class="bx bx-key mb-1"></i> Đổi phòng</button>
                </form>

                <!-- Xoá -->
                @if($datphong->tinhtrangnhanphong == 0)
                <div class="m-1">
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal{{ $datphong->datphongid }}">
                    <i class="bx bx-trash mb-1"></i>
                  </button>
                </div>
                <!-- Modal xoá phòng -->
                <div class="modal fade" id="basicModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="d-flex gap-1">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            No
                          </button>
                          <form action="{{ route('datphongs.destroy',$datphong->datphongid) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Yes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
              </div>


              <!-- Thanh toán -->
              <div class="m-1">
                <button type="button" class="w-100 btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalthanhtoan{{ $datphong->datphongid }}">
                  <i class="bx bx-coin mb-1"></i> Thanh toán
                </button>
              </div>
              <!-- Modal thanh toán -->
              <div class="modal fade" id="modalthanhtoan{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn thanh toán</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex gap-1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          No
                        </button>
                        <form class="m-1" action="{{ route('datphongs.thanhtoan',$datphong->datphongid) }}" method="Post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                          <button type="submit" class="w-100 btn btn-warning"> Yes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Nhận phòng, sửa nhận phòng -->
              @hasrole('Admin')
              <div class="m-1">
                <button type="button" class="w-100 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#nhanphong{{ $datphong->datphongid }}">
                  <i class="bx bx-hotel mb-1">
                    {{ ($datphong->tinhtrangnhanphong == 0) ? ' Nhận phòng' : ' Sửa nhận phòng' }}
                  </i>
                </button>
              </div>
              @else
              @if($datphong->tinhtrangnhanphong == 0)
              <div class="m-1">
                <button type="button" class="w-100 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#nhanphong{{ $datphong->datphongid }}">
                  <i class="bx bx-hotel mb-1">
                    Nhận phòng
                  </i>
                </button>
              </div>
              @endif
              @endhasrole
              <!-- Modal nhan phòng -->
              <div class="modal fade" id="nhanphong{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1"> Xác nhận</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex gap-1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          No
                        </button>
                        <form class="m-1" action="{{ route('datphongs.nhanphong',$datphong->datphongid) }}" method="Post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                          <button type="submit" class="w-100 btn btn-secondary">Yes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
              @else
              @can('role-edit')
              <form class="mb-1" action="{{ route('datphongs.chinhthanhtoan',$datphong->datphongid) }}" method="Post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                <button type="submit" class="w-100 btn btn-warning"><i class="bx bx-coin mb-1"></i> Sửa thanh toán</button>
              </form>
              @endcan
              <form action="generate-invoice-pdf" method="get">
                @csrf
                <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
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
<script src="/adminresource/js/optiondatphong.js"></script>
@endsection