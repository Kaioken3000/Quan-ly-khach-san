<div class="">
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
        data-bs-target="#modalanuong{{ $datphong->id }}">
        <i class="fa fa-utensils"></i> ăn uống
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="modalanuong{{ $datphong->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAnuong">Chọn dịch vụ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('anuong_datphong.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input hidden type="text" value="{{ $datphong->id }}" id="datphongid" name="datphongid">
                    <div class="row m-2">
                        @foreach ($anuongs as $anuong)
                            <div class="form-check col-4">
                                <input class="form-check-input" type="checkbox" id="anuong{{ $anuong->id }}{{$datphong->id}}"
                                    name="anuongid[]" value="{{ $anuong->id }}">
                                <label class="form-check-label" for="anuong{{ $anuong->id }}{{$datphong->id}}">
                                    <div class="card form-check-label" style="max-width:32rem;">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex">
                                                <img class="img-fluid rounded " style="object-fit: cover;"
                                                    src="/client/images/{{ $anuong->hinh }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{ $anuong->ten }}</h4>
                                                    <p class="card-text">{{ $anuong->gia }} VND</p>
                                                    <p class="card-text"> <small
                                                            class="text-muted">{{ $anuong->mieuTa }}</small></p>
                                                    <div class="w-50">
                                                        <input class="form-control" type="number"
                                                            id="soluong{{ $anuong->id }}" name="soluong[]"
                                                            min="1" max="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <input type="text" name="khachhangid" hidden value="{{ $datphong->khachhangs->id }}">
                            </div>
                        @endforeach
                        @error('anuongid')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        @error('datphongid')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        @error('soluong')
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
