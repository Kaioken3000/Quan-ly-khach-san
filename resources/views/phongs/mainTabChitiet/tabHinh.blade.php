<div class="d-flex">
    <div class="flex-grow-1">
        <h4 class="card-title">Thông tin chi tiết hình</h4>
    </div>
    <div>
        @foreach ($phongs as $phong)
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
        @endforeach
    </div>
</div>
<table>
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
                <td style="width: 100%">
                    <div class="row">
                        @foreach ($phong->hinhphongs as $hinhphong)
                            <div class="mb-1 col-4">
                                <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                    title="{{ $hinhphong->hinhs->vitri }}" src="/client/images/{{ $hinhphong->hinhs->vitri }}"
                                    class="img-fluid" style="max-width: 180px">
                                <div class="d-flex">
                                    <p class="flex-grow-1">{{ $hinhphong->hinhs->vitri }}</p>
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
