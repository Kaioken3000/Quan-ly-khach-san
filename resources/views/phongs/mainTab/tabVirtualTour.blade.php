<table class="table">
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Hình</th>
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
                <td>{{ $phong->chinhanhs->ten }}</td>
                <td>
                    <span>
                        @include('phongs.modal.modalVirtualtour')
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
