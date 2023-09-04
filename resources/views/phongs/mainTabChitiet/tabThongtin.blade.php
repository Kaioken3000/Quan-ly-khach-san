<div class="d-flex">
    <div class="flex-grow-1">
        <h4 class="card-title">Thông tin chi tiết phòng</h4>
    </div>
    <div>
        @foreach ($phongs as $phong)
            @hasrole('Admin')
                @isset(Auth::user()->nhanviens)
                    @foreach (Auth::user()->nhanviens as $nhanvien)
                        @if ($nhanvien->chinhanhs->id == $phong->chinhanhs->id)
                            <a href="{{ route('phongs.edit', $phong->so_phong) }}" class="btn btn-link"><i
                                    class="icon-copy fas fa-edit"></i></a>
                            @include('phongs.delete')
                        @endif
                    @endforeach
                @endisset
            @endhasrole
            @hasrole('MainAdmin')
                {{-- @include('phongs.edit') --}}
                <a href="{{ route('phongs.edit', $phong->so_phong) }}" class="btn btn-link"><i
                        class="icon-copy fas fa-edit"></i></a>
                @include('phongs.delete')
            @endhasrole
        @endforeach
    </div>
</div>
<table>
    <thead>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Loại phòng</th>
            <th>Chi nhánh</th>
            <th>Chi tiết</th>
            <th>Thiết bị</th>
            <th>Giừơng</th>
            <th>Miêu tả</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td data-name='Số phòng: '>{{ $phong->so_phong }} </td>
                <td data-name='Loại phòng: '>{{ $phong->loaiphongs->ten }}</td>
                <td data-name='Chi nhánh'>{{ $phong->chinhanhs->ten ?? '' }}</td>
                <td data-name='Thiết bị' class="d-flex align-items-start">
                    <ol class="list-group mx-3">
                        @foreach ($phong->thietbis as $thietbi)
                            <li>{{ $thietbi->ten ?? '' }}</li>
                        @endforeach
                    </ol>
                </td>
                <td data-name='Giừơng' class="d-flex align-items-start">
                    <ol class="list-group mx-3">
                        @foreach ($phong->giuongs as $giuong)
                            <li>{{ $giuong->ten ?? '' }}</li>
                        @endforeach
                    </ol>
                </td>
                <td data-name='Miêu tả' style="width: 400px">
                    <div class="overflow-auto" style="height: 200px">
                        @foreach ($phong->mieutas as $mieuta)
                            {!! $mieuta->noidung ?? '' !!}
                        @endforeach
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
