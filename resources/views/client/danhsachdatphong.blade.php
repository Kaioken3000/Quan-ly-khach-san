<!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

  @include('client.layouts.header')
  <!-- END head -->

  <!-- Session -->
  @include('client.layouts.session')

  <!-- Book -->
  @include('client.layouts.book')
  <section class="section">
    <div class="container">
      <div class="table-responsive text-nowrap">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table">
          <thead>
            <tr class="thead-dark">
              <th>id</th>
              <th>Ngày đặt</th>
              <th>Ngày trả</th>
              <th>Số lượng</th>
              <th colspan="2">Phòng hiện tại</th>
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
                $nhanphongs = App\Models\Nhanphong::where("datphongid", $datphong->datphongid)->get();
                $traphongs = App\Models\Traphong::where("datphongid", $datphong->datphongid)->get();
                $dichvudatphongs = App\Models\DichvuDatphong::where("datphongid", $datphong->datphongid)->get();
                $thanhtoans = App\Models\Thanhtoan::where("khachhangid", $datphong->id)->get();
                ?>
                <!-- Button trigger modal -->
                <button type="button" class="badge bg-info border-info" data-toggle="modal"
                  data-target="#LichsuModal{{ $datphong->datphongid }}">
                  Lịch sử
                </button>

                <!-- Modal -->
                <div class="modal fade" id="LichsuModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Lịch sử đặt phòng</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        @foreach($danhsachdatphongs as $danhsachdatphong)
                        <p>Phòng: {{ $danhsachdatphong->phongid }} - {{ $danhsachdatphong->phongs->loaiphongs->ten }} -
                          {{ $danhsachdatphong->phongs->loaiphongs->gia }}</p>
                        <p>Ngày bắt đầu ở: {{ $danhsachdatphong->ngaybatdauo }}</p>
                        <p>Ngày kết thúc ở: {{ $danhsachdatphong->ngayketthuco }}</p>
                        <p>Khách hàng: <b>{{ $datphong->ten }}</b></p>
                        @foreach ($thanhtoans as $thanhtoan)
                        @if ($thanhtoan->loaitien == 'traphong')
                        <p>Tiền trả phòng: <b>{{$thanhtoan->gia}} VND</b></p>
                        @else
                        <p>Tiền đặt cọc: <b>{{$thanhtoan->gia}} VND</b></p>
                        @endif
                        @endforeach
                        @endforeach

                        @if(count($nhanphongs)>0)
                        <b class="font-weight-bold">Nhận phòng</b>
                        @foreach($nhanphongs as $nhanphong)
                        <p>Họ tên người nhận: <b>{{ $nhanphong->ten }}</b></p>
                        <p>Thời gian nhận: <b>{{ $nhanphong->created_at }}</b></p>
                        @endforeach
                        @endif
                        <br>

                        @if(count($traphongs)>0)
                        <b class="font-weight-bold">Trả phòng</b>
                        @foreach($traphongs as $traphong)
                        <p>Số trả phòng: {{ $traphong->so }}</p>
                        <p>Họ tên người trả phòng: {{ $traphong->ten }}</p>
                        <p>Thời gian trả phòng: {{ $traphong->created_at }}</p>
                        @endforeach
                        @endif
                        <br>

                        @if(count($dichvudatphongs)>0)
                        <b class="font-weight-bold">Dịch vụ sử dụng</b>
                        @foreach($dichvudatphongs as $dichvudatphong)
                        <p>{{ $dichvudatphong->dichvus->ten }}: <b>{{ $dichvudatphong->dichvus->giatien }} {{
                            $dichvudatphong->dichvus->donvi }}</b></p>
                        @endforeach
                        @endif
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
              </td>
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
                  <form class="m-1" action="hiendoiphongclient" method="get">
                    <input type="hidden" name="datphongid" value="{{ $datphong->datphongid }}">
                    <button class="w-100 btn btn-primary" type="submit"><i class="bx bx-key mb-1"></i> Đổi
                      phòng</button>
                  </form>

                  <!-- Xoá -->
                  @if($datphong->tinhtrangnhanphong == 0)
                  <div class="m-1">
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#basicModal{{ $datphong->datphongid }}">
                      Xoá
                    </button>
                  </div>
                  <!-- Modal xoá phòng -->
                  <div class="modal fade" id="basicModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="d-flex gap-1">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                              No
                            </button>
                            <form action="{{ route('client.xoadatphong',$datphong->datphongid) }}" method="Post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger"> Yes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  @else
                  <!-- Dịch vụ -->
                  <div class="m-1">
                    <button type="button" class="w-100 btn btn-success" data-toggle="modal"
                      data-target="#modaldichvu{{ $datphong->datphongid }}">
                      <i class="bx bx-box mb-1"></i> Dịch vụ
                    </button>
                  </div>
                  <!-- Modal dịch vụ -->
                  <div class="modal fade" id="modaldichvu{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel1">Chọn dịch vụ</h5>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('client.dichvu_satphong_store') }}" method="POST">
                            @csrf
                            <input hidden type="text" value="{{$datphong->datphongid}}" id="datphongid"
                              name="datphongid">
                            <div class="mb-3">
                              <label class="form-label" for="ten">Dịch vụ</label><br>
                              @foreach($dichvus as $dichvu)
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="dichvu{{$dichvu->id}}"
                                  name="dichvuid[]" value="{{$dichvu->id}}">
                                <label class="form-check-label" for="dichvu{{$dichvu->id}}">
                                  {{$dichvu->ten}}:
                                </label>
                                <label class="form-check-label" for="dichvu{{$dichvu->id}}">
                                  {{$dichvu->giatien}} {{$dichvu->donvi}}
                                </label>
                              </div>
                              @endforeach
                              @error('ten')
                              <div class="alert alert-danger" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                            Cancel
                          </button>
                          <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  @endif
                </div>

                <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
                @else
                <form action="/generate-invoice-pdf" method="get">
                  @csrf
                  <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                  <button type="submit" class="w-100 btn btn-info"><i class="bx bx-spreadsheet mb-1"></i> Xem hoá
                    đơn</button>
                </form>
                @endif

                {{-- Đặt cọc --}}
                <a href="/client/thanhtoanvnpayview/{{ $datphong->datphongid }}/datcoc/{{$datphong->id}}/{{ $danhsachdatphong->phongs->loaiphongs->gia/2 }}"
                  class="btn btn-success">Đặt cọc online</a>
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
  </section>

  <!-- Footer -->
  @include('client.layouts.footer')

  <!-- Script -->
  @include('client.layouts.script')

</body>

</html>