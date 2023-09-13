@include('client.layouts2.breadcrumb', ['titlePage' => 'Danh sách các phòng có thể đổi'])

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            {{-- Room list start --}}
            @error('soluong')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            @foreach ($phongs as $phong)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="/client/images/{{ $phong->hinhs[0]->vitri }}" alt="">
                        <div class="ri-text">
                            <h4>Phòng: {{ $phong->so_phong }}</h4>
                            <h3>{{ number_format($phong->loaiphongs->gia, 0, '', '.') }}đ<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Loại phòng:</td>
                                        <td>{{ $phong->loaiphongs->ten }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Số lượng:</td>
                                        <td>{{ $phong->loaiphongs->soluong }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <form action="/client/reservation" method="get">
                            <input hidden type="date" name="ngaydat" value="{{ $request->ngaydat }}">
                        <input hidden type="date" name="ngaytra" value="{{ $request->ngaytra }}">
                        <input hidden type="number" name="soluong" value="{{ $request->soluong }}" min=1>
                        <input hidden type="int" name="sophong" value="{{ $phong->so_phong }}">

                        @auth
                        <input type="hidden" id="phongid" name="phongid" class="form-control" value="{{ $phong->so_phong }}">
                        <input type="hidden" id="ten" name="ten" class="form-control " value="{{auth()->user()->username}}">
                        <input type="hidden" id="sdt" name="sdt" class="form-control " value="{{auth()->user()->sdt}}">
                        <input type="hidden" id="email" name="email" class="form-control " value="{{auth()->user()->email}}">
                        <input type="hidden" value="{{auth()->user()->id}}" name="clientid">
                        @endauth

                        <button type="submit" class="primary-btn border-0 bg-white text-dark">Đặt phòng</button>
                        </form> --}}

                            <form action="doiphongclient" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="datphongid" id="datphongid" value="{{ $dat->id }}" />
                                <input type="hidden" name="phongid" id="phongid" value="{{ $phong->so_phong }}" />
                                <button type="submit" class="primary-btn border-0 bg-white text-dark">
                                    <i class="fa fa-edit"></i>
                                    Đổi phòng
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Rooms Section End -->
