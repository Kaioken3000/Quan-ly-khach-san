@extends('layouts2.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Khách hàng /</span> Quản lý</h4>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-box  pb-10">
        <div class="h5 pd-20 mb-0">Quản lý phòng</div>
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ten</th>
                    <th>sdt</th>
                    <th>email</th>
                    <th>Mã đặt phòng</th>
                    @hasrole('Admin')
                    <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($khachhangs as $khachhang)
                <tr>
                    <td>{{ $khachhang->id }}</td>
                    <td>{{ $khachhang->ten }}</td>
                    <td>{{ $khachhang->sdt }}</td>
                    <td>{{ $khachhang->email }}</td>
                    <td>{{ $khachhang->datphongid }}</td>
                    @hasrole('Admin')
                    <td class="d-flex gap-1">
                        <!-- edit -->
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalEdit{{ $khachhang->id }}">
                            <i class="icon-copy dw dw-edit2"></i>
                        </button>
                        <!-- Modal edit -->
                        <div class="modal fade" id="ModalEdit{{ $khachhang->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Phòng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('khachhangs.update', $khachhang->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label" for="ten">Họ tên</label>
                                                <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Lý Nhựt Nam" value="{{ $khachhang->ten }}" />
                                                @error('ten')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="sdt">Số điện thoại</label>
                                                <input type="text" name="sdt" class="form-control" id="sdt" placeholder="VD: 001" value="{{ $khachhang->sdt }}" />
                                                @error('sdt')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="VD: 001" value="{{ $khachhang->email }}" />
                                                @error('email')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="diachi">Địa chỉ</label>
                                                <input type="diachi" name="diachi" class="form-control" id="diachi" placeholder="VD: Q.Ninh Kiều, TP.Cần Thơ" value="{{ $khachhang->diachi }}" />
                                                @error('diachi')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="gioitinh">Giới tính </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinnam" value="nam" {{ ($khachhang->gioitinh=="nam")? "checked" : "" }}>
                                                    <label class="form-check-label" for="gioitinhnam">
                                                        Nam
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinhnu" value="nu" {{ ($khachhang->gioitinh=="nu")? "checked" : "" }}>
                                                    <label class="form-check-label" for="gioitinhnu">
                                                        Nữ
                                                    </label>
                                                </div>
                                                @error('gioitinh')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="vanbang">Số CMND hoặc Passport (hoặc các văn bằng khác có hình).</label>
                                                <input type="vanbang" name="vanbang" class="form-control" id="vanbang" placeholder="VD: 01234567891000" value="{{ $khachhang->vanbang }}" />
                                                @error('vanbang')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete-->
                        <button type="button" class="btn btn-link" data-color="#e95959" data-toggle="modal" data-target="#ModalXoakhachhang{{ $khachhang->id }}">
                            <i class="icon-copy dw dw-delete-3"></i>
                        </button>
                        <!-- Modal xoá  -->
                        <div class="modal fade" id="ModalXoakhachhang{{ $khachhang->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex gap-1">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                No
                                            </button>
                                            <form action="{{ route('khachhangs.destroy',$khachhang->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"> Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    @endhasrole
                </tr>
                @endforeach
                {{-- <tr>
                    <td>
                        {!! $khachhangs->links("pagination::bootstrap-4") !!}
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
