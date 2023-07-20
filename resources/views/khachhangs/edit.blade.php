<!-- edit -->
<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $khachhang->id }}">
    <i class="icon-copy fas fa-edit"></i>
</button>
<!-- Modal edit -->
<div class="modal fade" id="ModalEdit{{ $khachhang->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('khachhangs.update', $khachhang->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="ten">Họ tên</label>
                        <input type="text" name="ten" class="form-control" id="ten"
                            placeholder="VD: Lý Nhựt Nam" value="{{ $khachhang->ten }}" />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="sdt">Số điện thoại</label>
                        <input type="text" name="sdt" class="form-control" id="sdt" placeholder="VD: 001"
                            value="{{ $khachhang->sdt }}" />
                        @error('sdt')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="VD: 001"
                            value="{{ $khachhang->email }}" />
                        @error('email')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="diachi">Địa chỉ</label>
                        <input type="diachi" name="diachi" class="form-control" id="diachi"
                            placeholder="VD: Q.Ninh Kiều, TP.Cần Thơ" value="{{ $khachhang->diachi }}" />
                        @error('diachi')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gioitinh">Giới tính </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioitinh" id="gioitinnam"
                                value="nam" {{ $khachhang->gioitinh == 'nam' ? 'checked' : '' }}>
                            <label class="form-check-label" for="gioitinhnam">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioitinh" id="gioitinhnu"
                                value="nu" {{ $khachhang->gioitinh == 'nu' ? 'checked' : '' }}>
                            <label class="form-check-label" for="gioitinhnu">
                                Nữ
                            </label>
                        </div>
                        @error('gioitinh')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="vanbang">Số CMND hoặc Passport (hoặc
                            các văn bằng khác có hình).</label>
                        <input type="vanbang" name="vanbang" class="form-control" id="vanbang"
                            placeholder="VD: 01234567891000" value="{{ $khachhang->vanbang }}" />
                        @error('vanbang')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>
