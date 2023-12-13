@include('client.layouts2.breadcrumb', ['titlePage' => 'Tất cả phòng'])
<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        @include('client.layouts2.searchBar')
        <div class="row list-wrapper">
            {{-- Room list start --}}
            @foreach ($phongs as $phong)
                <?php $datphongs = App\Models\Datphong::get();
                $check = 0;
                $ngayvaodadat = '';
                $ngayradadat = '';
                $today = date('Y-m-d');
                $xacnhan = 0;
                if (count($phong->datphongs) > 0) {
                    if ($phong->datphongs->last()->phongs->last()->so_phong == $phong->so_phong && $phong->datphongs->last()->tinhtrangthanhtoan == 0
                     && $phong->datphongs->last()->huydatphong == 0) {
                        $xacnhan++;
                    }
                }
                foreach ($datphongs as $datphong) {
                    $danhsachdatphong = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)
                        ->latest()
                        ->first();
                    if ($danhsachdatphong->phongid == $phong->so_phong && $datphong->huydatphong == 0) {
                        if ($danhsachdatphong->ngayketthuco > $today) {
                            $check++;
                            $ngayvaodadat = $danhsachdatphong->ngaybatdauo;
                            $ngayradadat = $danhsachdatphong->ngayketthuco;
                            break;
                        }
                    }
                }
                ?>
                <div class="col-lg-4 col-md-6 list-item">
                    <div class="room-item">
                        <img src="/client/images/{{ $phong->hinhs[0]->vitri }}" alt="">
                        <div class="ri-text">
                            <h4>{{ $phong->loaiphongs->ten }} - {{ $phong->so_phong }}</h4>
                            <h3>{{ $phong->loaiphongs->gia }}VND<span>/Đêm</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Loại phòng:</td>
                                        <td>{{ $phong->loaiphongs->ten }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Tối đa:</td>
                                        <td>{{ $phong->loaiphongs->soluong }} người ở</td>
                                    </tr>
                                    <tr>
                                        <td class="r-0">Thiết bị:</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                @foreach ($phong->thietbiphongs as $thietbiphong)
                                                    <?php $thietbi = App\Models\Thietbi::where('id', $thietbiphong->thietbiid)->first();
                                                    ?>
                                                    {{ $thietbi->ten }},
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Giường:</td>
                                        <td>
                                            @foreach ($phong->giuongs as $giuong)
                                                {{ $giuong->ten }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chi nhánh:</td>
                                        <td>
                                            {{ $phong->chinhanhs->ten }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- @else --}}
                            
                            @if ($xacnhan != 0)
                                <div class="d-flex">
                                    <p class="mb-0">Khách hàng vẫn chưa rời phòng&nbsp;</p>
                                </div>
                            @endif
                            @if ($check != 0)
                                <div class="d-flex">
                                    <p class="mb-0"> Phòng đã được đặt: &nbsp;</p>
                                    <div class="me-0">
                                        <p class="mb-0"> Từ: {{ $ngayvaodadat }}</p>
                                        <p class="mb-0"> đến: {{ $ngayradadat }}</p>
                                    </div>
                                </div>
                            @endif
                            {{-- @endif --}}
                            {{-- @if ($check == 0 && $xacnhan == 0) --}}
                            <a href="/client/chitietphong/{{ $phong->so_phong }}" target="_blank"
                                class="primary-btn">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Room list end --}}
            {{-- <div class="col-lg-12">
                <div class="room-pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div> --}}
            {{-- Room list end --}}
            {{-- <div class="col-lg-12 d-flex justify-content-center">
                {!! $phongs->links("pagination::bootstrap-4") !!}
            </div> --}}
        </div>
    </div>
    @include('client.layouts2.paginate', ['numberOfItem' => '6'])
</section>
<!-- Rooms Section End -->
