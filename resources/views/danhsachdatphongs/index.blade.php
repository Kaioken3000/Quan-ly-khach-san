@extends('layouts3.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card-box col-4">
        <h3 class="card-header">Lịch sử đặt phòng</h3>
        <div class="card-body">
            @foreach($danhsachdatphongs as $danhsachdatphong)
            <p>Phòng: {{ $danhsachdatphong->phongid }}</p>
            <p>Ngày bắt đầu ở: {{ $danhsachdatphong->ngaybatdauo }}</p>
            <p>Ngày kết thúc ở: {{ $danhsachdatphong->ngayketthuco }}</p>
            <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection