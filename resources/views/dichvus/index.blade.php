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
                    @include('layouts3.title', ['titlePage'=>'Quản lý dịch vụ'])
                </div>
                <div>
                    @include('dichvus.create')
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="table-plus">ID</th>
                        <th>Tên dịch vụ</th>
                        <th>Giá </th>
                        @hasanyrole('MainAdmin|Admin')
                            <th class="datatable-nosort">Action</th>
                        @endhasanyrole
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dichvus as $dichvu)
                        <tr>
                            <td>{{ $dichvu->id }}</td>
                            <td>{{ $dichvu->ten }}</td>
                            <td>{{ $dichvu->giatien }} {{ $dichvu->donvi }}</td>
                            @hasanyrole('MainAdmin|Admin')
                                <td>
                                    @include('dichvus.edit')
                                    @include('dichvus.delete')
                                </td>
                            @endhasanyrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
