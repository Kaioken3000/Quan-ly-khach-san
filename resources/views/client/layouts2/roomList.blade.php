@include('client.layouts2.breadcrumb')

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            {{-- Room list start --}}
            @foreach ($phongs as $phong)
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <img src="/client/images/{{$phong->picture_1}}" alt="">
                    <div class="ri-text">
                        <h4>{{$phong->so_phong}}</h4>
                        <h3>{{$phong->loaiphongs->gia}}VND<span>/Pernight</span></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Category:</td>
                                    <td>{{$phong->loaiphongs->ten}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>{{$phong->loaiphongs->soluong}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="/client/chitietphong/{{$phong->so_phong}}" class="primary-btn">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Room list end --}}
            {{-- <div class="col-lg-12">
                <div class="room-pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div> --}}
            {{-- Room list end --}}
            <div class="col-lg-12 d-flex justify-content-center">
                {!! $phongs->links("pagination::bootstrap-4") !!}
            </div>
        </div>
    </div>
</section>
<!-- Rooms Section End -->
