@include('client.layouts2.breadcrumb')

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
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/client/images/{{$phong->picture_1}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/client/images/{{$phong->picture_2}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/client/images/{{$phong->picture_3}}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    {{-- end content --}}
                    <div class="rd-text">
                        <div class="rd-title">
                            {{-- <h3>Room {{$phong->so_phong}}</h3>
                            <div class="rdt-right">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                            </div> --}}
                        </div>
                        <h2>{{$phong->gia}}VND<span>/Pernight</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Category:</td>
                                    <td>{{$phong->ten}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>{{$phong->soluong}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="f-para">{{$phong->mieuTa}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Your Reservation</h3>
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
                            <input type="date" name="ngaydat" id="ngaydat" class="form-control form-control-lg-border">
                            @error('ngaydat')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="check-date">
                            <label for="ngaytra">Ngày ra</label>
                            <input type="date" name="ngaytra" id="ngaytra" class="form-control form-control-lg-border">
                            @error('ngaytra')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="soluong">Số lượng</label>
                            <input type="number" name="soluong" id="soluong" class="form-control form-control-lg-border" value="1" min=1>
                            @error('soluong')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit">Đặt phòng</button>
                        <input type="hidden" id="phongid" name="phongid" class="form-control" value="{{ $phong->so_phong }}">
                        @auth
                        <input type="hidden" id="sophong" name="sophong" class="form-control" value="{{ $phong->so_phong }}">
                        <input type="hidden" id="ten" name="ten" class="form-control " value="{{auth()->user()->username}}">
                        <input type="hidden" id="sdt" name="sdt" class="form-control " value="{{auth()->user()->sdt}}">
                        <input type="hidden" id="email" name="email" class="form-control " value="{{auth()->user()->email}}">
                        <input type="hidden" value="{{auth()->user()->id}}" name="clientid">
                        @endauth
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=658955415606544&autoLogAppEvents=1" nonce="sFzhTDa5"></script>
                <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->
