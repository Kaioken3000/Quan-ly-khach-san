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
                @include('layouts3.title', ['titlePage' => 'Quản lý thiết bị'])
            </div>
            <div>
                @include('thietbis.create')
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">ID</th>
                    <th>Tên</th>
                    <th>Hình</th>
                    <th>Giá </th>
                    <th>Miêu tả </th>
                    @hasrole('Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($thietbis as $thietbi)
                    <tr>
                        <td>{{ $thietbi->id }}</td>
                        <td>{{ $thietbi->ten }}</td>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $thietbi->hinh }}" src="/client/images/{{ $thietbi->hinh }}" class="img-fluid">
                        </td>
                        <td>{{ $thietbi->gia }}</td>
                        <td>{{ $thietbi->mieuTa }}</td>
                        @hasrole('Admin')
                            <td>
                                @include('thietbis.edit')
                                @include('thietbis.delete')
                            </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection