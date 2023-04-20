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
                    <h2 class="heading" data-aos="fade-up">Phòng</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($phongs as $phong)
                <a href="/client/chitietphong/{{$phong->so_phong}}" class="col-md-6 col-lg-4">
                    <div class="room" style="cursor:pointer">
                        <figure class="img-wrap">
                            <img src="/client/images/{{ $phong->loaiphongs->hinh }}" alt="Free website template"
                                class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>{{ $phong->so_phong }}</h2>
                            <span class="text-uppercase letter-spacing-1">{{ $phong->loaiphongs->gia }}
                                VND/đêm</span>

                        </div>
                    </div>
                </a>
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