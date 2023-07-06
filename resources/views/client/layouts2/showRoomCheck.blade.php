 <section class="section">
     <div class="container" data-aos="fade-up" data-aos-offset="-200">
         <div class="table-responsive text-nowrap">
             <table class="table">
                 <thead>
                     <tr class="thead-dark">
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
 </section>
