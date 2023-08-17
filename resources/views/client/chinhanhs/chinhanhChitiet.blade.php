@extends('client.chinhanh')

@section('content')
    @include('client.layouts2.breadcrumb', ['titlePage' => 'Chi Tiết Chi Nhánh'])
    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">

        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#home" data-toggle="tab">Thông Tin Chi Nhánh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu1" data-toggle="tab">Các phòng trong chi nhánh</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in show active py-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact-text">
                                <h3>{{ $chinhanh->ten }}</h3>
                                <div class="mx-3">
                                    @foreach ($chinhanh->mieutas as $mieuta)
                                        <p>{!! $mieuta->noidung !!}</p>
                                        @isset($mieuta->hinh)
                                            <img src="/client/images/{{ $mieuta->hinh }}">
                                        @endisset
                                    @endforeach
                                </div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="c-o">Số Lượng:</td>
                                            <td>{{ $chinhanh->soluong }} phòng</td>
                                        </tr>
                                        <tr>
                                            <td class="c-o w-50">Số Điện Thoại:</td>
                                            <td>{{ $chinhanh->sdt }}</td>
                                        </tr>
                                        <tr>
                                            <td class="c-o">Địa điểm:</td>
                                            <td>{{ $chinhanh->thanhpho }}, {{ $chinhanh->quan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $i = 0; ?>
                                    @foreach ($chinhanh->hinhs as $hinh)
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
                        </div>
                    </div>
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.0606825994123!2d-72.8735845851828!3d40.760690042573295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b24c9274c91%3A0xf310d41b791bcb71!2sWilliam%20Floyd%20Pkwy%2C%20Mastic%20Beach%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1578582744646!5m2!1sen!2sbd"
                            height="470" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div>
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous"
                            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=658955415606544&autoLogAppEvents=1"
                            nonce="sFzhTDa5"></script>
                        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade py-3">
                    @include('client.layouts2.roomList', ['phongs' => $chinhanh->phongs])
                </div>
            </div>
            <style>
                .nav-item a {
                    color: black
                }
            </style>

        </div>
    </section>
    <!-- Room Details Section End -->
@endsection
