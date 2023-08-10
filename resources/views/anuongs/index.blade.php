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
                @include('layouts3.title', ['titlePage' => 'Quản lý dịch vụ ăn uống'])
            </div>
            <div>
                @include('anuongs.create')
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">ID</th>
                    <th>Tên</th>
                    <th>Hinh</th>
                    <th>Giá </th>
                    <th>Số lượng</th>
                    <th>Miêuu tả </th>
                    @hasrole('Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($anuongs as $anuong)
                    <tr>
                        <td>{{ $anuong->id }}</td>
                        <td>{{ $anuong->ten }}</td>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $anuong->hinh }}" src="/client/images/{{ $anuong->hinh }}"
                                class="img-fluid">
                        </td>
                        <td>{{ $anuong->gia }}</td>
                        <td>{{ $anuong->soluong }}</td>
                        <td>{{ $anuong->mieuTa }}</td>
                        @hasrole('Admin')
                            <td>
                                @include('anuongs.edit')
                                @include('anuongs.delete')
                            </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
