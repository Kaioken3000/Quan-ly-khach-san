<div class="">
    <button type="button" class="btn btn-success" data-bs-toggle="modal"
        data-bs-target="#ModalThemThietbi{{ $phong->so_phong }}">
        <i class="fa fa-plus"></i> Thêm thiết bị
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="ModalThemThietbi{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalThemThietbi">Chọn thiết bị</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('thietbi_phong.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input hidden type="text" value="{{ $phong->so_phong }}" id="phongid" name="phongid">
                    <div class="row m-2">
                        @foreach ($thietbis as $thietbi)
                            <div class="form-check col-4">
                                <input class="form-check-input" type="checkbox" id="thietbi{{ $thietbi->id }}{{$phong->so_phong}}"
                                    name="thietbiid[]" value="{{ $thietbi->id }}">
                                <label class="form-check-label" for="thietbi{{ $thietbi->id }}{{$phong->so_phong}}">
                                    <div class="card form-check-label" style="max-width:32rem;">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex">
                                                <img class="img-fluid" style="object-fit: cover;"
                                                    src="/client/images/{{ $thietbi->hinh }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{ $thietbi->ten }}</h4>
                                                    <p class="card-text">{{ $thietbi->gia }} VND</p>
                                                    <p class="card-text"> <small
                                                            class="text-muted">{{ $thietbi->mieuTa }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                        @error('thietbiid')
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
