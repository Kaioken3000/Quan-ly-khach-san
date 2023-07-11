@extends('layouts2.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Phòng /</span> Quản lý</h4>
    <!-- Create -->
    @hasrole('Admin')
    <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#ModalCreate">
        <i class="bx bx-plus mb-1"></i> Create Phòng
    </button>
    @endhasrole
    <!-- Modal Create -->
    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Create phòng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('phongs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="so_phong">Sô phòng</label>
                            <input type="number" name="so_phong" class="form-control" id="so_phong" placeholder="VD: 001" />
                            @error('so_phong')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="picture_1">Hinh phòng 1</label>
                            <input type="file" name="picture_1" class="form-control" id="picture_1" require="require" />
                            @error('picture_1')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="picture_2">Hinh phòng 2</label>
                            <input type="file" name="picture_2" class="form-control" id="picture_2" require="require" />
                            @error('picture_2')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="picture_3">Hinh phòng 3</label>
                            <input type="file" name="picture_3" class="form-control" id="picture_3" require="require" />
                            @error('picture_3')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="loaiphongid">Loại phòng</label>
                            <select class="form-control" id="loaiphongid" name="loaiphongid">
                                @foreach ($loaiphongs as $loaiphong)
                                <option value="{{ $loaiphong->ma }}">{{ $loaiphong->ten }}</option>
                                @endforeach
                            </select>
                            @error('loaiphongid')
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
    @else
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-box  pb-10">
        <div class="h5 pd-20 mb-0">Quản lý phòng</div>
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus">Số phòng</th>
                    <th colspan="3">Hình</th>
                    <th>Loại phòng</th>
                    @hasrole('Admin')
                    <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($phongs as $phong)
                <tr>
                    <td>{{ $phong->so_phong }}</td>
                    <td><img data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="{{ $phong->picture_1 }}" src="/client/images/{{ $phong->picture_1 }}" width="100%"></td>
                    <td><img data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="{{ $phong->picture_2 }}" src="/client/images/{{ $phong->picture_2 }}" width="100%"></td>
                    <td><img data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="{{ $phong->picture_3 }}" src="/client/images/{{ $phong->picture_3 }}" width="100%"></td>
                    <td>{{ $phong->loaiphongs->ten }}</td>
                    @hasrole('Admin')
                    <td>
                        <!-- edit -->
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalEdit{{ $phong->so_phong }}">
                            <i class="icon-copy dw dw-edit2"></i>
                        </button>
                        <!-- Modal edit -->
                        <div class="modal fade" id="ModalEdit{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Phòng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('phongs.update',$phong->so_phong) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label" for="so_phong">Sô phòng</label>
                                                <input type="number" name="so_phong" class="form-control" id="so_phong" value="{{ $phong->so_phong }}" placeholder="VD: 001" />
                                                @error('so_phong')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="picture_1">Hinh phòng 2</label>
                                                <input type="file" name="picture_1" class="form-control" id="picture_1" require="require" />
                                                @error('picture_1')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="picture_2">Hinh phòng 2</label>
                                                <input type="file" name="picture_2" class="form-control" id="picture_2" require="require" />
                                                @error('picture_2')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="picture_3">Hinh phòng 3</label>
                                                <input type="file" name="picture_3" class="form-control" id="picture_3" require="require" />
                                                @error('picture_3')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="loaiphongid">Loại phòng</label>
                                                <select class="form-control" id="loaiphongid" name="loaiphongid">
                                                    @foreach ($loaiphongs as $loaiphong)
                                                    <option value="{{ $loaiphong->ma }}" @if($loaiphong->ma === $phong->loaiphongid)
                                                        selected
                                                        @endif
                                                        >{{ $loaiphong->ten }}</option>
                                                    @endforeach
                                                </select>
                                                @error('loaiphongid')
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
                        <button type="button" class="btn btn-link" data-color="#e95959" data-toggle="modal" data-target="#ModalXoa{{ $phong->so_phong }}">
                            <i class="icon-copy dw dw-delete-3"></i>
                        </button>
                        <!-- Modal xoá  -->
                        <div class="modal fade" id="ModalXoa{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn xoá</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex gap-1">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                No
                                            </button>
                                            <form action="{{ route('phongs.destroy',$phong->so_phong) }}" method="Post">
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
                <tr>
                    <td>
                        {!! $phongs->links("pagination::bootstrap-4") !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endsection
