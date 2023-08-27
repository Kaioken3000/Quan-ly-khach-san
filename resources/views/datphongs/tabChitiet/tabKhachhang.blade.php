<table>
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Khách hàng Id</th>
            <th>Chi nhánh</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datphongs as $datphong)
            <tr>
                <td data-name="Mã đặt phòng:">{{ $datphong->id }}</td>
                <td data-name="Khách hàng Id:">{{ $datphong->khachhangs->id }}</td>
                <td data-name="Chi nhánh:">{{ $datphong->phongs[count($datphong->phongs) - 1]->chinhanhs->ten }}</td>
                <td data-name="Tên:">{{ $datphong->khachhangs->ten }}</td>
                <td data-name="Số điện thoại:">{{ $datphong->khachhangs->sdt }}</td>
                <td data-name="Email: " class="d-flex">{{ $datphong->khachhangs->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    .card,
    hr {
        border: 1px black solid;
    }
</style>
