<!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

  @include('client.layouts.header')
  <!-- END head -->

  <section class="site-hero inner-page overlay" style="background-image: url(/client/images/hero_4.jpg)"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade">
          <h1 class="heading mb-3">Phòng {{$request->phongid}}</h1>
          <ul class="custom-breadcrumbs mb-4">
            <li><a href="index.html">Home</a></li>
            <li>&bullet;</li>
            <li>Chi tiết phòng</li>
          </ul>
        </div>
      </div>
    </div>

    <a class="mouse smoothscroll" href="#next">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </a>
  </section>
  <!-- END section -->

  <section class="section contact-section" id="next">
    <div class="container">
      <div class="row">
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
          <div class="row">
            <div class="col-md-12 ml-auto contact-info">

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

            </div>
          </div>
        </div>
        <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
          @endif
          <label class="text-black font-weight-bold" for="ten">Phòng: {{$phong->so_phong}}</label><br>
          <label class="text-black font-weight-bold" for="ten">Loại phòng: {{$phong->ten}}</label><br>
          <label class="text-black font-weight-bold" for="ten">Sô lượng: {{$phong->soluong}}</label><br>
          <label class="text-black font-weight-bold" for="ten">Giá: {{$phong->gia}}</label><br>
          <label class="text-black font-weight-bold" for="ten">Miêu tả: {{$phong->mieuTa}}</label><br>

          <form action="/kiemtra-index-store" method="post">
            @csrf
            <div class="row">
              <div class="col mb-3 mb-lg-0 col">
                <label for="ngaydat" class="font-weight-bold text-black">Ngày vào</label>
                <input type="date" name="ngaydat" id="ngaydat" class="form-control">
                @error('ngaydat')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="col mb-3 mb-lg-0 col">
                <label for="ngaytra" class="font-weight-bold text-black">Ngày ra</label>
                <input type="date" name="ngaytra" id="ngaytra" class="form-control">
                @error('ngaytra')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mt-3 row">
              <div class="col">
                <label for="soluong" class="font-weight-bold text-black">Số lượng</label>
                <input type="number" name="soluong" id="soluong" class="form-control" value="1" min=1>
                @error('soluong')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <input type="hidden" id="phongid" name="phongid" class="form-control" value="{{ $phong->so_phong }}">
              <input type="hidden" id="ten" name="ten" class="form-control " value="{{auth()->user()->username}}">
              <input type="hidden" id="sdt" name="sdt" class="form-control " value="{{auth()->user()->sdt}}">
              <input type="hidden" id="email" name="email" class="form-control " value="{{auth()->user()->email}}">
              <input type="hidden" value="{{auth()->user()->id}}" name="clientid">
              <div class="col mt-4 pt-2">
                <button class="btn btn-primary btn-block text-white">Đặt phòng</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @include('client.layouts.footer')

  @include('client.layouts.script')

</body>

</html>