@extends('client.chinhanh')

@section('content')
    @include('client.layouts2.breadcrumb', ['titlePage' => 'Tất cả chi nhánh'])
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row list-wrapper">
                {{-- Room list start --}}
                @foreach ($chinhanhs as $chinhanh)
                    <div class="col-lg-4 col-md-6 list-item">
                        <div class="room-item">
                            <img src="/client/images/{{ $chinhanh->hinhs[0]->vitri }}" alt="">
                            <div class="ri-text">
                                <h4>{{ $chinhanh->ten }}</h4>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Số Lượng:</td>
                                            <td>{{ $chinhanh->soluong }} phòng</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Địa điểm:</td>
                                            <td>{{ $chinhanh->thanhpho }} - {{ $chinhanh->quan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Số điện thoại:</td>
                                            <td>{{ $chinhanh->sdt }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">
                                                <a href="/client/chinhanhChitiet/{{ $chinhanh->id }}"
                                                    class="primary-btn">Xem Chi Tiết</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <style>
            .spad {
                box-sizing: unset;
            }
        </style>
        @include('client.layouts2.paginate', ['numberOfItem' => '6'])
    </section>
    <!-- Rooms Section End -->
@endsection
