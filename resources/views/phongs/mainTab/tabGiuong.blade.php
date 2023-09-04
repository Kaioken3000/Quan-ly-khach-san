<table class="table fs--1">
    <thead>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Giường</th>
            <th></th>
            <th>Giá giường</th>
            <th>Kích thước</th>
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
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuongphong->giuongs->ten }}
                                <span class="badge badge-light-primary rounded-pill">Tình trạng</span>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $phong->chinhanhs->ten }}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuongphong->giuongs->gia }} VND
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuongphong->giuongs->kichthuoc }} {{ $giuongphong->giuongs->donvi }}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->giuongphongs as $giuongphong)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $giuongphong->giuongs->mieuTa }}
                                @hasrole('Admin')
                                    @isset(Auth::user()->nhanviens)
                                        @foreach (Auth::user()->nhanviens as $nhanvien)
                                            @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                                                <span>
                                                    @include('phongs.modal.modalGiuongPhong')
                                                </span>
                                            @endif
                                        @endforeach
                                    @endisset
                                @endhasrole
                                @hasrole('MainAdmin')
                                    <span>
                                        @include('phongs.modal.modalGiuongPhong')
                                    </span>
                                @endhasrole

                            </li>
                        @endforeach
                    </ul>
                </td>
                @hasanyrole('MainAdmin|Admin')
                    <td>
                        @hasrole('Admin')
                            @isset(Auth::user()->nhanviens)
                                @foreach (Auth::user()->nhanviens as $nhanvien)
                                    @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                                        <span>
                                            @include('phongs.modal.modalGiuong')
                                        </span>
                                    @endif
                                @endforeach
                            @endisset
                        @endhasrole
                        @hasrole('MainAdmin')
                            <span>
                                @include('phongs.modal.modalGiuong')
                            </span>
                        @endhasrole

                    </td>
                @endhasanyrole
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Giường</th>
            <th></th>
            <th>Giá giường</th>
            <th>Kích thước</th>
            <th>Ghi chú</th>
            @hasanyrole('MainAdmin|Admin')
                <th class="datatable-nosort">Action</th>
            @endhasanyrole
        </tr>
    </tfoot>
</table>
