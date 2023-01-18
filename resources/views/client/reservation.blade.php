<!DOCTYPE HTML>
<html>
  @include('client.layouts.head')
  <body>
    
    @include('client.layouts.header')
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Reservation Form</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Reservation</li>
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
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="/index-store" method="post" class="bg-white p-md-5 p-4 mb-5 border">
            @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="ten">Name</label>
                  <input type="text" id="ten" name="ten" class="form-control ">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="sdt">Phone</label>
                  <input type="text" id="sdt" name="sdt" class="form-control ">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control ">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="ngaydat">Date Check In</label>
                  <input type="date" id="ngaydat" name="ngaydat" class="form-control" value="{{ $request->ngaydat }}">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="ngaytra">Date Check Out</label>
                  <input type="date" id="ngaytra" name="ngaytra" class="form-control" value="{{ $request->ngaytra }}">
                </div>
              </div>
             
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="soluong">Number</label>
                  <input type="number" id="soluong" name="soluong" class="form-control" value="{{ $request->soluong }}">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phongid">Phong</label>
                  <input type="text" id="phongid" name="phongid" class="form-control" value="{{ $request->sophong }}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Reserve Now" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span class="text-black"> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
                <p><span class="d-block">Phone:</span> <span class="text-black"> (+1) 435 3533</span></p>
                <p><span class="d-block">Email:</span> <span class="text-black"> info@yourdomain.com</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('client.layouts.people')
    
    @include('client.layouts.reserve')
    
    @include('client.layouts.footer')
    
    @include('client.layouts.script')
    
  </body>
</html>