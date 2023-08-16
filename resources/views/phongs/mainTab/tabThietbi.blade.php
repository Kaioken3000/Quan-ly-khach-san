<table class="table">
    <thead>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Thiết bị</th>
            <th>Giá thiết bị</th>
            <th>Ghi chú</th>
            @hasanyrole('MainAdmin|Admin')
                <th class="datatable-nosort">Action</th>
            @endhasanyrole
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->thietbiphongs as $thietbiphong)
                            <?php $thietbi = App\Models\Thietbi::where('id', $thietbiphong->thietbiid)->first();
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $thietbi->ten }}
                                <span class="badge badge-light-primary rounded-pill">Tình trạng</span>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->thietbiphongs as $thietbiphong)
                            <?php $thietbi = App\Models\Thietbi::where('id', $thietbiphong->thietbiid)->first();
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $thietbi->gia }} VND
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->thietbiphongs as $thietbiphong)
                            <?php $thietbi = App\Models\Thietbi::where('id', $thietbiphong->thietbiid)->first();
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $thietbi->mieuTa }}
                                <span>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                        data-bs-target="#thietbiphongxoa{{ $thietbiphong->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="thietbiphongxoa{{ $thietbiphong->id }}" tabindex="-1"
                                        aria-labelledby="thietbiphongxoa{{ $thietbiphong->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="Thietbiphongxoa{{ $thietbiphong->id }}Label">
                                                        Bạn có chắc
                                                        chắn muốn xoá</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <form
                                                        action="{{ route('thietbi_phong.destroy', $thietbiphong->id) }}"
                                                        method="Post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"> Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </td>
                @hasanyrole('MainAdmin|Admin')
                    <td>
                        @include('phongs.modal.modalThietbi')
                    </td>
                @endhasanyrole
            </tr>
        @endforeach
    </tbody>
</table>
