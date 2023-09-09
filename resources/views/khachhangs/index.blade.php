@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="">
        <div class="d-flex">
            <div class="flex-grow-1">
                @include('layouts3.title', ['titlePage' => 'Quản lý khách hàng'])
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Văn bằng</th>
                    <th>Giới tính</th>
                    <th>Điểm</th>
                    {{-- <th>Chi tiết</th> --}}
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @foreach ($khachhangs as $khachhang)
                    <tr>
                        <td>{{ $khachhang->id }}</td>
                        <td>
                            <a href="/khachhangs/chitiet/{{ $khachhang->id }}/list"
                                target="_blank">{{ $khachhang->ten }}</a>
                        </td>
                        <td>{{ $khachhang->sdt }}</td>
                        <td>{{ $khachhang->email }}</td>
                        <td>{{ $khachhang->diachi }}</td>
                        <td>{{ $khachhang->vanbang }}</td>
                        <td>{{ $khachhang->gioitinh }}</td>
                        <td>{{ $khachhang->diem }}</td>
                        {{-- <td style="min-width: 300px">
                            <?php //$diem = 0;
                            ?>
                            <ul>
                                @foreach ($khachhang->datphongs as $datphong)
                                    <li>{{ $datphong->id }}</li>
                                    <ul>
                                        @foreach ($datphong->dichvus as $dichvu)
                                            <li>{{ $dichvu->ten }} +1</li>
                                            <?php //$diem += 1;
                                            ?>
                                        @endforeach
                                        @foreach ($datphong->anuongdatphongs as $anuongdatphongs)
                                            <li>({{ $anuongdatphongs->anuongs->ten }} + 2 )*
                                                {{ $anuongdatphongs->soluong }} </li>
                                            <?php //$diem += 2 * $anuongdatphongs->soluong;
                                            ?>
                                        @endforeach
                                    </ul>
                                    <hr>
                                    Tổng cộng: {{$diem}} điểm
                                @endforeach
                            </ul>   
                        </td> --}}
                        {{-- <td>
                            <a href="/khachhangs/chitiet/{{ $khachhang->id }}/list" class="badge bg-info" target="_blank">Chi
                                tiết</a>
                        </td> --}}
                        @hasanyrole('MainAdmin|Admin')
                            <td>
                                <div class="d-flex gap-1">
                                    @include('khachhangs.modal.modalDatphong')
                                    @include('khachhangs.edit')
                                    @include('khachhangs.delete')
                                </div>
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Văn bằng</th>
                    <th>Giới tính</th>
                    <th>Điểm</th>
                    {{-- <th></th> --}}
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
