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

    <!-- Room -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">Rooms &amp; Suites</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($loaiphongs as $loaiphong)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="room" style="cursor:pointer" data-toggle="modal" data-target="#LoaiphongModal{{ $loaiphong->ma }}">
                        <figure class="img-wrap">
                            <img src="/client/images/{{ $loaiphong->hinh }}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>{{ $loaiphong->ten }}</h2>
                            <span class="text-uppercase letter-spacing-1">{{ $loaiphong->gia }}$/PER NIGHT</span>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="LoaiphongModal{{ $loaiphong->ma }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Chi tiết loại phòng</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" class="d-block">
                                <div class="d-flex">
                                    <h5>Loại phòng: </h5>
                                    <p>{{$loaiphong->ten}}</p>
                                </div>
                                <div class="d-flex">
                                    <h5>Giá: </h5>
                                    <p>{{$loaiphong->gia }}</p> /đêm
                                </div>
                                <div class="d-flex">
                                    <h5>Số lượng ở tối đa: </h5>
                                    <p>{{$loaiphong->soluong}}</p>
                                </div>
                                <div class="d-flex">
                                    <h5>Miêu tả: </h5>
                                    <p>{{$loaiphong->mieuTa}}</p>
                                </div>
                                <div class="d-flex">
                                    <h5>Các phòng trong loại phòng: </h5>
                                    @foreach($phongs as $phong)
                                        @if($phong->loaiphongid == $loaiphong->ma)
                                            <p>{{$phong->so_phong}},</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('client.layouts.footer')

    <!-- Script -->
    @include('client.layouts.script')

</body>

</html>