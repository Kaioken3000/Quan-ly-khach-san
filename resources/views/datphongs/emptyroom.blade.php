@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Chon phong</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="thead-dark">
                        <th>Số phòng</th>
                        <th>Loại phòng</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($phongs as $phong)
                    <?php
                    $chon = 0;
                    $datphongs = App\Models\Datphong::where('phongid', $phong->so_phong)->get();
                    foreach ($datphongs as $datphong) {
                        if ($datphong->ngaydat <= $request->ngaychon && $datphong->ngaytra >= $request->ngaychon) {
                            $chon++;
                        }
                    } ?>
                    <tr>
                        <td>{{ $phong->so_phong }}</td>
                        <td>{{ $phong->loaiphongid }}</td>
                        @if($chon == 0)
                        <td>
                            <form action="#" method="Post">
                                <button type="submit" class="btn btn-danger"><i class="bx bx-hotel mb-1"></i> Đặt phòng</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
    @endsection