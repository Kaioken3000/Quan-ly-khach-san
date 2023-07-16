@include('client.layouts2.searchBar')
@include('client.layouts2.breadcrumb', ['titlePage' => 'All room'])
<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row list-wrapper">
            {{-- Room list start --}}
            @foreach ($phongs as $phong)
            <?php $datphongs = App\Models\Datphong::get();
                $check = 0;
                $ngayvaodadat = "";
                $ngayradadat = "";
                foreach($datphongs as $datphong){
                    $danhsachdatphong = App\Models\Danhsachdatphong::where("datphongid", $datphong->id)->latest()->first();
                    if($danhsachdatphong->phongid == $phong->so_phong){
                        $check++;
                        $ngayvaodadat = $danhsachdatphong->ngaybatdauo;
                        $ngayradadat = $danhsachdatphong->ngayketthuco;
                        break;
                    }
                }
                ?>
            <div class="col-lg-4 col-md-6 list-item">
                <div class="room-item">
                    <img src="/client/images/{{$phong->picture_1}}" alt="">
                    <div class="ri-text">
                        <h4>{{$phong->loaiphongs->ten}} - {{$phong->so_phong}}</h4>
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
                        @if($check==0)
                            <a href="/client/chitietphong/{{$phong->so_phong}}" class="primary-btn">More Details</a>
                        @else  
                            <div class="d-flex">
                                <p class="mb-0"> Room is booked: &nbsp;</p>
                                <div class="me-0">
                                    <p class="mb-0"> since: {{$ngayvaodadat}}</p>
                                    <p class="mb-0"> to: {{$ngayradadat}}</p>
                                </div>
                            </div>
                        @endif
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
            {{-- <div class="col-lg-12 d-flex justify-content-center">
                {!! $phongs->links("pagination::bootstrap-4") !!}
            </div> --}}
        </div>
    </div>
    @include('client.layouts2.paginate', ['numberOfItem' => '6'])
</section>
<!-- Rooms Section End -->
