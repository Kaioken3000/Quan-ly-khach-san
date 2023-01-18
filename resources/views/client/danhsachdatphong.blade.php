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
              <th>Số luọng</th>
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
                {{ $phongmax->datphongid }}
              </td>
              <td>
                <?php
                $danhsachdatphongs = App\Models\Danhsachdatphong::where("datphongid", $datphong->datphongid)->get();
                ?>
                <!-- Button trigger modal -->
                <button type="button" class="badge bg-info border-info" data-toggle="modal" data-target="#LichsuModal{{ $datphong->datphongid }}">
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
                    <button class="w-100 btn btn-primary" type="submit"><i class="bx bx-key mb-1"></i> Đổi phòng</button>
                  </form>

                  <!-- Xoá -->
                  @if($datphong->tinhtrangnhanphong == 0)
                  <div class="m-1">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#basicModal{{ $datphong->datphongid }}">
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
                  @endif
                </div>

                <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
                @else
                <form action="/generate-invoice-pdf" method="get">
                  @csrf
                  <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                  <button type="submit" class="w-100 btn btn-info"><i class="bx bx-spreadsheet mb-1"></i> Xem hoá đơn</button>
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
  </section>

  <!-- Footer -->
  @include('client.layouts.footer')

  <!-- Script -->
  @include('client.layouts.script')

</body>

</html>