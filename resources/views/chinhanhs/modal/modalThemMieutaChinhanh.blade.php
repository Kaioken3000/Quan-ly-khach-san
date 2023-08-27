<div class="">
    <button type="button" class="btn btn-success" data-bs-toggle="modal"
        data-bs-target="#modalThemMieuta{{ $chinhanh->id }}">
        <i class="fa fa-plus"></i> Thêm miêu tả
    </button>
</div>
<!-- Modal dịch vụ -->
<div class="modal fade" id="modalThemMieuta{{ $chinhanh->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalThemMieuta">Chọn miêu tả</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('mieuta_chinhanh.store') }}" method="POST">
                @csrf
                <input hidden type="text" value="{{ $chinhanh->id }}" id="chinhanhid" name="chinhanhid">
                <div class="modal-body">
                    <div class="row m-2">
                        @foreach ($mieutas as $mieuta)
                            <div class="form-check col-3">
                                <input class="form-check-input" type="checkbox"
                                    id="mieuta{{ $mieuta->id }}{{ $chinhanh->id }}" name="mieutaid[]"
                                    value="{{ $mieuta->id }}">
                                <label class="form-check-label" for="mieuta{{ $mieuta->id }}{{ $chinhanh->id }}">
                                    {!! $mieuta->noidung !!}
                                </label>
                            </div>
                        @endforeach
                        @error('mieutaid')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                        @error('chinhanhid')
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
