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
                @include('virtualtours.create')
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">ID</th>
                    <th>Vị trí</th>
                    <th>Preview</th>
                    <th>Virtual Tour</th>
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @foreach ($virtualtours as $virtualtour)
                    <tr>
                        <td>{{ $virtualtour->id }}</td>
                        <td>client/images/{{ $virtualtour->hinh }}</td>
                        <td><a href="virtualtours-showpreview/{{ $virtualtour->id }}" target="_blank"
                                class="badge bg-primary">Preview</a></td>
                        <td style="width: 90%">
                            <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $virtualtour->hinh }}" src="/client/images/{{ $virtualtour->hinh }}" class="img-fluid rounded ">
                        </td>
                        @hasanyrole('MainAdmin|Admin')
                            <td>
                                @include('virtualtours.edit')
                                @include('virtualtours.delete')
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
