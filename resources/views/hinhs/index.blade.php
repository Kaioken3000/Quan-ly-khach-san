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
                @include('layouts3.title', ['titlePage' => 'Quản lý hình'])
            </div>
            <div>
                @include('hinhs.create')
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">ID</th>
                    <th>Vị trí</th>
                    <th>Hình</th>
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @foreach ($hinhs as $hinh)
                    <tr>
                        <td>{{ $hinh->id }}</td>
                        <td>client/images/{{ $hinh->vitri }}</td>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $hinh->vitri }}" src="/client/images/{{ $hinh->vitri }}" class="img-fluid rounded ">
                        </td>
                        @hasanyrole('MainAdmin|Admin')
                            <td>
                                @include('hinhs.edit')
                                @include('hinhs.delete')
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
