@extends('layouts2.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dịch vụ /</span> Quản lý</h4>
    <!-- Create -->
    @hasrole('Admin')
    <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#ModalCreate">
        <i class="bx bx-plus mb-1"></i> Create Dịch vụ
    </button>
    @endhasrole
    <!-- Modal Create -->
    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Create Dịch vụ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dichvus.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="ten">Tên dịch vụ</label>
                            <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: ăn uống" require="require" />
                            @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="giatien">Giá dịch vụ</label>
                            <input type="number" name="giatien" class="form-control" id="giatien" min=0 require="require" />
                            @error('giatien')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="donvi">Đơn vị</label>
                            <input type="text" name="donvi" class="form-control" id="donvi" placeholder="VD: VNĐ" require="require" value="VND" />
                            @error('donvi')
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

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-box  pb-10">
        <div class="h5 pd-20 mb-0">Quản lý loại phòng</div>
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus">ID</th>
                    <th>Tên dịch vụ</th>
                    <th>Giá </th>
                    @hasrole('Admin')
                    <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($dichvus as $dichvu)
                <tr>
                    <td>{{ $dichvu->id }}</td>
                    <td>{{ $dichvu->ten }}</td>
                    <td>{{ $dichvu->giatien }} {{ $dichvu->donvi }}</td>
                    @hasrole('Admin')
                    <td>
                        <!-- edit -->
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalEdit{{ $dichvu->id }}">
                            <i class="icon-copy dw dw-edit2"></i>
                        </button>
                        <!-- Modal edit -->
                        <div class="modal fade" id="ModalEdit{{ $dichvu->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Dịch vụ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('dichvus.update',$dichvu->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label" for="ten">Tên dịch vụ</label>
                                                <input type="text" name="ten" class="form-control" id="ten" value="{{ $dichvu->ten }}" placeholder="VD: ăn uống" require="require" />
                                                @error('ten')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="giatien">Giá dịch vụ</label>
                                                <input type="number" name="giatien" class="form-control" value="{{ $dichvu->giatien }}" id="giatien" min=0 require="require" />
                                                @error('giatien')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="donvi">Đơn vị</label>
                                                <input type="text" name="donvi" class="form-control" id="donvi" value="{{ $dichvu->donvi }}" placeholder="VD: VND" require="require" />
                                                @error('donvi')
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
                        <button type="button" class="btn btn-link" data-color="#e95959" data-toggle="modal" data-target="#basicModal{{ $dichvu->id }}">
                          <i class="icon-copy dw dw-delete-3"></i>
                        </button>
                        <!-- Modal xoá  -->
                        <div class="modal fade" id="basicModal{{ $dichvu->id }}" tabindex="-1" aria-hidden="true">
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
                                            <form action="{{ route('dichvus.destroy',$dichvu->id) }}" method="Post">
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
                        {!! $dichvus->links("pagination::bootstrap-4") !!}
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
