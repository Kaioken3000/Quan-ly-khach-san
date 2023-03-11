<section class="section bg-light pb-0">
    <div class="container">

        <div class="row check-availabilty" id="next">
            <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

                <form action="check" method="get">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                            <label for="ngaydat" class="font-weight-bold text-black">Ngày vào</label>
                            <input type="date" name="ngaydat" id="ngaydat" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                            <label for="ngaytra" class="font-weight-bold text-black">Ngày ra</label>
                            <input type="date" name="ngaytra" id="ngaytra" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                            <label for="soluong" class="font-weight-bold text-black">Số lượng</label>
                            <input type="number" name="soluong" id="soluong" class="form-control" value="1" min=1>
                        </div>
                        <div class="col-md-6 col-lg-3 align-self-end">  
                            <button class="btn btn-primary btn-block text-white">Kiểm tra</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</section>