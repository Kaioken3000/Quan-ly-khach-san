<div class="d-flex">
    <div class="flex-grow-1">
        <h4 class="card-title">Thông tin chi tiết miêu tả</h4>
    </div>
    <div>
        @foreach ($phongs as $phong)
            @hasrole('Admin')
                @isset(Auth::user()->nhanviens)
                    @foreach (Auth::user()->nhanviens as $nhanvien)
                        @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                            <span>
                                @include('phongs.modal.modalMieuta')
                            </span>
                        @endif
                    @endforeach
                @endisset
            @endhasrole
            @hasrole('MainAdmin')
                <span>
                    @include('phongs.modal.modalMieuta')
                </span>
            @endhasrole
        @endforeach
    </div>
</div>
<table>
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Nội dung</th>
            <th></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>
                    @foreach ($phong->mieutaphongs as $mieutaphong)
                        <div class="d-flex justify-content-between gap-1">
                            <div class="overflow-auto" style="height: 100px">
                                {!! $mieutaphong->mieutas->noidung !!}
                            </div>
                            @hasrole('Admin')
                                @isset(Auth::user()->nhanviens)
                                    @foreach (Auth::user()->nhanviens as $nhanvien)
                                        @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                                            <span>
                                                @include('phongs.modal.modalMieutaPhong')
                                            </span>
                                        @endif
                                    @endforeach
                                @endisset
                            @endhasrole
                            @hasrole('MainAdmin')
                                <span>
                                    @include('phongs.modal.modalMieutaPhong')
                                </span>
                            @endhasrole
                    @endforeach
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
