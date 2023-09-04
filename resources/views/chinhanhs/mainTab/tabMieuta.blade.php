<table class="table">
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Nội dung</th>
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
                    @foreach ($chinhanh->mieutachinhanhs as $mieutachinhanh)
                        <?php $mieuta = App\Models\Mieuta::where('id', $mieutachinhanh->mieutaid)->first(); ?>
                        <div class="d-flex justify-content-between gap-1">
                            {!! $mieuta->noidung !!}
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#mieutachinhanhxoa{{ $mieutachinhanh->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="mieutachinhanhxoa{{ $mieutachinhanh->id }}" tabindex="-1"
                            aria-labelledby="mieutachinhanhxoa{{ $mieutachinhanh->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Mieutachinhanhxoa{{ $mieutachinhanh->id }}Label">
                                            Bạn có chắc
                                            chắn muốn xoá</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('mieuta_chinhanh.destroy', $mieutachinhanh->id) }}"
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
                                    <input hidden type="text" value="{{ $chinhanh->id }}" id="chinhanhid"
                                        name="chinhanhid">
                                    <div class="modal-body">
                                        <div class="row m-2">
                                            @foreach ($mieutas as $mieuta)
                                                <div class="form-check col-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="mieuta{{ $mieuta->id }}{{ $chinhanh->id }}"
                                                        name="mieutaid[]" value="{{ $mieuta->id }}">
                                                    <label class="form-check-label"
                                                        for="mieuta{{ $mieuta->id }}{{ $chinhanh->id }}">
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
            <th>Phòng</th>
            <th>Nội dung</th>
            @hasanyrole('MainAdmin|Admin')
                <th>Action</th>
            @endhasanyrole
        </tr>
    </tfoot>
</table>
