{{-- <!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

  @include('client.layouts.header')

  <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade">
          <h1 class="heading mb-3">Thông tin khách hàng</h1>
          <ul class="custom-breadcrumbs mb-4">
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

  @include('client.layouts2.accountDetail')

  @include('client.layouts.footer')

  @include('client.layouts.script')

</body> --}}

</html>

<!DOCTYPE html>
<html lang="vi">

@include('client.layouts2.head')

<body>

    {{-- @include('client.layouts2.loader') --}}

    @include('client.layouts2.menu')

    @include('client.layouts2.header')

    @include('client.layouts2.accountDetail')

    @include('client.layouts2.footer')

    {{-- @include('client.layouts2.search') --}}

    @include('client.layouts2.script')

</body>

</html>