@extends('layouts3.app')

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('nhanviens.index') }}"> <i class="bx bx-chevron-left mb-1"></i> Back</a>
    </div>
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Nhân viên/</span> Edit</h4>
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <!-- Basic Layout -->
    <h5 class="mb-0">From nhập liệu</h5>
    <form action="{{ route('nhanviens.update', $nhanvien->ma) }}" method="POST" class="w-25">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="ma">Mã nhân viên</label>
            <input type="text" name="ma" class="form-control" id="ma" placeholder="VD: NV1" required
                value="{{ $nhanvien->ma }}" />
            @error('ma')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="ten">Tên nhân viên</label>
            <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Phòng VIP" required
                value="{{ $nhanvien->ten }}" />
            @error('ten')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="luong">Lương nhân viên</label>
            <input type="number" name="luong" class="form-control" id="luong" min=0 required
                value="{{ $nhanvien->luong }}" />
            @error('luong')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="chinhanh">Chi nhánh</label>
            <select class="form-control" id="chinhanhid" name="chinhanhid">
                @foreach ($chinhanhs as $chinhanh)
                    <option value="{{ $chinhanh->id }}"
                        @if (isset($nhanvien)) @if ($chinhanh->id === $nhanvien->chinhanhid)
                                selected @endif
                        @endif
                        >{{ $chinhanh->ten }}
                    </option>
                @endforeach
            </select>
            @error('chinhanh')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
@endsection
