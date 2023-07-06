<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                {{-- Roon load begin --}}
                @foreach ($loaiphongs as $loaiphong)
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="/client/images/{{$loaiphong->hinh}}">
                        <div class="hr-text">
                            <h3>{{ $loaiphong->ten }}</h3>
                            <h2>{{ $loaiphong->gia }}VND<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion {{$loaiphong->soluong}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- Roon load end --}}
            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->
