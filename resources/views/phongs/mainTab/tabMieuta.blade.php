<table class="table">
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Nội dung</th>
            <th></th>
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
                    @foreach ($phong->mieutaphongs as $mieutaphong)
                        <div class="d-flex justify-content-between gap-1">
                            {!! $mieutaphong->mieutas->noidung !!}
                            <div>
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
                </td>
                <td>{{ $phong->chinhanhs->ten }}</td>
                <td>
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
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
