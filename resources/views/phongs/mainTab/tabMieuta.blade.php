<table class="table">
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Nội dung</th>
            @hasrole('Admin')
                <th>Action</th>
            @endhasrole
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>
                    @foreach ($phong->mieutaphongs as $mieutaphong)
                        <?php $mieuta = App\Models\Mieuta::where('id', $mieutaphong->mieutaid)->first(); ?>
                        <div class="d-flex justify-content-between gap-1">
                            {!! $mieuta->noidung !!}
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#mieutaphongxoa{{ $mieutaphong->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="mieutaphongxoa{{ $mieutaphong->id }}" tabindex="-1"
                            aria-labelledby="mieutaphongxoa{{ $mieutaphong->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Mieutaphongxoa{{ $mieutaphong->id }}Label">
                                            Bạn có chắc
                                            chắn muốn xoá</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('mieuta_phong.destroy', $mieutaphong->id) }}"
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
                    @include('phongs.modal.modalMieuta')
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
