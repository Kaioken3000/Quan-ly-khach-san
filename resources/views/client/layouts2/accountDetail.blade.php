@include('client.layouts2.breadcrumb', ['titlePage' => 'Thông tin tài khoản'])


<section class="section mb-5" id="next">
    <div class="container">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    {{-- <img class="img-fluid h-100 rounded-start" src="/client/images/" alt="..."> --}}
                    <img class="img-fluid h-100 rounded-start" src="/client2/img/blog/blog-wide.jpg"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex col-12">
                                <h5 class="card-title mr-1">Số điểm Tích được:</h5>
                                <p class="card-text">{{ auth()->user()->khachhangs[0]->diem }} point</p>
                            </div>
                            <br><br>
                            <div class="col-6">
                                <div class="d-flex">
                                    <h5 class="card-title mr-2">Tên tài khoản:</h5>
                                    <p class="card-text">{{ auth()->user()->username }}</p>
                                </div>

                                <div class="d-flex">
                                    <h5 class="card-title mr-1">Email:</h5>
                                    <p class="card-text">{{ auth()->user()->email }}</p>
                                </div>

                                <div class="d-flex">
                                    <h5 class="card-title mr-1">Số điện thoại:</h5>
                                    <p class="card-text">0{{ auth()->user()->sdt }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex">
                                    <h5 class="card-title mr-1">Địa chỉ:</h5>
                                    <p class="card-text">{{ auth()->user()->diachi }}</p>
                                </div>
                                <div class="d-flex">
                                    <h5 class="card-title mr-1">Giới Tính:</h5>
                                    <p class="card-text">{{ auth()->user()->gioitinh }}</p>
                                </div>
                                <div class="d-flex">
                                    <h5 class="card-title mr-1">Văn Bằng:</h5>
                                    <p class="card-text">{{ auth()->user()->vanbang }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#suataikhoan">
                                Cập nhật thông tin
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#xoataikhoan">
                                Xoá tài khoản
                            </button>
                            <!-- Modal sửa thông tin  -->
                            <div class="modal fade" id="suataikhoan" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1"> Cập nhật thông tin</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex gap-1">
                                                <form action="{{ route('client.khachhangedit', auth()->user()->id) }}"
                                                    method="POST" class="w-100">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label class="form-label" for="username">Username</label>
                                                        <input required type="text" name="username"
                                                            class="form-control" id="username" placeholder="VD: Admin"
                                                            value="{{ auth()->user()->username }}" />
                                                        @error('username')
                                                            <div class="alert alert-danger" user="alert">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input required type="email" name="email"
                                                            class="form-control" id="email"
                                                            placeholder="VD: Admin@gmail.com"
                                                            value="{{ auth()->user()->email }}" />
                                                        @error('email')
                                                            <div class="alert alert-danger" user="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="sdt">Số điện thoại</label>
                                                        <input required type="sdt" name="sdt"
                                                            class="form-control" id="sdt"
                                                            placeholder="VD: Admin@gmail.com"
                                                            value="0{{ auth()->user()->sdt }}" />
                                                        @error('sdt')
                                                            <div class="alert alert-danger" user="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label" for="diachi">Địa chỉ</label>
                                                        <input required type="diachi" name="diachi"
                                                            class="form-control" id="diachi"
                                                            placeholder="VD: Q.Ninh Kiều, TP.Cần Thơ"
                                                            value="{{ auth()->user()->diachi }}" required />
                                                        @error('diachi')
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 ">
                                                        <label class="form-label" for="gioitinh">Giới tính</label>
                                                        <div class="row mx-2">
                                                            <div class="form-group col-3">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gioitinh" id="gioitinnam" value="nam"
                                                                    {{ auth()->user()->gioitinh == 'nam' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="gioitinhnam">
                                                                    Nam
                                                                </label>
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gioitinh" id="gioitinhnu" value="nu"
                                                                    {{ auth()->user()->gioitinh == 'nu' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="gioitinhnu">
                                                                    Nữ
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @error('gioitinh')
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label" for="vanbang">Số CMND hoặc Passport
                                                            (hoặc
                                                            các văn bằng khác
                                                            có hình).</label>
                                                        <input required type="vanbang" name="vanbang"
                                                            class="form-control" id="vanbang"
                                                            placeholder="VD: 01234567891000"
                                                            value="{{ auth()->user()->vanbang }}" required />
                                                        @error('vanbang')
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal xoá thông tin  -->
                            <div class="modal fade" id="xoataikhoan" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá
                                            </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex gap-1">
                                                <div>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">
                                                        No
                                                    </button>
                                                </div>
                                                <form action="{{ route('client.xoakhachhang', auth()->user()->id) }}"
                                                    method="Post">
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
            </div>
        </div>
    </div>
</section>
