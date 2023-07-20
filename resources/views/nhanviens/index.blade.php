@extends('layouts3.appForCalendar')

@section('content')
<button onclick="myFunction()" class="btn btn-primary">Hiện nhân viên</button>

<div class="container-xxl flex-grow-1 container-p-y" id="myDIV">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="">
        <div class="d-flex mt-5">
            <div class="flex-grow-1">
                @include('layouts3.title', ['titlePage' => 'Quản lý nhân viên'])
            </div>
            <div>
                <a class="btn btn-success mb-4" href="{{ route('nhanviens.create') }}"><i class="bx bx-plus mb-1"></i> Create Nhân viên</a>
            </div>
        </div>
        <table class="table">
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
                                <i class="fas fa-edit"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link" style="color:red">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a class="btn btn-link" href="/catruc_nhanvien/themCatruc/{{$nhanvien->ma}}">
                                Thêm ca trực
                            </a>
                        </form>
                    </td>
                </tr>
                @endforeach
                {{-- <tr>
                    <td>
                        {!! $nhanviens->links("pagination::bootstrap-4") !!}
                    </td>
                </tr> --}}
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

</style>@include('layouts2.calendar')

@endsection
