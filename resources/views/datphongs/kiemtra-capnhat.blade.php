@extends('layouts3.app')

@section('content')
    <div class="col-lg-12 margin-tb">
        <div class="pull-right mb-2 row">
            <div class="col-4 mb-3">
                <label class="form-label" for="ngaydat">Ngày vào</label>
                <input disabled type="date" name="ngaydat" class="form-control" id="ngaydat" placeholder="VD: Lý Nhựt Nam"
                    value="{{ $dat->ngaybatdauo }}" />
            </div>
            <div class="col-4 mb-3">
                <label class="form-label" for="ngaytra">Ngày ra</label>
                <input disabled type="date" name="ngaytra" class="form-control" id="ngaytra"
                    placeholder="VD: Lý Nhựt Nam" value="{{ $dat->ngayketthuco }}" />
            </div>
            <div class="col-4 mb-3">
                <label class="form-label" for="soluong">Số lượng</label>
                <input disabled type="number" name="soluong" class="form-control" id="soluong" placeholder="VD: 001"
                    value="{{ $phongdat->soluong }}" />
            </div>
            <input disabled type="hidden" name="khachhangid" value="{{ $phongdat->khachhangid }}">
            <div class="d-flex justify-content-between my-3">
                <button type="button" value="" class="btn btn-primary" id="myInput0"
                    onclick="locPhongTheoLoaiphong( '', 1 )">
                    Tất cả
                </button>
                @foreach ($loaiphongs as $loaiphong)
                    <button type="button" value="{{ $loaiphong->ten }}" class="btn btn-primary"
                        id="myInput{{ $loaiphong->ma }}" onclick="locPhongTheoLoaiphong( '{{ $loaiphong->ten }}', 1 )">
                        {{ $loaiphong->ten }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Số phòng</th>
                <th>Loại phòng</th>
                <th class="datatable-nosort">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phongs as $phong)
                <tr>
                    <td>{{ $phong->so_phong }}</td>
                    <td>
                        @foreach ($loaiphongs as $loaiphong)
                            @if ($loaiphong->ma == $phong->loaiphongid)
                                {{ $loaiphong->ten }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('danhsachdatphongs.change') }}" method="Post">
                            @csrf
                            <input type="hidden" name="datphongid" id="datphongid" value="{{ $dat->datphongid }}" />
                            <input type="hidden" name="phongid" id="phongid" value="{{ $phong->so_phong }}" />
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                Đổi phòng
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Số phòng</th>
                <th>Loại phòng</th>
                <th class="datatable-nosort">Action</th>
            </tr>
        </tfoot>
    </table>
@endsection
