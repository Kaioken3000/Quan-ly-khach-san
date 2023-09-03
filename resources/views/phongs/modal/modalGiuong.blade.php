<div class="">
    <button type="button" class="btn btn-success" data-bs-toggle="modal"
        data-bs-target="#ModalThemGiuong{{ $phong->so_phong }}">
        <i class="fa fa-plus"></i> Thêm giường
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="ModalThemGiuong{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalThemGiuong">Chọn giường</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('giuong_phong.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input hidden type="text" value="{{ $phong->so_phong }}" id="phongid" name="phongid">
                    <div class="row m-2">
                        @foreach ($giuongs as $giuong)
                            <div class="form-check col-4">
                                <input class="form-check-input" type="checkbox" id="giuong{{ $giuong->id }}{{$phong->so_phong}}"
                                    name="giuongid[]" value="{{ $giuong->id }}">
                                <label class="form-check-label" for="giuong{{ $giuong->id }}{{$phong->so_phong}}">
                                    <div class="card form-check-label" style="max-width:32rem;">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex">
                                                <img class="img-fluid rounded " style="object-fit: cover;"
                                                    src="/client/images/{{ $giuong->hinh }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{ $giuong->ten }}</h4>
                                                    <p class="card-text">{{ $giuong->gia }} VND</p>
                                                    <p class="card-text"> <small
                                                            class="text-muted">{{ $giuong->mieuTa }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                        @error('giuongid')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        @error('phongid')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .modal-lg {
        max-width: 90%;
    }

    .card:hover {}

    .form-check-input:checked+label>.card {
        border: 3px black solid;
    }
</style>
