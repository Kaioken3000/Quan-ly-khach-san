<table class="table">
    <thead>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Giường</th>
            <th>Giá giường</th>
            <th>Kích thước</th>
            <th>Ghi chú</th>
            @hasrole('Admin')
                <th class="datatable-nosort">Action</th>
            @endhasrole
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <?php $giuong = App\Models\Giuong::where('id', $giuongphong->giuongid)->first();
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuong->ten }}
                                <span class="badge badge-light-primary rounded-pill">Tình trạng</span>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <?php $giuong = App\Models\Giuong::where('id', $giuongphong->giuongid)->first();
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuong->gia }} VND
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <?php $giuong = App\Models\Giuong::where('id', $giuongphong->giuongid)->first();
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuong->kichthuoc }} {{ $giuong->donvi }}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <?php $giuong = App\Models\Giuong::where('id', $giuongphong->giuongid)->first();
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuong->mieuTa }}
                                <span>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                        data-bs-target="#giuongphongxoa{{ $giuongphong->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="giuongphongxoa{{ $giuongphong->id }}" tabindex="-1"
                                        aria-labelledby="giuongphongxoa{{ $giuongphong->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="Giuongphongxoa{{ $giuongphong->id }}Label">
                                                        Bạn có chắc
                                                        chắn muốn xoá</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <form
                                                        action="{{ route('giuong_phong.destroy', $giuongphong->id) }}"
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
                @hasrole('Admin')
                    <td>
                        @include('phongs.modal.modalGiuong')
                    </td>
                @endhasrole
            </tr>
        @endforeach
    </tbody>
</table>
