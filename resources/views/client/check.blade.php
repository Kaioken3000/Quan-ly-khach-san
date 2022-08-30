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
                                <label for="ngayvao" class="font-weight-bold text-black">Check In</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="date" name="ngayvao" id="ngayvao" class="form-control" value="{{ $request->ngayvao }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="ngayra" class="font-weight-bold text-black">Check Out</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="date" name="ngayra" id="ngayra" class="form-control" value="{{ $request->ngayra }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="number" class="font-weight-bold text-black">Number</label>
                                <div class="field-icon-wrap">
                                    <input type="number" name="number" id="number" class="form-control" value="{{ $request->number }}" min=1>
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
                                <form action="reservation" method="get">
                                    <input hidden type="date" name="ngayvao" value="{{ $request->ngayvao }}">
                                    <input hidden type="date" name="ngayra" value="{{ $request->ngayra }}">
                                    <input hidden type="number" name="number" value="{{ $request->number }}" min=1>
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