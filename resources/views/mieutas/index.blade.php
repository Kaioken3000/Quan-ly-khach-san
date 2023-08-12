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
                @include('layouts3.title', ['titlePage' => 'Quản lý miêu tả'])
            </div>
            <div>
                @include('mieutas.create')
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">ID</th>
                    <th>Nội dung </th>
                    <th>Hình</th>
                    @hasrole('Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($mieutas as $mieuta)
                    <tr>
                        <td>{{ $mieuta->id }}</td>
                        <td >
                            <textarea cols="80" rows="10">{{ $mieuta->noidung }}</textarea>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $mieuta->hinh }}" src="/client/images/{{ $mieuta->hinh }}" class="img-fluid">
                        </td>
                        @hasrole('Admin')
                            <td>
                                @include('mieutas.edit')
                                @include('mieutas.delete')
                            </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
