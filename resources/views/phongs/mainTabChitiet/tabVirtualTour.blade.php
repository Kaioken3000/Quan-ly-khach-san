<div class="d-flex">
    <div class="flex-grow-1">
        <h4 class="card-title">Thông tin chi tiết virtual tour</h4>
    </div>
    <div>
        @foreach ($phongs as $phong)
            @hasrole('Admin')
                @isset(Auth::user()->nhanviens)
                    @foreach (Auth::user()->nhanviens as $nhanvien)
                        @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                            <span>
                                @include('phongs.modal.modalVirtualtour')
                            </span>
                        @endif
                    @endforeach
                @endisset
            @endhasrole
            @hasrole('MainAdmin')
                <span>
                    @include('phongs.modal.modalVirtualtour')
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
                <td>
                    @foreach ($phong->virtualtourphongs as $virtualtourphong)
                        <p>{{ $virtualtourphong->virtualtours->hinh }}</p>
                        <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                            title="{{ $virtualtourphong->virtualtours->hinh ?? '' }}"
                            src="/client/images/{{ $virtualtourphong->virtualtours->hinh ?? '' }}" class="img-fluid"
                            style="max-width: 200px">
                        <a href="/virtualtours-showpreview/{{ $virtualtourphong->virtualtours->id }}" target="_blank"
                            class="badge bg-primary">Xem chi tiết</a>
                        <span>
                            @include('phongs.modal.modalVirtualtourPhong')
                        </span>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
