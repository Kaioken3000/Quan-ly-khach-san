<table class="table fs--1">
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Hình</th>
            <th></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>
                    @foreach ($phong->hinhphongs as $hinhphong)
                        <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                            title="{{ $hinhphong->hinhs->vitri }}" src="/client/images/{{ $hinhphong->hinhs->vitri }}"
                            class="img-fluid rounded " style="max-width: 200px">
                        @hasrole('Admin')
                            @isset(Auth::user()->nhanviens)
                                @foreach (Auth::user()->nhanviens as $nhanvien)
                                    @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                                        <span>
                                            @include('phongs.modal.modalHinhPhong')
                                        </span>
                                    @endif
                                @endforeach
                            @endisset
                        @endhasrole
                        @hasrole('MainAdmin')
                            <span>
                                @include('phongs.modal.modalHinhPhong')
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
                                        @include('phongs.modal.modalHinh')
                                    </span>
                                @endif
                            @endforeach
                        @endisset
                    @endhasrole
                    @hasrole('MainAdmin')
                        <span>
                            @include('phongs.modal.modalHinh')
                        </span>
                    @endhasrole
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Phòng</th>
            <th>Hình</th>
            <th></th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
