<div class="">
    <button type="button" class="btn btn-success" data-bs-toggle="modal"
        data-bs-target="#modalThemHinh{{ $phong->so_phong }}">
        <i class="fa fa-plus"></i> Thêm hình
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="modalThemHinh{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalThemHinh">Chọn hình</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('hinh_phong.store') }}" method="POST">
                @csrf
                <input hidden type="text" value="{{ $phong->so_phong }}" id="phongid" name="phongid">
                <div class="modal-body">
                    <div class="row m-2">
                        @foreach ($hinhs as $hinh)
                            <div class="form-check col-3">
                                <input class="form-check-input" type="checkbox" id="hinh{{ $hinh->id }}{{$phong->so_phong}}"
                                    name="hinhid[]" value="{{ $hinh->id }}">
                                <label class="form-check-label" for="hinh{{ $hinh->id }}{{$phong->so_phong}}">
                                    <div class="card p-0 m-0">
                                        <img class="img-fluid" style="object-fit: cover;"
                                            src="/client/images/{{ $hinh->vitri }}">
                                    </div>
                                </label>
                            </div>
                        @endforeach
                        @error('hinhid')
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
