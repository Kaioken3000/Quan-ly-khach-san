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
                                    <input type="number" name="soluong" id="soluong" class="form-control" value="{{ $request->soluong }}" min=1>
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
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phongs as $phong)
                        <tr>
                            <td>{{ $phong->so_phong }}</td>
                            <td>{{ $phong->loaiphongid }}</td>
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

    <!-- Footer -->
    @include('client.layouts.footer')

    <!-- Script -->
    @include('client.layouts.script')

</body>

</html>