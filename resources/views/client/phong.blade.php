{{-- <!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

    @include('client.layouts.header')

    @include('client.layouts.session')

    @include('client.layouts.book')

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

    @include('client.layouts.footer')

    @include('client.layouts.script')

</body>

</html> --}}

<!DOCTYPE html>
<html lang="vi">

@include('client.layouts2.head')

<body>

    {{-- @include('client.layouts2.loader') --}}

    @include('client.layouts2.menu')

    @include('client.layouts2.header')

    {{-- @include('client.layouts2.hero') --}}
    
    @include('client.layouts2.roomList')

    @include('client.layouts2.footer')

    {{-- @include('client.layouts2.search') --}}

    @include('client.layouts2.script')

</body>

</html>