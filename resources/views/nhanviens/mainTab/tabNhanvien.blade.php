<table class="table fs--1">
    <thead>
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Chi nhánh hoạt động</th>
            <th>Lương </th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nhanviens as $nhanvien)
            <tr>
                <td>{{ $nhanvien->ma }}</td>
                <td>{{ $nhanvien->ten }}</td>
                <td>
                    {{ $nhanvien->chinhanhs->ten ?? '' }}
                </td>
                <td>{{ $nhanvien->luong }} VND</td>
                <td>
                    <form action="{{ route('nhanviens.destroy', $nhanvien->ma) }}" method="Post" class="d-flex">
                        <a class="btn btn-link" href="{{ route('nhanviens.edit', $nhanvien->ma) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link" style="color:red">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
        <td>
            {!! $nhanviens->links("pagination::bootstrap-4") !!}
        </td>
    </tr> --}}
    </tbody>
</table>
