<table class="table">
    <thead>
        <tr>
            <th class="table-plus">Mã chi nhánh</th>
            <th>Tên chi nhánh</th>
            <th>Số lượng (phòng) </th>
            <th>Thành phố</th>
            <th>Quận</th>
            <th>Số điện thoại</th>
            @hasrole('Admin')
                <th class="datatable-nosort">Action</th>
            @endhasrole
        </tr>
    </thead>
    <tbody>
        @foreach ($chinhanhs as $chinhanh)
            <tr>
                <td>{{ $chinhanh->id }}</td>
                <td>{{ $chinhanh->ten }}</td>
                <td>{{ $chinhanh->soluong }}</td>
                <td>{{ $chinhanh->thanhpho }}</td>
                <td>{{ $chinhanh->quan }}</td>
                <td>{{ $chinhanh->sdt }}</td>
                @hasrole('Admin')
                    <td>
                        {{-- @include('chinhanhs.edit') --}}
                        <a href="{{ route('chinhanhs.edit', $chinhanh->id) }}" class="btn btn-link"><i
                                class="fas fa-edit"></i></a>
                        @include('chinhanhs.delete')
                    </td>
                @endhasrole
            </tr>
        @endforeach
    </tbody>
</table>