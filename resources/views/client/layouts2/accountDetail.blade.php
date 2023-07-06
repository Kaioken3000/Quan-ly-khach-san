<section class="section mb-3" id="next">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Username</h5>
                <p class="card-text">{{ auth()->user()->username }}</p>

                <h5 class="card-title">Email</h5>
                <p class="card-text">{{ auth()->user()->email }}</p>

                <h5 class="card-title">Phone Number</h5>
                <p class="card-text">{{ auth()->user()->sdt }}</p>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suataikhoan">
                        Cập nhật thông tin
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#xoataikhoan">
                        Xoá tài khoản
                    </button>
                    <!-- Modal sửa thông tin  -->
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
                                                <input type="sdt" name="sdt" class="form-control" id="sdt" placeholder="VD: Admin@gmail.com" value="0{{ auth()->user()->sdt }}" />
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
                    <!-- Modal xoá thông tin  -->
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
    </div>
</section>
