 {{-- <section class="section">
     <div class="container" data-aos="fade-up" data-aos-offset="-200">
         <div class="table-responsive text-nowrap">
             <table class="table">
                 <thead>
                     <tr >
                         <th>Số phòng</th>
                         <th>Loại phòng</th>
                         <th width="280px">Hành động</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($phongs as $phong)
                     <tr>
                         <td>{{ $phong->so_phong }}</td>
 <td>
     <button class="btn btn link" data-toggle="modal" data-target="#LoaiphongModal{{ $phong->loaiphongs->ma }}">
         {{ $phong->loaiphongs->ten }}
     </button>
 </td>
 <td>
     <form action="/client/reservation" method="get">
         <input hidden type="date" name="ngaydat" value="{{ $request->ngaydat }}">
         <input hidden type="date" name="ngaytra" value="{{ $request->ngaytra }}">
         <input hidden type="number" name="soluong" value="{{ $request->soluong }}" min=1>
         <input hidden type="int" name="sophong" value="{{ $phong->so_phong }}">
         <button type="submit" class="primary-btn border-0 bg-white text-dark">Đặt phòng</button>
     </form>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 </section> --}}

 @include('client.layouts2.breadcrumb', ['titlePage' => 'Bookable Rooms'])

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
                         <form action="/client/reservation" method="get">
                             <input hidden type="date" name="ngaydat" value="{{ $request->ngaydat }}">
                             <input hidden type="date" name="ngaytra" value="{{ $request->ngaytra }}">
                             <input hidden type="number" name="soluong" value="{{ $request->soluong }}" min=1>
                             <input hidden type="int" name="sophong" value="{{ $phong->so_phong }}">

                             {{-- Thong tin user --}}
                             @auth
                             <input type="hidden" id="phongid" name="phongid" class="form-control" value="{{ $phong->so_phong }}">
                             <input type="hidden" id="ten" name="ten" class="form-control " value="{{auth()->user()->username}}">
                             <input type="hidden" id="sdt" name="sdt" class="form-control " value="{{auth()->user()->sdt}}">
                             <input type="hidden" id="email" name="email" class="form-control " value="{{auth()->user()->email}}">
                             <input type="hidden" value="{{auth()->user()->id}}" name="clientid">
                             @endauth

                             <button type="submit" class="primary-btn border-0 bg-white text-dark">Đặt phòng</button>
                         </form>
                     </div>
                 </div>
             </div>
             @endforeach
         </div>
     </div>
 </section>
 <!-- Rooms Section End -->
