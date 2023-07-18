<!-- Services Section End -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Tìm kiếm</span>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <form class="col-12" method="post" action="/client/search-phong-with-many">
                <div class="row">
                    @csrf
                    <div class="m-3 d-flex">
                        <label class="form-label mx-2 my-2">Room category: </label>
                        <select class="form-select" aria-label="Default select example" name="tenphong">
                            <option value=" ">All</option>
                            @foreach($loaiphongs as $loaiphong)
                            <option value="{{$loaiphong->ma}}">{{$loaiphong->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-3 d-flex">
                        <label class="form-label mx-2 my-2">Room price</label>
                        <select class="form-select" aria-label="Default select example" name="tuychonggia">
                            <option value=">">More than</option>
                            <option value="=">Bằng</option>
                            <option value="<">Smaller than</option>
                        </select>
                        <select class="form-select" aria-label="Default select example" name="giaphong">
                            <option value="100000">100000 VNĐ</option>
                            <option value="200000">200000 VNĐ</option>
                            <option value="300000">300000 VNĐ</option>
                            <option value="400000">400000 VNĐ</option>
                            <option value="500000">500000 VNĐ</option>
                            <option value="600000">600000 VNĐ</option>
                        </select>
                    </div>
                    <div class="m-3 d-flex">
                        <label class="form-label mx-2 my-2">Number of people in room:</label>
                        <select class="form-select" aria-label="Default select example" name="songuoiphong">
                            <option value="">All</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="py-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Services Section End -->
