<div class="my-1 col-4 mr-4">
    <button type="button" class="btn btn-warning" style="width: 140px" data-toggle="modal" data-target="#modalthanhtoan{{ $datphong->datphongid }}">
        <i class="fa fa-dollar mb-1"></i> Thanh toán &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
    </button>
</div>
<!-- Modal thanh toán -->
<div class="modal fade" id="modalthanhtoan{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-1 payment-form" action="{{ route('datphongs.thanhtoan',$datphong->datphongid) }}" method="Post" id="">
                    @csrf
                    @method('PUT')
                    <?php
                      $i=0;
                      $tonggia = 0;
                      $ngayhomnay = date("Y-m-d");
                      if(count($danhsachdatphongs)!=1){
                        foreach($danhsachdatphongs as $danhsachdatphong){
                          $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                          $ngayketthuc = $danhsachdatphong->ngayketthuco;
                          $songay1 = abs(round((strtotime($ngayketthuc) - strtotime($ngaybatdau)) / 86400));
                          $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                          if($i==0){
                            $tonggia+=($danhsachdatphong->phongs->loaiphongs->gia)*($songay1);
                          } else if($i!=(count($danhsachdatphongs)-1)) {
                            $tonggia+=($danhsachdatphong->phongs->loaiphongs->gia)*($songay1);
                          } else {
                            $tonggia+=($danhsachdatphong->phongs->loaiphongs->gia)*($songay2);
                          }
                          echo '
                          <p class="form-label">'
                            .$danhsachdatphong->phongid.
                            "-"
                            .$danhsachdatphong->phongs->loaiphongs->ten.
                            "-"
                            .$danhsachdatphong->phongs->loaiphongs->gia.
                            '</p>';

                          echo '<p class="form-label"> Ngày bắt đầu ở: '
                            .$danhsachdatphong->ngaybatdauo.
                            '</p>';

                          echo '<p class="form-label"> Ngày kết thúc ở: '
                            .$danhsachdatphong->ngayketthuco.
                            '</p>';

                          if($i == count($danhsachdatphongs)-1){
                            echo '<p class="form-label"> Ngày kết thúc ở thực tế: '
                              .$ngayhomnay.
                              '</p>';
                          }

                          if($i!=(count($danhsachdatphongs)-1) || $i==0) {
                            echo '<p class="form-label"> Số ngày ở: '
                              .$songay1.
                              '</p>';
                          } else {
                          echo '<p class="form-label"> Số ngày ở: '
                            .$songay2.
                            '</p>';
                          }

                          echo '
                          <p type="text" class="badge badge-primary" />'.$tonggia.'</p><br>';
                          $i++;
                        }
                      } else {
                        foreach($danhsachdatphongs as $danhsachdatphong){
                          $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                          $ngayketthuc = $danhsachdatphong->ngayketthuco;
                          $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                          $tonggia+=($danhsachdatphong->phongs->loaiphongs->gia)*($songay2);
                          echo '
                          <p class="form-label">'
                            .$danhsachdatphong->phongid.
                            "-"
                            .$danhsachdatphong->phongs->loaiphongs->ten.
                            "-"
                            .$danhsachdatphong->phongs->loaiphongs->gia.
                            '</p>';

                          echo '<p class="form-label"> Ngày bắt đầu ở: '
                            .$danhsachdatphong->ngaybatdauo.
                            '</p>';

                          echo '<p class="form-label"> Ngày kết thúc ở: '
                            .$danhsachdatphong->ngayketthuco.
                            '</p>';

                          echo '<p class="form-label"> Số ngày ở: '
                            .$songay2.
                            '</p>';

                          echo '
                          <p type="text" class="badge badge-primary" />'.$tonggia.'</p><br>';
                        }
                      }
                    ?>
                    {{-- Truc tiep --}}
                    <div class="mb-3 mt-3">
                        <?php 
                          $tiendatcoc = App\Models\Thanhtoan::where("khachhangid", $datphong->id)
                          ->where("loaitien", "datcoc")
                          ->first();
                          ?>
                        <label class="form-label" for="tongsotien">Tổng số tiền</label>
                        <input type="text" name="tongsotien" class="form-control" id="tongsotien" placeholder="VD: 300" value="{{$tonggia}}" readonly />
                        @error('tongsotien')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror

                        {{-- tien dat coc --}}
                        @if($tiendatcoc)
                        <label class="form-label" for="tiendatcoc">Trừ số tiền đặt cọc</label>
                        <input type="text" name="tiendatcoc" class="form-control" id="tiendatcoc" placeholder="VD: 300" value="{{$tiendatcoc->gia}}" readonly />
                        @endif
                        <hr>
                        {{-- tien dich vu --}}
                        <label class="form-label" for="tiencacdichvu">Cộng số tiền dịch vụ</label>
                        <br>
                        <?php $tongtiendv = 0;?>

                        @if($dichvudatphongs)
                        @foreach($dichvudatphongs as $dichvudatphong)
                        @if($dichvudatphong)

                        <?php $tongtiendv += $dichvudatphong->dichvus->giatien;?>

                        <label class="form-label" for="tiendichvu">{{$dichvudatphong->dichvus->ten}}</label>
                        <input type="text" name="tiendichvu" class="form-control" id="tiendichvu" placeholder="VD: 300" value="{{$dichvudatphong->dichvus->giatien}}" readonly />
                        @endif
                        @endforeach
                        @endif

                        <label class="form-label" for="tongtiendichvu">Tổng số tiền dịch vụ</label>
                        <input type="text" name="tongtiendichvu" class="form-control" id="tongtiendichvu" placeholder="VD: 300" value="{{$tongtiendv}}" readonly />
                        <hr>

                        {{-- tien tru sau dat coc --}}
                        @if($tiendatcoc)
                        <?php $tongtien = $tonggia - $tiendatcoc->gia + $tongtiendv ?>
                        @else
                        <?php $tongtien = $tonggia + $tongtiendv ?>
                        @endif
                        <label class="form-label" for="sotien">Tổng giá</label>
                        <input type="text" name="sotien" class="form-control" id="sotien" placeholder="VD: 300" value="{{$tongtien}}" readonly />
                        @error('sotien')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror

                    </div>
                    <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                    <input type="hidden" name="khachhang_id" value="{{$datphong->id}}">
                    <input type="hidden" name="loaitien" value="traphong">
                    <input type="hidden" name="hinhthucthanhtoan" value="tructiep">

                    {{-- btn xac nhan, cancel --}}
                    <div class="d-flex bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <button type="submit" class="w-100 btn btn-warning"> Trực tiếp</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            {{-- Thanh toan vnpay --}}
                            <a href="/thanhtoanvnpayview/{{ $datphong->datphongid }}/traphong/{{$datphong->id}}/{{$tongtien}}">
                                <img src="https://www.msb.com.vn/documents/20121/273143/VnPay_Topbanner1600x400px.png/ffc9c0b4-617a-2cb0-2f5c-d8e6e6dd5bab?t=1657103705929" width="150px" class="shadow-sm">
                            </a>
                        </div>
                        <div class="ml-auto p-2 bd-highlight">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                Hủy
                            </button>
                        </div>
                    </div>
                    {{-- KT btn xac nhan, cancel --}}
                </form>
            </div>
        </div>
    </div>
</div>