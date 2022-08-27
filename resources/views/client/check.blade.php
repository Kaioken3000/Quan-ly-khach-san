<!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

    @include('client.layouts.header')
    <!-- END head -->

    <!-- Session -->
    @include('client.layouts.session')

    <!-- Book -->
    <section class="section bg-light pb-0">
        <div class="container">
            <div class="row check-availabilty" id="next">
                <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
                    <form action="check" method="get">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="date" name="checkin" class="form-control" value="{{ $request->checkin }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="date" name="checkout" class="form-control" value="{{ $request->checkout }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="number" class="font-weight-bold text-black">Number</label>
                                <div class="field-icon-wrap">
                                    <input type="number" id="number" class="form-control" value="{{ $request->number }}" min=1>
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
                        <tr class="thead-dark">
                            <th>Số phòng</th>
                            <th>Loại phòng</th>
                            <th>Ngày đặt</th>
                            <th>Ngày trả</th>
                            <th>Số lượng</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phongs as $phong)
                        <tr>
                            <td>{{ $phong->so_phong }}</td>
                            <td>{{ $phong->loaiphongid }}</td>
                            <td>{{ $phong->ngaydat }}</td>
                            <td>{{ $phong->ngaytra }}</td>
                            <td>{{ $phong->soluong }}</td>
                            <td>
                                <form action="reservation" method="get">
                                    <button type="submit" class="btn btn-primary">Đặt phòng</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                {!! $phongs->links("pagination::bootstrap-4") !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </section>

    <!-- Footer -->
    @include('client.layouts.footer')

    <!-- Script -->
    @include('client.layouts.script')

</body>

</html>