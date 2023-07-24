<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row list-wrapper">
                {{-- Roon load begin --}}
                @foreach ($phongs as $phong)
                    <?php $datphongs = App\Models\Datphong::get();
                    $check = 0;
                    $ngayvaodadat = '';
                    $ngayradadat = '';
                    $today = date('Y-m-d');
                    foreach ($datphongs as $datphong) {
                        $danhsachdatphong = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)
                            ->latest()
                            ->first();
                        if ($danhsachdatphong->phongid == $phong->so_phong && $datphong->huydatphong == 0) {
                            if ($danhsachdatphong->ngayketthuco > $today) {
                                $check++;
                                $ngayvaodadat = $danhsachdatphong->ngaybatdauo;
                                $ngayradadat = $danhsachdatphong->ngayketthuco;
                                break;
                            }
                        }
                    }
                    ?>
                    <div class="col-lg-3 col-md-6 list-item">
                        <div class="hp-room-item set-bg" data-setbg="/client/images/{{ $phong->picture_1 }}">
                            <div class="hr-text">
                                <h3>{{ $phong->loaiphongs->ten }} - {{ $phong->so_phong }}</h3>
                                <h2>{{ $phong->loaiphongs->gia }}VND<span>/Pernight</span></h2>
                                @if ($check == 0)
                                    <a href="/client/chitietphong/{{ $phong->so_phong }}" class="primary-btn">More
                                        Details</a>
                                    <br>
                                @else
                                    <div class="d-flex">
                                        <p class="mb-0 text-light"> Room is booked: &nbsp;</p>
                                        <div class="me-0">
                                            <p class="mb-0 text-light"> since: {{ $ngayvaodadat }}</p>
                                            <p class="mb-0 text-light"> to: {{ $ngayradadat }}</p>
                                        </div>
                                    </div>
                                @endif
                                <table>
                                    <tbody>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <tr>
                                            <td class="r-o">Category:</td>
                                            <td>{{ $phong->loaiphongs->ten }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion {{ $phong->loaiphongs->soluong }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- Roon load end --}}
            </div>
        </div>
    </div>
</section>
@include('client.layouts2.paginate', ['numberOfItem' => '4'])
<!-- Home Room Section End -->
