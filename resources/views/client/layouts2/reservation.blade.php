<section class="section contact-section" id="next">
    <div class="container">
      <div class="row">
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
          
          <form action="/index-store" method="post" class="bg-white p-md-5 p-4 mb-5 border">
          @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="ten">Tên</label>
                <input type="text" id="ten" name="ten" class="form-control " value="{{auth()->user()->username}}">
              </div>
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="sdt">Số điện thoại</label>
                <input type="text" id="sdt" name="sdt" class="form-control " value="{{auth()->user()->sdt}}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="text-black font-weight-bold" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control " value="{{auth()->user()->email}}">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="ngaydat">Ngày vào</label>
                <input type="date" id="ngaydat" name="ngaydat" class="form-control" value="{{ $request->ngaydat }}">
              </div>
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="ngaytra">Ngày ra</label>
                <input type="date" id="ngaytra" name="ngaytra" class="form-control" value="{{ $request->ngaytra }}">
              </div>
            </div>
           
            <div class="row">
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="soluong">Số lượng</label>
                <input type="number" id="soluong" name="soluong" class="form-control" value="{{ $request->soluong }}">
              </div>
              <div class="col-md-6 form-group">
                <label class="text-black font-weight-bold" for="phongid">Phòng</label>
                <input type="text" id="phongid" name="phongid" class="form-control" value="{{ $request->sophong }}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="hidden" value="{{auth()->user()->id}}" name="clientid">
                <input type="submit" value="Đặt phòng" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
          <div class="row">
            <div class="col-md-10 ml-auto contact-info">
              <p><span class="d-block">Địa chỉ:</span> <span class="text-black"> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
              <p><span class="d-block">Số điện thoại:</span> <span class="text-black"> (+1) 435 3533</span></p>
              <p><span class="d-block">Email:</span> <span class="text-black"> info@yourdomain.com</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>