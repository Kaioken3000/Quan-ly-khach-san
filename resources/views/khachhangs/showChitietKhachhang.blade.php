@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="card border mb-3 h-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h4 class="card-title">Thông tin khách hàng</h4>
                        </div>
                    </div>
                    <input type="checkbox" name="" id="toggleView" checked hidden />
                    @include('khachhangs.chitiets.indexChitiet')
                </div>
            </div>
        </div>
        @isset($khachhangs[0]->users)
            <div class="col-6">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4 class="card-title">Thông tin tài khoản</h4>
                            </div>
                        </div>
                        <input type="checkbox" name="" id="toggleView" checked hidden />
                        @include('khachhangs.chitiets.userChitiet')
                    </div>
                </div>
            </div>
        @endisset
        {{-- <div class="col-12">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4 class="card-title">Thông tin tài khoản</h4>
                            </div>
                        </div>
                        <input type="checkbox" name="" id="toggleView" checked hidden />
                        @include('datphongs.indexComponent')
                    </div>
                </div>
            </div> --}}
    </div>
    <link rel="stylesheet" href="/tableToList/style.css">
@endsection
