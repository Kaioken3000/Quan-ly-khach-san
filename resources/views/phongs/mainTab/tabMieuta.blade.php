<table class="table fs--1">
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
                <td>{{ $phong->so_phong }}</td>
                <td>
                    @foreach ($phong->mieutaphongs as $mieutaphong)
                        <div class="d-flex justify-content-between gap-1">
                            <div class="overflow-auto" style="height: 200px">
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
                    @endforeach
                    @hasrole('MainAdmin')
                        <span>
                            @include('phongs.modal.modalMieutaPhong')
                        </span>
                    @endhasrole

                    </div>
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
    <tfoot>
        <tr>
            <th>Phòng</th>
            <th>Nội dung</th>
            <th></th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
