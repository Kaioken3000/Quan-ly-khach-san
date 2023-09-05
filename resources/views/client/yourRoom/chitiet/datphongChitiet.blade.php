<section class="section mt-3">
    <div id="exTab1" class="mx-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#1a" data-toggle="tab">Thông Tin Phòng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#2a" data-toggle="tab">Lịch sử phòng ở</a>
            </li>
        </ul>

        <div class="tab-content clearfix">
            <div class="tab-pane active mb-3" id="1a">
                <div class="row my-3">
                    <div class="col-sm-6 col-md-4 col-lg-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Thông tin đặt phòng</h4>
                                <input type="checkbox" name="" id="toggleView" checked hidden />
                                @include('client.yourRoom.chitiet.yourRoomDetailTable')
                            </div>
                        </div>
                    </div>
                    <?php
                    $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $request->datphongid)->get();
                    $nhanphongs = App\Models\Nhanphong::where('datphongid', $request->datphongid)->get();
                    $traphongs = App\Models\Traphong::where('datphongid', $request->datphongid)->get();
                    $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $request->datphongid)->get();
                    $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $request->datphongid)->get();
                    $thanhtoans = App\Models\Thanhtoan::where('datphongid', $request->datphongid)->get();
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách các phòng đã và đang ở</h4>
                                @foreach ($danhsachdatphongs as $danhsachdatphong)
                                    <p class="card-text"><b>Phòng:</b> {{ $danhsachdatphong->phongid }}</p>
                                    <p class="card-text"><b>Loại phòng</b>: {{ $danhsachdatphong->phongs->loaiphongs->ten }}
                                    </p>
                                    <p class="card-text"><b>Giá phòng</b>: {{ $danhsachdatphong->phongs->loaiphongs->gia }} VND
                                    </p>
                                    <p class="card-text"><b>Ngày bắt đầu ở: </b>  {{ $danhsachdatphong->ngaybatdauo }}</p>
                                    <p class="card-text"><b>Ngày kết thúc ở:</b>  {{ $danhsachdatphong->ngayketthuco }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane mb-3" id="2a">
                @include('client.yourRoom.chitiet.yourRoomDetailHistory')
            </div>
        </div>
    </div>

    {{-- Table to list --}}
    <link rel="stylesheet" href="/tableToList/style.css" type="text/css">

    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        .nav-item a {
            color: black
        }
    </style>
</section>
