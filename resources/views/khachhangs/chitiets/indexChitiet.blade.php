<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Tên</th>
            <th>SĐT</th>
            <th>email</th>
            <th>Địa chỉ</th>
            <th>Văn bằng</th>
            <th>Giới tính</th>
            <th>Thuộc tài khoản-userid</th>
            <th>Chi tiết</th>
            <th>Chi tiết đặt phòng</th>
            @hasanyrole('MainAdmin|Admin')
                <th class="datatable-nosort">Action</th>
            @endhasanyrole
        </tr>
    </thead>
    <tbody>
        @foreach ($khachhangs as $khachhang)
            <tr>
                <td data-name='id:'>{{ $khachhang->id }}</td>
                <td data-name='Tên:'>{{ $khachhang->ten }}</td>
                <td data-name='SĐT:'>{{ $khachhang->sdt }}</td>
                <td data-name='Email:'>{{ $khachhang->email }}</td>
                <td data-name='Địa chỉ:'>{{ $khachhang->diachi }}</td>
                <td data-name='Văn bằng:'>{{ $khachhang->vanbang }}</td>
                <td data-name='Giới tính:'>{{ $khachhang->gioitinh }}</td>
                <td data-name='Điểm:'>{{ $khachhang->diem }}</td>
                {{-- <td data-name='Thuộc tài khoản-userid:'>{{ $khachhang->users->username ?? '' }}-{{ $khachhang->users->id ?? '' }}</td> --}}
                <td data-name='Chi tiết đặt phòng:'>
                    <a href="/khachhangs/datphongs/{{ $khachhang->id }}" class="badge bg-info" target="_blank">Chi tiết
                        các đặt phòng</a>
                </td>
                @hasanyrole('MainAdmin|Admin')
                    <td>
                        <div class="d-flex gap-1">
                            @include('khachhangs.modal.modalDatphong')
                            @include('khachhangs.edit')
                            @include('khachhangs.delete')
                        </div>
                    </td>
                @endhasanyrole
            </tr>
        @endforeach
    </tbody>
</table>
