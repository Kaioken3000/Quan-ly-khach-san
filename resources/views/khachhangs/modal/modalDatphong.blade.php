<button class="btn btn-success" type="button" data-bs-toggle="modal"
    data-bs-target="#modalDatphongChoKhachhangCu{{ $khachhang->id }}">
    Đặt phòng
</button>
<div class="modal fade" id="modalDatphongChoKhachhangCu{{ $khachhang->id }}" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDatphongChoKhachhangCu{{ $khachhang->id }}Label">Đặt phòng</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                        class="fas fa-times fs--1"></span></button>
            </div>
            {{-- Form begin --}}
            <form action="/datphongs-kiemtra" method="GET">
                <div class="modal-body">
                    <div class="mb-3">
                        {{-- <label class="form-label" for="ngaydat">Ngày vào</label>
                                                        <input type="date" name="ngaydat" class="form-control" id="ngaydat" required/> --}}

                        <label class="form-label" for="ngaydat">Ngày vào</label>
                        {{-- <input class="form-control datetimepicker flatpickr-input" type="date" id="ngaydat"
                            type="text" name="ngaydat" placeholder="yyyy-mm-dd"
                            data-options="{'disableMobile':true,'dateFormat':'Y-m-d'}" required> --}}
                        <input class="form-control datetimepicker" id="datepicker" type="text"
                            placeholder="yyyy-mm-dd" name="ngaydat"
                            data-options='{"minDate":"today","disableMobile":true,"dateFormat":"Y-m-d"}' />

                        @error('ngaydat')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        {{-- <label class="form-label" for="ngaytra">Ngày ra</label>
                                                        <input type="date" name="ngaytra" class="form-control" id="ngaytra" required /> --}}

                        <label class="form-label" for="ngaytra">Ngày ra</label>
                        {{-- <input class="form-control datetimepicker flatpickr-input" type="date" id="ngaytra"
                            type="text" name="ngaytra" placeholder="yyyy-mm-dd"
                            data-options="{'disableMobile':true,'dateFormat':'Y-m-d'}" required> --}}
                        <input class="form-control datetimepicker" id="datepicker" type="text"
                            placeholder="yyyy-mm-dd" name="ngaytra"
                            data-options='{"minDate":"today","disableMobile":true,"dateFormat":"Y-m-d"}' />

                        @error('ngaytra')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="soluong">Số lượng</label>
                        <input type="number" name="soluong" class="form-control" id="soluong" required
                            value="1" />
                        <div class="invalid-feedback">Phải có ít nhất 1 người</div>
                        @error('soluong')
                            <div class="alert alert-danger" role="alert">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="tinhtrangthanhtoan" value=0>
                    <input type="hidden" name="tinhtrangnhanphong" value=0>
                    <input type="hidden" name="thiskhachhangid" value={{ $khachhang->id }}>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            {{-- Form end --}}
        </div>
    </div>
</div>
