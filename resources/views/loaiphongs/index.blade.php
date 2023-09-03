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
                @include('layouts3.title', ['titlePage' => 'Quản lý loại phòng'])
            </div>
            <div>
                @include('loaiphongs.create')
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">Mã loại phòng</th>
                    <th>Tên loại phòng</th>
                    <th>Giá </th>
                    <th>Hinh</th>
                    <th>Số lượng</th>
                    <th>Miêu tả loại phòng</th>
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @foreach ($loaiphongs as $loaiphong)
                    <tr>
                        <td>{{ $loaiphong->ma }}</td>
                        <td>{{ $loaiphong->ten }}</td>
                        <td>{{ $loaiphong->gia }} VND</td>
                        <td style="width: 10%"><img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom"
                                data-bs-placement="top" title="{{ $loaiphong->hinh }}"
                                src="/client/images/{{ $loaiphong->hinh }}" class="img-fluid rounded "></td>
                        <td>{{ $loaiphong->soluong }}</td>
                        <td>{{ $loaiphong->mieuTa }}</td>
                        @hasanyrole('MainAdmin|Admin')
                            <td>
                                @include('loaiphongs.edit')
                                @include('loaiphongs.delete')
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
