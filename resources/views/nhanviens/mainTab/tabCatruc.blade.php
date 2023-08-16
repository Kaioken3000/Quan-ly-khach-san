<table class="table">
    <thead>
        <tr>
            <th>Tên nhân viên</th>
            <th>Ca trực </th>
            <th>
                <div class="d-flex justify-content-between">
                    <p>Ngày bắt đầu</p>
                    <p>Ngày kết thúc</p>
                </div>
            </th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nhanviens as $nhanvien)
            <tr>
                <td>{{ $nhanvien->ten }} ({{ $nhanvien->ma }})</td>
                <td>
                    <ul class="list-group">
                        @foreach ($nhanvien->catrucs as $ca)
                            @foreach ($catrucs as $catruc)
                                @if ($catruc->id == $ca->catrucid)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $catruc->ten }}
                                        <span>
                                            <form action="{{ route('catruc_nhanviens.destroy', $ca->id) }}"method="Post">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit" class="badge badge-danger border-0"><i class="fa fa-times"></i></button> --}}
                                                <button type="submit" class="btn btn-link m-0" data-color="#e95959"
                                                    style="color:red;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </span>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($nhanvien->catrucs as $ca)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <p>
                                        {{ $ca->ngaybatdau }}
                                    </p>
                                    <p>
                                        {{ $ca->ngayketthuc }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a class="btn btn-link" href="/catruc_nhanvien/themCatruc/{{ $nhanvien->ma }}">
                        Thêm ca trực
                    </a>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
        <td>
            {!! $nhanviens->links("pagination::bootstrap-4") !!}
        </td>
    </tr> --}}
    </tbody>
</table>
