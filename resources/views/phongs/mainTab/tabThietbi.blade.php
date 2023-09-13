<table class="table">
    <thead>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Thiết bị</th>
            <th></th>
            <th>Giá thiết bị (VND)</th>
            <th>Ghi chú</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->thietbis as $thietbi)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $thietbi->ten ?? '' }}
                                {{-- <span class="badge badge-light-primary rounded-pill">Tình trạng</span> --}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $phong->chinhanhs->ten }}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->thietbis as $thietbi)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ number_format($thietbi->gia, 0, '', '.') ?? ''}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($phong->thietbiphongs as $thietbiphong)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $thietbiphong->thietbis->mieuTa }}
                                @hasrole('Admin')
                                    @isset(Auth::user()->nhanviens)
                                        @foreach (Auth::user()->nhanviens as $nhanvien)
                                            @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                                                <span>
                                                    @include('phongs.modal.modalThietbiPhong')
                                                </span>
                                            @endif
                                        @endforeach
                                    @endisset
                                @endhasrole
                                @hasrole('MainAdmin')
                                    <span>
                                        @include('phongs.modal.modalThietbiPhong')
                                    </span>
                                @endhasrole
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @hasanyrole('MainAdmin|Admin')
                        @hasrole('Admin')
                            @isset(Auth::user()->nhanviens)
                                @foreach (Auth::user()->nhanviens as $nhanvien)
                                    @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                                        <span>
                                            @include('phongs.modal.modalThietbi')
                                        </span>
                                    @endif
                                @endforeach
                            @endisset
                        @endhasrole
                        @hasrole('MainAdmin')
                            <span>
                                @include('phongs.modal.modalThietbi')
                            </span>
                        @endhasrole
                    @endhasanyrole
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Thiết bị</th>
            <th></th>
            <th>Giá thiết bị (VND)</th>
            <th>Ghi chú</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </tfoot>
</table>
