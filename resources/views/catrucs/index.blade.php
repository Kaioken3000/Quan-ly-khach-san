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
                @include('layouts3.title', ['titlePage' => 'Quản lý ca trực'])
            </div>
            <div>
                @include('catrucs.create')
            </div>
        </div>
        <table class="table fs--1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên ca trực</th>
                    <th>Giờ bắt đầu </th>
                    <th>Giờ kết thúc </th>
                    @hasanyrole('MainAdmin|Admin')
                        <th class="datatable-nosort">Action</th>
                    @endhasanyrole
                </tr>
            </thead>
            <tbody>
                @foreach ($catrucs as $catruc)
                    <tr>
                        <td>{{ $catruc->id }}</td>
                        <td>{{ $catruc->ten }}</td>
                        <td>{{ $catruc->giobatdau }}</td>
                        <td>{{ $catruc->gioketthuc }}</td>
                        @hasanyrole('MainAdmin|Admin')
                            <td>
                                @include('catrucs.edit')
                                @include('catrucs.delete')
                            </td>
                        @endhasanyrole
                    </tr>
                @endforeach
                {{-- <tr>
                        <td>
                            {!! $catrucs->links("pagination::bootstrap-4") !!}
                        </td>
                    </tr> --}}
            </tbody>
        </table>
    </div>
@endsection
