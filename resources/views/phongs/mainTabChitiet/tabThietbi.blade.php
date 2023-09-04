<div class="d-flex">
    <div class="flex-grow-1">
        <h4 class="card-title">Thông tin chi tiết thiết bị</h4>
    </div>
    <div>
        @foreach ($phongs as $phong)
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
        @endforeach
    </div>
</div>
<table>
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
                <td data-name='Thiết bị'>
                    <?php $i = 1; ?>
                    @foreach ($phong->thietbis as $thietbi)
                        <li class="list-group-items d-flex justify-content-between align-items-center">
                            {{ $i }}.
                            <div class="row flex-grow-1 mx-1">
                                <div class="col">{{ $thietbi->ten ?? '' }}</div>
                                <div class="col"> Giá: {{ $thietbi->gia ?? '' }} VND </div>
                            </div>
                            @foreach ($phong->thietbiphongs as $thietbiphong)
                                @if ($thietbiphong->thietbiid == $thietbi->id)
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
                                @endif
                            @endforeach
                        </li>
                        <?php $i++; ?>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
