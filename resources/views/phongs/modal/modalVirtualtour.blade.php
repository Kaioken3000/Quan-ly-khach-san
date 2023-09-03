<div class="">
    <button type="button" class="btn btn-success" data-bs-toggle="modal"
        data-bs-target="#modalThemVirtualtour{{ $phong->so_phong }}">
        <i class="fa fa-plus"></i> Thêm hình virtual tour
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="modalThemVirtualtour{{ $phong->so_phong }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalThemVirtualtour">Chọn hình virtual tour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('virtualtour_phong.store') }}" method="POST">
                @csrf
                <input hidden type="text" value="{{ $phong->so_phong }}" id="phongid" name="phongid">
                <div class="modal-body">
                    <div class="row m-2">
                        @foreach ($virtualtours as $virtualtour)
                            <div class="form-check col-3">
                                <input class="form-check-input" type="checkbox"
                                    id="virtualtour{{ $virtualtour->id }}{{ $phong->so_phong }}" name="virtualtourid[]"
                                    value="{{ $virtualtour->id }}">
                                <label class="form-check-label"
                                    for="virtualtour{{ $virtualtour->id }}{{ $phong->so_phong }}">
                                    <div class="card p-0 m-0">
                                        <p class="card-header">{{ $virtualtour->hinh }}</p>
                                        <img class="img-fluid rounded " style="object-fit: cover;"
                                            src="/client/images/{{ $virtualtour->hinh }}">
                                        <a href="/virtualtours-showpreview/{{ $virtualtour->id }}" target="_blank"
                                            class="badge bg-primary mt-3 py-3">Xem chi tiết</a>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                        @error('virtualtourid')
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
