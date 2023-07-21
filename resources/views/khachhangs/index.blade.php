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
                @include('layouts3.title', ['titlePage'=>'Quản lý khách hàng'])
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ten</th>
                    <th>sdt</th>
                    <th>email</th>
                    <th>Mã đặt phòng</th>
                    @hasrole('Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($khachhangs as $khachhang)
                    <tr>
                        <td>{{ $khachhang->id }}</td>
                        <td>{{ $khachhang->ten }}</td>
                        <td>{{ $khachhang->sdt }}</td>
                        <td>{{ $khachhang->email }}</td>
                        <td>{{ $khachhang->datphongid }}</td>
                        @hasrole('Admin')
                            <td class="d-flex gap-1">
                                @include('khachhangs.edit')
                                @include('khachhangs.delete')
                            </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
