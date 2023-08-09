@extends('layouts3.app')

@section('content')
    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem; border: 10px solid black;">
                        <div class="card-body">
                            <h5 class="card-title">Chi tiết phòng {{ $phong->so_phong }}</h5>
                            <div class="card mt-2 bg-primary text-white" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Giá phòng:</h5>
                                    <p class="card-text">{{ $phong->loaiphongs->gia }}VND<span>/Pernight</p>
                                </div>
                            </div>
                            <div class="card mt-2 bg-success text-white" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Loại phòng:</h5>
                                    <p class="card-text">{{ $phong->loaiphongs->ten }}</p>
                                </div>
                            </div>
                            <div class="card mt-2 bg-warning text-white" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Số lượng:</h5>
                                    <p class="card-text">{{ $phong->loaiphongs->soluong }} ngươi</p>
                                </div>
                            </div>
                            <div class="card mt-2 bg-secondary text-white" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Miêu tả:</h5>
                                    <p class="card-text">{{ $phong->loaiphongs->mieuTa }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="room-details-item">
                        {{-- content --}}
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/client/images/{{ $phong->picture_1 }}" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="/client/images/{{ $phong->picture_2 }}" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="/client/images/{{ $phong->picture_3 }}" class="d-block w-100">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        {{-- end content --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
@endsection
