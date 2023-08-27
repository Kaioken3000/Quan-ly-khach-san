<div class="d-flex">
    <div class="flex-grow-1 mt-2">
        <h4 class="card-title">Thông tin chi tiết chi nhánh</h4>
    </div>
    <div>
        @foreach ($chinhanhs as $chinhanh)
            <a href="{{ route('chinhanhs.edit', $chinhanh->id) }}" class="btn btn-link"><i class="fas fa-edit"></i></a>
            @include('chinhanhs.delete')
        @endforeach
    </div>
</div>
<table>
    <thead>
        <tr>
            <th class="table-plus">Mã chi nhánh</th>
            <th>Chi tiết</th>
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
                <td data-name='Chi tiết:'>{{ $chinhanh->id }}</td>
                <td data-name='Tên chi nhánh:'>{{ $chinhanh->ten }}</td>
                <td data-name='Số lượng (phòng): '>{{ $chinhanh->soluong }}</td>
                <td data-name='Thành phố: '>{{ $chinhanh->thanhpho }}</td>
                <td data-name='Quận:'>{{ $chinhanh->quan }}</td>
                <td data-name='Số điện thoại:'>{{ $chinhanh->sdt }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
