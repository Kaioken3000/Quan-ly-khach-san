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
                @include('layouts3.title', ['titlePage' => 'Quản lý giường'])
            </div>
            <div>
                @include('giuongs.create')
            </div>
        </div>
        <table class="table fs--1">
            <thead>
                <tr>
                    <th class="table-plus">ID</th>
                    <th>Tên</th>
                    <th>Kích thước</th>
                    <th>Hình</th>
                    <th>Giá </th>
                    <th>Miêu tả </th>
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @foreach ($giuongs as $giuong)
                    <tr>
                        <td>{{ $giuong->id }}</td>
                        <td>{{ $giuong->ten }}</td>
                        <td>{{ $giuong->kichthuoc }} {{ $giuong->donvi }}</td>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $giuong->hinh }}" src="/client/images/{{ $giuong->hinh }}" class="img-fluid rounded ">
                        </td>
                        <td>{{ $giuong->gia }}</td>
                        <td>{{ $giuong->mieuTa }}</td>
                        @hasanyrole('MainAdmin|Admin')
                            <td>
                                @include('giuongs.edit')
                                @include('giuongs.delete')
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
