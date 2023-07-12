@extends('layouts2.appForCalendar')

@section('content')
<button onclick="myFunction()" class="btn btn-primary">Hiện nhân viên</button>

<div class="container-xxl flex-grow-1 container-p-y" id="myDIV">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân viên /</span> Quản lý</h4>
    <a class="btn btn-success mb-4" href="{{ route('nhanviens.create') }}"><i class="bx bx-plus mb-1"></i> Create Nhân viên</a>
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
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Lương </th>
                    <th>Ca trực </th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nhanviens as $nhanvien)
                <tr>
                    <td>{{ $nhanvien->ma }}</td>
                    <td>{{ $nhanvien->ten }}</td>
                    <td>{{ $nhanvien->luong }} VND</td>
                    <td>
                        @foreach($nhanvien->catrucs as $ca)
                        <div class="d-flex gap-1">
                            @foreach($catrucs as $catruc)
                            @if($catruc->id == $ca->catrucid)
                            <form action="{{ route('catruc_nhanviens.destroy',$ca->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="badge badge-danger border-0"><i class="fa fa-times"></i></button> --}}
                                <button type="submit" class="btn btn-link m-0" data-color="#e95959" style="color:red;">
                                    <i class="icon-copy dw dw-delete-3"></i>
                                </button>
                            </form>
                            <p class="mt-2 p-1">{{$catruc->ten}}</p>
                            @endif
                            @endforeach
                        </div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($nhanvien->catrucs as $ca)
                        <p class="mt-2 p-1">{{$ca->ngaybatdau}}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach($nhanvien->catrucs as $ca)
                        <p class="mt-2 p-1">{{$ca->ngayketthuc}}</p>
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('nhanviens.destroy',$nhanvien->ma) }}" method="Post">
                            <a class="btn btn-link" href="{{ route('nhanviens.edit',$nhanvien->ma) }}">
                                <i class="icon-copy dw dw-edit2"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link" data-color="#e95959" style="color:red;">
                                <i class="icon-copy dw dw-delete-3"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modaldichvu{{ $nhanvien->ma }}">
                            <i class="bx bx-box mb-1"></i> Thêm ca trực
                            </button> --}}
                            <a class="btn btn-light" href="/catruc_nhanvien/themCatruc/{{$nhanvien->ma}}">
                                Thêm ca trực
                            </a>
                        </form>

                        <!-- Ca trực -->
                        <div class="my-1">

                        </div>
                        <!-- Modal ca trực -->
                        <div class="modal fade" id="modaldichvu{{ $nhanvien->ma }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Chọn ca trực</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('catruc_nhanviens.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$nhanvien->ma}}" id="nhanvienid" name="nhanvienid">
                                            <div class="mb-3">
                                                <label class="form-label" for="ngaybatdau">Ngày bắt đầu</label><br>
                                                <input class="form-control" type="date" id="ngaybatdau" name="ngaybatdau">

                                                <label class="form-label" for="ngayketthuc">Ngày kết thúc</label><br>
                                                <input class="form-control" type="date" id="ngayketthuc" name="ngayketthuc">

                                                <hr>
                                                <label class="form-label" for="ten">Ca trực</label><br>
                                                @foreach($catrucs as $catruc)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="catruc{{$catruc->id}}" name="catrucid[]" value="{{$catruc->id}}">
                                                    <label class="form-check-label" for="catruc{{$catruc->id}}">
                                                        {{$catruc->ten}}:
                                                    </label>
                                                    <label class="form-check-label" for="catruc{{$catruc->id}}">
                                                        {{$catruc->giobatdau}} - {{$catruc->gioketthuc}}
                                                    </label>
                                                </div>
                                                @endforeach
                                                @error('ten')
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
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        {!! $nhanviens->links("pagination::bootstrap-4") !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>
<script>
    myFunction()

</script>
<style>
    .fc-title {
        color: white
    }

</style>
@include('layouts2.calendar')
@endsection
