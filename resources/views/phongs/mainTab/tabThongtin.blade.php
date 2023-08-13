<table class="table">
    <thead>
        <tr>
            <th class="table-plus">Số phòng</th>
            <th>Loại phòng</th>
            <th>Thiết bị</th>
            <th>Giừơng</th>
            <th>Miêu tả</th>
            @hasrole('Admin')
                <th class="datatable-nosort">Action</th>
            @endhasrole
        </tr>
    </thead>
    <tbody>
        @foreach ($phongs as $phong)
            <tr>
                <td>{{ $phong->so_phong }}</td>
                <td>{{ $phong->loaiphongs->ten }}</td>
                <td>
                    @foreach ($phong->thietbiphongs as $thietbiphong)
                        <?php $thietbi = App\Models\Thietbi::where('id', $thietbiphong->thietbiid)->first();
                        ?>
                        <p>{{ $thietbi->ten }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach ($phong->giuongphongs as $giuongphong)
                        <?php $giuong = App\Models\Giuong::where('id', $giuongphong->giuongid)->first();
                        ?>
                        <p>{{ $giuong->ten }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach ($phong->mieutaphongs as $mieutaphong)
                        <?php $mieuta = App\Models\Mieuta::where('id', $mieutaphong->mieutaid)->first();
                        ?>
                        <p>{{ $mieuta->noidung }}</p>
                    @endforeach
                </td>
                @hasrole('Admin')
                    <td>
                        {{-- @include('phongs.edit') --}}
                        <a href="{{ route('phongs.edit', $phong->so_phong) }}" class="btn btn-link"><i
                                class="icon-copy fas fa-edit"></i></a>
                        @include('phongs.delete')
                    </td>
                @endhasrole
            </tr>
        @endforeach
    </tbody>
</table>
