<table class="table">
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
                <td>{{ $phong->so_phong }} </td>
                <td>{{ $phong->loaiphongs->ten }}</td>
                <td>{{ $phong->chinhanhs->ten ?? '' }}</td>
                <td><a href="/phongs/roomDetail/{{ $phong->so_phong }}" class="badge bg-primary" target="_blank">Chi
                        tiết</a></td>
                <td>
                    @foreach ($phong->thietbis as $thietbi)
                        <p>{{ $thietbi->ten ?? '' }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach ($phong->giuongs as $giuong)
                        <p>{{ $giuong->ten ?? '' }}</p>
                    @endforeach
                </td>
                <td style="width: 400px">
                    <div class="overflow-auto" style="height: 200px">
                        @foreach ($phong->mieutas as $mieuta)
                            <p>{!! $mieuta->noidung ?? '' !!}</p>
                        @endforeach
                    </div>
                </td>
                <td>
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
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Loại phòng</th>
            <th>Chi nhánh</th>
            <th></th>
            <th>Thiết bị</th>
            <th>Giừơng</th>
            <th>Miêu tả</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </tfoot>
</table>
