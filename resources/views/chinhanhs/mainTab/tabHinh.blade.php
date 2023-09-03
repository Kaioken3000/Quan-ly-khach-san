<table class="table">
    <thead>
        <tr>
            <th>Chi nhánh</th>
            <th>Hình</th>
            @hasanyrole('MainAdmin|Admin')
                <th>Action</th>
            @endhasanyrole
        </tr>
    </thead>
    <tbody>
        @foreach ($chinhanhs as $chinhanh)
            <tr>
                <td>{{ $chinhanh->id }}</td>
                <td>
                    @foreach ($chinhanh->hinhchinhanhs as $hinhchinhanh)
                        <?php $hinh = App\Models\Hinh::where('id', $hinhchinhanh->hinhid)->first(); ?>
                        <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                            title="{{ $hinh->vitri }}" src="/client/images/{{ $hinh->vitri }}" class="img-fluid rounded "
                            style="max-width: 200px">
                        <!-- Button trigger modal -->
                        <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                            data-bs-target="#hinhchinhanhxoa{{ $hinhchinhanh->id }}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="hinhchinhanhxoa{{ $hinhchinhanh->id }}" tabindex="-1"
                            aria-labelledby="hinhchinhanhxoa{{ $hinhchinhanh->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Hinhchinhanhxoa{{ $hinhchinhanh->id }}Label">
                                            Bạn có chắc
                                            chắn muốn xoá</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('hinh_chinhanh.destroy', $hinhchinhanh->id) }}"
                                            method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </td>
                <td>
                    <div class="">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalThemHinh{{ $chinhanh->id }}">
                            <i class="fa fa-plus"></i> Thêm hình
                        </button>
                    </div>
                    <!-- Modal dịch vụ -->
                    <div class="modal fade" id="modalThemHinh{{ $chinhanh->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalThemHinh">Chọn hình</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                    </button>
                                </div>
                                <form action="{{ route('hinh_chinhanh.store') }}" method="POST">
                                    @csrf
                                    <input hidden type="text" value="{{ $chinhanh->id }}" id="chinhanhid"
                                        name="chinhanhid">
                                    <div class="modal-body">
                                        <div class="row m-2">
                                            @foreach ($hinhs as $hinh)
                                                <div class="form-check col-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="hinh{{ $hinh->id }}{{ $chinhanh->id }}"
                                                        name="hinhid[]" value="{{ $hinh->id }}">
                                                    <label class="form-check-label"
                                                        for="hinh{{ $hinh->id }}{{ $chinhanh->id }}">
                                                        <div class="card p-0 m-0">
                                                            <img class="img-fluid rounded " style="object-fit: cover;"
                                                                src="/client/images/{{ $hinh->vitri }}">
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                            @error('hinhid')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}</div>
                                            @enderror
                                            @error('chinhanhid')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">
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

                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Chi nhánh</th>
            <th>Hình</th>
            @hasanyrole('MainAdmin|Admin')
                <th>Action</th>
            @endhasanyrole
        </tr>
    </tfoot>
</table>
