<section class="section">
    <div class="container" data-aos="fade-up" data-aos-offset="-200">
        <div class="table-responsive text-nowrap">
            <table class="table" id="myTable">
                <thead>
                    <tr class="thead-dark">
                        <th>Số phòng</th>
                        <th>Loại phòng</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($phongs as $phong)
                    <tr>
                        <td>{{ $phong->so_phong }}</td>
                        <td><button class="btn btn link" data-toggle="modal" data-target="#LoaiphongModal{{ $phong->loaiphongs->ma }}">
                                {{ $phong->loaiphongs->ten }}
                            </button></td>
                        <td>
                            <form action="doiphongclient" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="datphongid" id="datphongid" value="{{ $dat->id }}" />
                                <input type="hidden" name="phongid" id="phongid" value="{{ $phong->so_phong }}" />
                                <button type="submit" class="btn btn-success"><i class="bx bx-plus mb-1"></i> Đổi
                                    phòng</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</section>
