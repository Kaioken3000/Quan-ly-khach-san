<section class="section bg-light pb-0">
    <div class="container">

        <div class="row check-availabilty" id="next">
            <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

                <form action="check" method="get">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                            <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                            <div class="field-icon-wrap">
                                <div class="icon"><span class="icon-calendar"></span></div>
                                <input type="date" name="checkin" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                            <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                            <div class="field-icon-wrap">
                                <div class="icon"><span class="icon-calendar"></span></div>
                                <input type="date" name="checkout" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                            <label for="number" class="font-weight-bold text-black">Number</label>
                            <div class="field-icon-wrap">
                                <input type="number"name="number" id="number" class="form-control" value="1" min=1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 align-self-end">
                            <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</section>