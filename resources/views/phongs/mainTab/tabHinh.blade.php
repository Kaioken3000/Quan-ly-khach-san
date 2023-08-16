<table class="table">
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Hình</th>
            @hasanyrole('MainAdmin|Admin')
                <th>Action</th>
            @endhasanyrole
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>
                    @foreach ($phong->hinhphongs as $hinhphong)
                        <?php $hinh = App\Models\Hinh::where('id', $hinhphong->hinhid)->first(); ?>
                        <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                            title="{{ $hinh->vitri }}" src="/client/images/{{ $hinh->vitri }}" class="img-fluid"
                            style="max-width: 200px">
                        <!-- Button trigger modal -->
                        <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                            data-bs-target="#hinhphongxoa{{ $hinhphong->id }}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="hinhphongxoa{{ $hinhphong->id }}" tabindex="-1"
                            aria-labelledby="hinhphongxoa{{ $hinhphong->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Hinhphongxoa{{ $hinhphong->id }}Label">
                                            Bạn có chắc
                                            chắn muốn xoá</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('hinh_phong.destroy', $hinhphong->id) }}" method="Post">
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
                    @include('phongs.modal.modalHinh')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
