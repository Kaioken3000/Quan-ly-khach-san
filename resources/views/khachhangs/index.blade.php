@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="">
        <div class="d-flex">
            <div class="flex-grow-1">
                @include('layouts3.title', ['titlePage' => 'Quản lý khách hàng'])
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>email</th>
                    <th>Địa chỉ</th>
                    <th>Văn bằng</th>
                    <th>Giới tính</th>
                    <th>Mã đặt phòng</th>
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @foreach ($khachhangs as $khachhang)
                    <tr>
                        <td>{{ $khachhang->id }}</td>
                        <td>{{ $khachhang->ten }}</td>
                        <td>{{ $khachhang->sdt }}</td>
                        <td>{{ $khachhang->email }}</td>
                        <td>{{ $khachhang->diachi }}</td>
                        <td>{{ $khachhang->vanbang }}</td>
                        <td>{{ $khachhang->gioitinh }}</td>
                        <td>{{ $khachhang->datphongid ?? '' }}</td>
                        @hasanyrole('MainAdmin|Admin')
                            <td class="d-flex gap-1">
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                    data-bs-target="#modalDatphongChoKhachhangCu{{ $khachhang->id }}">Đặt phòng</button>
                                <div class="modal fade" id="modalDatphongChoKhachhangCu{{ $khachhang->id }}" tabindex="-1"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="modalDatphongChoKhachhangCu{{ $khachhang->id }}Label">Modal title</h5>
                                                <button class="btn p-1" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                            </div>
                                            <form action="/datphongs-kiemtra" method="GET">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        {{-- <label class="form-label" for="ngaydat">Ngày vào</label>
                                                        <input type="date" name="ngaydat" class="form-control" id="ngaydat" required/> --}}

                                                        <label class="form-label" for="ngaydat">Ngày vào</label>
                                                        <input class="form-control datetimepicker flatpickr-input"
                                                            type="date" id="ngaydat" type="text" name="ngaydat"
                                                            placeholder="yyyy-mm-dd"
                                                            data-options="{'disableMobile':true,'dateFormat':'Y-m-d'}" required>

                                                        @error('ngaydat')
                                                            <div class="alert alert-danger" role="alert">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        {{-- <label class="form-label" for="ngaytra">Ngày ra</label>
                                                        <input type="date" name="ngaytra" class="form-control" id="ngaytra" required /> --}}

                                                        <label class="form-label" for="ngaytra">Ngày ra</label>
                                                        <input class="form-control datetimepicker flatpickr-input"
                                                            type="date" id="ngaytra" type="text" name="ngaytra"
                                                            placeholder="yyyy-mm-dd"
                                                            data-options="{'disableMobile':true,'dateFormat':'Y-m-d'}" required>

                                                        @error('ngaytra')
                                                            <div class="alert alert-danger" role="alert">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="soluong">Số lượng</label>
                                                        <input type="number" name="soluong" class="form-control" id="soluong"
                                                            required value="1" />
                                                        <div class="invalid-feedback">Phải có ít nhất 1 người</div>
                                                        @error('soluong')
                                                            <div class="alert alert-danger" role="alert">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <input type="hidden" name="tinhtrangthanhtoan" value=0>
                                                    <input type="hidden" name="tinhtrangnhanphong" value=0>
                                                    <input type="hidden" name="thiskhachhangid" value={{$khachhang->id}}>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                    <button class="btn btn-outline-primary" type="button"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @include('khachhangs.edit')
                                @include('khachhangs.delete')
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Văn bằng</th>
                    <th>Giới tính</th>
                    <th>Mã đặt phòng</th>
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
