<table class="table fs--1">
    <thead>
        <tr>
            <th class="table-plus">Mã chi nhánh</th>
            {{-- <th>Chi tiết</th> --}}
            <th>Tên chi nhánh</th>
            <th>Số lượng (phòng) </th>
            <th>Thành phố</th>
            <th>Quận</th>
            <th>Số điện thoại</th>
            @hasanyrole('MainAdmin|Admin')
                <th class="datatable-nosort">Action</th>
            @endhasanyrole
        </tr>
    </thead>
    <tbody>
        @foreach ($chinhanhs as $chinhanh)
            <tr>
                <td>{{ $chinhanh->id }}</td>
                {{-- <td>
                    <a href="/chinhanhs/chitiet/{{ $chinhanh->id }}" class="badge bg-primary" target="_blank">Chi tiết <i
                            class="fas fa-eye"></i></a>
                </td> --}}
                <td>
                    <a href="/chinhanhs/chitiet/{{ $chinhanh->id }}" target="_blank">{{ $chinhanh->ten }}</a>
                </td>
                <td>{{ $chinhanh->soluong }}</td>
                <td>{{ $chinhanh->thanhpho }}</td>
                <td>{{ $chinhanh->quan }}</td>
                <td>{{ $chinhanh->sdt }}</td>
                @hasanyrole('MainAdmin|Admin')
                    <td>
                        {{-- @include('chinhanhs.edit') --}}
                        <a href="{{ route('chinhanhs.edit', $chinhanh->id) }}" class="btn btn-link"><i
                                class="fas fa-edit"></i></a>
                        @include('chinhanhs.delete')
                    </td>
                @endhasanyrole
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="table-plus">Mã chi nhánh</th>
            {{-- <th>Chi tiết</th> --}}
            <th>Tên chi nhánh</th>
            <th>Số lượng (phòng) </th>
            <th>Thành phố</th>
            <th>Quận</th>
            <th>Số điện thoại</th>
            @hasanyrole('MainAdmin|Admin')
                <th class="datatable-nosort">Action</th>
            @endhasanyrole
        </tr>
    </tfoot>
</table>
