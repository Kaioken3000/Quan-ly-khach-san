@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-0">
        <div class="d-flex">
            <div class="flex-grow-1">
                @include('layouts3.title', ['titlePage' => 'Quản lý phòng'])
            </div>
            <div>
                @include('phongs.create')
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">Số phòng</th>
                    <th>Hình</th>
                    <th></th>
                    <th></th>
                    <th>Loại phòng</th>
                    @hasrole('Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
                @foreach ($phongs as $phong)
                    <tr>
                        <td>{{ $phong->so_phong }}</td>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $phong->picture_1 }}" src="/client/images/{{ $phong->picture_1 }}"
                                class="img-fluid">
                        </td>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $phong->picture_2 }}" src="/client/images/{{ $phong->picture_2 }}"
                                class="img-fluid">

                        </td>
                        <td style="width: 10%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $phong->picture_3 }}" src="/client/images/{{ $phong->picture_3 }}"
                                class="img-fluid">

                        </td>
                        <td>{{ $phong->loaiphongs->ten }}</td>
                        @hasrole('Admin')
                            <td>
                                @include('phongs.edit')
                                @include('phongs.delete')
                            </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
