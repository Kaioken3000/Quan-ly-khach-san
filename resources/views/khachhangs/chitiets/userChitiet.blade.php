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
                <td data-name='id:'>{{ $khachhang->users->id }}</td>
                <td data-name='Username:'>{{ $khachhang->users->username }}</td>
                <td data-name='SĐT:'>{{ $khachhang->users->sdt }}</td>
                <td data-name='Email:'>{{ $khachhang->users->email }}</td>
                <td data-name='Địa chỉ:'>{{ $khachhang->users->diachi }}</td>
                <td data-name='Văn bằng:'>{{ $khachhang->users->vanbang }}</td>
                <td data-name='Giới tính:'>{{ $khachhang->users->gioitinh }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
