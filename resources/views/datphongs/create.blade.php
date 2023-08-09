@extends('layouts3.app')

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('datphongs.index') }}"><i class="bx bx-chevron-left mb-1"></i> Back</a>
    </div>
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Đặt phòng/</span> Create</h4>
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <!-- Basic Layout -->
    {{-- <h5 class="mb-0">From nhập liệu</h5> --}}
    <form action="/datphongs-kiemtra" method="GET" class="w-25">
        <div class="mb-3">
            <label class="form-label" for="ngaydat">Ngày vào</label>
            <input type="date" name="ngaydat" class="form-control" id="ngaydat" />
            @error('ngaydat')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="ngaytra">Ngày ra</label>
            <input type="date" name="ngaytra" class="form-control" id="ngaytra" />
            @error('ngaytra')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="soluong">Số lượng</label>
            <input type="number" name="soluong" class="form-control" id="soluong" value="1"/>
            @error('soluong')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <input type="hidden" name="tinhtrangthanhtoan" value=0>
        <input type="hidden" name="tinhtrangnhanphong" value=0>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
@endsection
