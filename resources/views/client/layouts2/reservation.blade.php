<section class="section contact-section" id="next">
    <div class="container">
        <div class="row">
            <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">

                {{-- <form action="/index-store" method="post" class="bg-white p-md-5 p-4 mb-5 border"> --}}
                <form action="{{ route('client.thanhtoanvnpay') }}" id="frmCreateOrder" method="post">
                    @csrf
                    {{-- <div class="row">
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
                    </div> --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 form-group">
                                <label class="form-label" for="ten">Họ Tên</label>
                                <input type="text" name="ten" class="form-control" id="ten"
                                    placeholder="VD: Lý Nhựt Nam" value="{{auth()->user()->username}}" required/>
                                @error('ten')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="form-label" for="sdt">Số điện thoại</label>
                                <input type="text" name="sdt" class="form-control" id="sdt"
                                    placeholder="VD: 0123456789" value="{{auth()->user()->sdt}}" required/>
                                @error('sdt')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="example@mail.com" value="{{auth()->user()->email}}" required/>
                                @error('email')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 form-group">
                                <label class="form-label" for="diachi">Địa chỉ</label>
                                <input type="diachi" name="diachi" class="form-control" id="diachi"
                                    placeholder="VD: Q.Ninh Kiều, TP.Cần Thơ" value="{{auth()->user()->diachi}}" required/>
                                @error('diachi')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label" for="gioitinh">Giới tính</label> 
                                <div class="row mx-2">
                                    <div class="form-group col-3">
                                        <input class="form-check-input" type="radio" name="gioitinh" id="gioitinnam" 
                                            value="nam" {{(auth()->user()->gioitinh == 'nam' ? 'checked': '')}}>
                                        <label class="form-check-label" for="gioitinhnam">
                                            Nam
                                        </label>
                                    </div>
                                    <div class="form-group col-6">
                                        <input class="form-check-input" type="radio" name="gioitinh" id="gioitinhnu"
                                            value="nu" {{(auth()->user()->gioitinh == 'nu' ? 'checked': '')}}>
                                        <label class="form-check-label" for="gioitinhnu">
                                            Nữ
                                        </label>
                                    </div>
                                </div>
                                @error('gioitinh')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="form-label" for="vanbang">Số CMND hoặc Passport (hoặc các văn bằng khác
                                    có hình).</label>
                                <input type="vanbang" name="vanbang" class="form-control" id="vanbang"
                                    placeholder="VD: 01234567891000" value="{{auth()->user()->vanbang}}" required/>
                                @error('vanbang')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="ngaydat">Ngày vào</label>
                            <input type="date" id="ngaydat" name="ngaydat" class="form-control"
                                value="{{ $request->ngaydat }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="ngaytra">Ngày ra</label>
                            <input type="date" id="ngaytra" name="ngaytra" class="form-control"
                                value="{{ $request->ngaytra }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="soluong">Số lượng</label>
                            <input type="number" id="soluong" name="soluong" class="form-control"
                                value="{{ $request->soluong }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="text-black font-weight-bold" for="phongid">Phòng</label>
                            <input type="text" id="phongid" name="phongid" class="form-control"
                                value="{{ $request->sophong }}">
                        </div>
                    </div>

                    {{-- @csrf
                    @method('POST') --}}
                    <div class="mb-3">
                        <label for="amount">Số tiền</label>
                        <?php $phong = App\Models\Phong::find($request->sophong); ?>
                        <input class="form-control" data-val="true"
                            data-val-number="The field Amount must be a number."
                            data-val-required="The Amount field is required." id="amount" max="100000000"
                            min="1" name="amount" type="number" value="{{ $phong->loaiphongs->gia / 2 }}" />
                    </div>
                    <h4>Chọn phương thức thanh toán </h4>
                    <div class="mb-3">
                        <h5 class="mt-3">Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                        <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                        <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>

                        <h5 class="mt-3">Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                        <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                        <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>

                        <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                        <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>

                        <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                        <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>

                    </div>
                    <div class="mb-3">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                        <input type="radio" id="language" Checked="True" name="language" value="vn">
                        <label for="language">Tiếng việt</label><br>
                        <input type="radio" id="language" name="language" value="en">
                        <label for="language">Tiếng anh</label><br>

                    </div>
                    <button type="submit" class="btn btn-success" href>Thanh toán &nbsp; <i
                            class="fas fa-money-check"></i></button>
                    {{-- <input type="hidden" value="{{$request->datphongid}}" name="datphongid"> --}}
                    <input type="hidden" value="datcoc" name="loaitien">
                    <input type="hidden" value="{{ Auth::id() }}" name="khachhangid">
                    {{-- </form> --}}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="clientid">
                            {{-- <input type="submit" value="Đặt phòng" class="btn btn-primary text-white py-3 px-5 font-weight-bold"> --}}
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
                <div class="row">
                    <div class="col-md-10 ml-auto contact-info">
                        <p><span class="d-block">Địa chỉ:</span> <span class="text-black"> 98 West 21th Street, Suite
                                721 New York NY 10016</span></p>
                        <p><span class="d-block">Số điện thoại:</span> <span class="text-black"> (+1) 435 3533</span>
                        </p>
                        <p><span class="d-block">Email:</span> <span class="text-black"> info@yourdomain.com</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
