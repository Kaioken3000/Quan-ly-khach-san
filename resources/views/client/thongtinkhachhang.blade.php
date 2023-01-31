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
  <!-- END section -->

  <section class="section contact-section" id="next">
    <div class="container">
      <div class="row">
        <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
          <div class="row">
            <div class="col-md-10 ml-auto contact-info">
              <p><span class="d-block">Username:</span> <span class="text-black"> {{ auth()->user()->username }}</span></p>
              <p><span class="d-block">Email:</span> <span class="text-black"> {{ auth()->user()->email }}</span></p>
              <p><span class="d-block">Số điện thoại:</span> <span class="text-black"> {{ auth()->user()->sdt }}</span></p>
            </div>
          </div>
        </div>
        <div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suataikhoan">
            Cập nhật thông tin
          </button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#xoataikhoan">
            Xoá tài khoản
          </button>
          <!-- Modal sửa phòng -->
          <div class="modal fade" id="suataikhoan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1"> Cập nhật thông tin</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="d-flex gap-1">
                    <form action="{{ route('client.khachhangedit', auth()->user()->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="VD: Admin" value="{{ auth()->user()->username }}" />
                        @error('username')
                        <div class="alert alert-danger" user="alert">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="VD: Admin@gmail.com" value="{{ auth()->user()->email }}" />
                        @error('email')
                        <div class="alert alert-danger" user="alert">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="sdt">Số điện thoại</label>
                        <input type="sdt" name="sdt" class="form-control" id="sdt" placeholder="VD: Admin@gmail.com" value="{{ auth()->user()->sdt }}" />
                        @error('sdt')
                        <div class="alert alert-danger" user="alert">{{ $message }}</div>
                        @enderror
                      </div>
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        Cancel
                      </button>
                      <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal xoá phòng -->
          <div class="modal fade" id="xoataikhoan" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="d-flex gap-1">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                      No
                    </button>
                    <form action="{{ route('client.xoakhachhang', auth()->user()->id) }}" method="Post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"> Yes</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  @include('client.layouts.footer')

  @include('client.layouts.script')

</body>

</html>