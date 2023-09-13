@include('client.layouts2.breadcrumb', ['titlePage' => 'Chi Tiết Phòng'])
<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    {{-- content --}}
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php $i = 0; ?>
                            @foreach ($phong->hinhphongs as $hinhphong)
                                <?php $hinh = App\Models\Hinh::where('id', $hinhphong->hinhid)->first();
                                ?>
                                <div class="carousel-item <?php if ($i == 0) {
                                    echo 'active';
                                }
                                $i++; ?>">
                                    <img class="d-block w-100" src="/client/images/{{ $hinh->vitri }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    {{-- end content --}}
                    <div class="room-details-item">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{ $phong->loaiphongs->ten }}-{{ $phong->so_phong }}</h3>
                                <div class="rdt-right">
                                    <a href="/client/previewVirtualTour/{{ $phong->virtualtours[0]->id }}"
                                        target="_blank">Xem tham quan ảo
                                        <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <h2>{{ $phong->loaiphongs->gia }}VND<span>/Pernight</span></h2>
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
                                        <td class="r-0" style="width: 500px">Thiết bị:</td>
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
                                        <td class="r-0 d-flex justify-content-start align-items-start">Giường:</td>
                                        <td>
                                            @foreach ($phong->giuongphongs as $giuongphong)
                                                <?php $giuong = App\Models\Giuong::where('id', $giuongphong->giuongid)->first();
                                                ?>
                                                {{ $giuong->ten }}
                                                <br>
                                                <img src="/client/images/{{ $giuong->hinh }}" class="img-fluid rounded "
                                                    style="max-width: 300px">
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
                            {{-- <p class="f-para"><i class="fa fa-check text-warning"></i> {{ $phong->loaiphongs->mieuTa }}</p> --}}
                            @foreach ($phong->mieutaphongs as $mieutaphong)
                                <?php $mieuta = App\Models\Mieuta::where('id', $mieutaphong->mieutaid)->first();
                                ?>
                                {!! $mieuta->noidung !!}
                                @if (isset($mieuta->hinh))
                                    <img src="/client/images/{{ $mieuta->hinh }}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Đặt phòng ngay</h3>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    {{-- <form action="/kiemtra-index-store" method="post"> --}}
                    <form action="/client/reservation" method="post">
                        @csrf
                        <div class="check-date">
                            <label for="ngaydat">Ngày vào</label>
                            {{-- <input type="date" name="ngaydat" id="ngaydat"
                                class="form-control form-control-lg-border" required> --}}
                            <input class="form-control datetimepicker" type="text" placeholder="yyyy-mm-dd"
                                name="ngaydat" required />
                            @error('ngaydat')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="check-date">
                            <label for="ngaytra">Ngày ra</label>
                            {{-- <input type="date" name="ngaytra" id="ngaytra"
                                class="form-control form-control-lg-border" required> --}}
                            <input class="form-control datetimepicker" type="text" placeholder="yyyy-mm-dd"
                                name="ngaytra" required />
                            @error('ngaytra')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="soluong">Số người ở tối đa trong phòng:</label>
                            <input type="number" name="soluong" id="soluong"
                                class="form-control form-control-lg-border" min=1 required value="1">
                            @error('soluong')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit">Đặt phòng</button>
                        <input type="hidden" id="phongid" name="phongid" class="form-control"
                            value="{{ $phong->so_phong }}">
                        @auth
                            <input type="hidden" id="sophong" name="sophong" class="form-control"
                                value="{{ $phong->so_phong }}">
                            <input type="hidden" id="ten" name="ten" class="form-control "
                                value="{{ auth()->user()->username }}">
                            <input type="hidden" id="sdt" name="sdt" class="form-control "
                                value="{{ auth()->user()->sdt }}">
                            <input type="hidden" id="email" name="email" class="form-control "
                                value="{{ auth()->user()->email }}">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="clientid">
                        @endauth
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=658955415606544&autoLogAppEvents=1"
                    nonce="sFzhTDa5"></script>
                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->
