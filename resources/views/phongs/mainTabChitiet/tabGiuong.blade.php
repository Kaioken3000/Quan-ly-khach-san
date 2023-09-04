<div class="d-flex">
    <div class="flex-grow-1">
        <h4 class="card-title">Thông tin chi tiết giường</h4>
    </div>
    <div>
        @foreach ($phongs as $phong)
            @hasanyrole('MainAdmin|Admin')
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
            @endhasanyrole
        @endforeach
    </div>
</div>
<table>
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
                <td>
                    <?php $i = 1; ?>
                    @foreach ($phong->giuongphongs as $giuongphong)
                        <li class="d-flex justify-content-between align-items-center">
                            <div class="row flex-grow-1">
                                <div class="col">
                                    <p> {{ $i }}. {{ $giuongphong->giuongs->ten }} </p>
                                </div>
                                <div class="col">
                                    <p>Giá: {{ $giuongphong->giuongs->gia }} VND</p>
                                </div>
                                <div class="col">
                                    <p>Kích thước: {{ $giuongphong->giuongs->kichthuoc }}
                                        {{ $giuongphong->giuongs->donvi }}</p>
                                </div>
                                <div class="col-1">
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
                                </div>
                            </div>
                        </li>
                        <?php $i++; ?>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
