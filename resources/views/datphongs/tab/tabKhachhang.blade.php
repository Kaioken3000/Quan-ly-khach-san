<table class="table">
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
                <td>{{ $datphong->id }}</td>
                <td>{{ $datphong->khachhangs->id }}</td>
                <td><p>{{ $datphong->phongs[count($datphong->phongs) - 1]->chinhanhs->ten }}</p></td>
                <td>{{ $datphong->khachhangs->ten }}</td>
                <td>{{ $datphong->khachhangs->sdt }}</td>
                <td>{{ $datphong->khachhangs->email }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Phòng</th>
            <th>Khách hàng Id</th>
            <th>Chi nhánh</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
        </tr>
    </tfoot>
</table>
<style>
    .card,
    hr {
        border: 1px black solid;
    }
</style>
