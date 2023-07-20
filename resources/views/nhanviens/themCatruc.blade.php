@extends('layouts3.app')

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('nhanviens.index') }}"> <i class="bx bx-chevron-left mb-1"></i> Back</a>
    </div>
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Nhân viên/</span> Create</h4>
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <!-- Basic Layout -->
    <h5 class="mb-0">From nhập liệu</h5>
    <form action="{{ route('catruc_nhanviens.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $nhanvienid }}" id="nhanvienid" name="nhanvienid">
        <div class="mb-3">
            <label class="form-label" for="ngaybatdau">Ngày bắt đầu</label><br>
            <input class="form-control" type="date" id="ngaybatdau" name="ngaybatdau">

            <label class="form-label" for="ngayketthuc">Ngày kết thúc</label><br>
            <input class="form-control" type="date" id="ngayketthuc" name="ngayketthuc">

            <hr>
            <label class="form-label" for="ten">Ca trực</label><br>
            @foreach ($catrucs as $catruc)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="catruc{{ $catruc->id }}" name="catrucid[]"
                        value="{{ $catruc->id }}">
                    <label class="form-check-label" for="catruc{{ $catruc->id }}">
                        {{ $catruc->ten }}:
                    </label>
                    <label class="form-check-label" for="catruc{{ $catruc->id }}">
                        {{ $catruc->giobatdau }} - {{ $catruc->gioketthuc }}
                    </label>
                </div>
            @endforeach
            @error('ten')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Xác nhận
        </button>
    </form>
@endsection
