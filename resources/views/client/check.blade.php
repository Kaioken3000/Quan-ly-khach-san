{{-- <!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

    @include('client.layouts.header')

    @include('client.layouts.session')

    <section class="section bg-light pb-0">
        <div class="container">
            <div class="row check-availabilty" id="next">
                <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
                    <form action="check" method="get">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="ngaydat" class="font-weight-bold text-black">Check In</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="date" name="ngaydat" id="ngaydat" class="form-control" value="{{ $request->ngaydat }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="ngaytra" class="font-weight-bold text-black">Check Out</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="date" name="ngaytra" id="ngaytra" class="form-control" value="{{ $request->ngaytra }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="soluong" class="font-weight-bold text-black">Number</label>
                                <div class="field-icon-wrap">
                                    <input type="number" name="soluong" id="soluong" class="form-control" min=1 value="{{ $request->soluong }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 align-self-end">
                                <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container" data-aos="fade-up" data-aos-offset="-200">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr >
                            <th>Số phòng</th>
                            <th>Loại phòng</th>
                            <th width="280px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phongs as $phong)
                        <tr>
                            <td>{{ $phong->so_phong }}</td>
                            <td>
                                <button class="btn btn link" data-toggle="modal" data-target="#LoaiphongModal{{ $phong->loaiphongs->ma }}">
                                    {{ $phong->loaiphongs->ten }}
                                </button>
                            </td>
                            <td>
                                <form action="/client/reservation" method="get">
                                    <input hidden type="date" name="ngaydat" value="{{ $request->ngaydat }}">
                                    <input hidden type="date" name="ngaytra" value="{{ $request->ngaytra }}">
                                    <input hidden type="number" name="soluong" value="{{ $request->soluong }}" min=1>
                                    <input hidden type="int" name="sophong" value="{{ $phong->so_phong }}">
                                    <button type="submit" class="btn btn-primary">Đặt phòng</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </section>
    @foreach ($phongs as $phong)
    <div class="modal fade" id="LoaiphongModal{{ $phong->loaiphongs->ma }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Chi tiết loại phòng</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <figure class="img-wrap col-6">
                            <img src="/client/images/{{ $phong->loaiphongs->hinh }}" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="col-6">
                            <div class="d-flex">
                                <h5>Loại phòng: </h5>
                                <p>{{$phong->loaiphongs->ten}}</p>
                            </div>
                            <div class="d-flex">
                                <h5>Giá: </h5>
                                <p>{{$phong->loaiphongs->gia }}</p> /đêm
                            </div>
                            <div class="d-flex">
                                <h5>Số lượng ở tối đa: </h5>
                                <p>{{$phong->loaiphongs->soluong}}</p>
                            </div>
                            <div class="d-flex">
                                <h5>Miêu tả: </h5>
                                <p>{{$phong->loaiphongs->mieuTa}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @include('client.layouts.footer')

    @include('client.layouts.script')

</body>

</html> --}}

<!DOCTYPE html>
<html lang="vi">

@include('client.layouts2.head')

<body>

    @include('client.layouts2.loader')

    @include('client.layouts2.header')

    @include('client.layouts2.menu')

    @include('client.layouts2.showRoomCheck')

    @include('client.layouts2.footer')

    @include('client.layouts2.search')

    @include('client.layouts2.script')

</body>

</html>
