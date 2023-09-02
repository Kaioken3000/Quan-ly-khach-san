<!-- Search START -->
<div class="row">
    <div class="col-xl-10 position-relative mt-n3 mt-xl-n9">
        <!-- Title -->
        <h6 class="d-none d-xl-block mb-3">Kiểm tra phòng trống</h6>

        <!-- Booking from START -->
        <form class="card shadow rounded-3 position-relative p-4 pe-md-5 pb-5 pb-md-4" action="check">
            <div class="row g-4 align-items-center">
                <!-- Location -->
                {{-- <div class="col-lg-4">
                    <div class="form-control-border form-control-transparent form-fs-md d-flex">
                        <!-- Icon -->
                        <i class="bi bi-geo-alt fs-3 me-2 mt-2"></i>
                        <!-- Select input -->
                        <div class="flex-grow-1">
                            <label class="form-label">Location</label>
                            <select class="form-select js-choice" data-search-enabled="true">
                                <option value="">Select location</option>
                                <option>San Jacinto, USA</option>
                                <option>North Dakota, Canada</option>
                                <option>West Virginia, Paris</option>
                            </select>
                        </div>
                    </div>
                </div> --}}

                <!-- Check in -->
                <div class="col-lg-4">
                    <div class="d-flex">
                        <!-- Icon -->
                        <i class="bi bi-calendar fs-3 me-2 mt-2"></i>
                        <!-- Date input -->
                        <div class="form-control-border form-control-transparent form-fs-md">
                            <label class="form-label">Ngày vào</label>
                            <input type="text" class="form-control flatpickr" data-date-format="Y-m-d" name="ngaydat"
                                id="ngaydat" placeholder="Select date">
                            @error('ngaydat')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex">
                        <!-- Icon -->
                        <i class="bi bi-calendar fs-3 me-2 mt-2"></i>
                        <!-- Date input -->
                        <div class="form-control-border form-control-transparent form-fs-md">
                            <label class="form-label">Ngày ra</label>
                            <input type="text" class="form-control flatpickr" data-date-format="Y-m-d" name="ngaytra"
                                id="ngaytra" placeholder="Select date">
                            @error('ngaytra')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Guest -->
                <div class="col-lg-4">
                    <div class="form-control-border form-control-transparent form-fs-md d-flex">
                        <!-- Icon -->
                        <i class="bi bi-person fs-3 me-2 mt-2"></i>
                        <!-- Dropdown input -->
                        <div class="w-100">
                            <label class="form-label">Số lượng</label>
                            <div class="dropdown guest-selector me-2">
                                <input type="number" class="form-guest-selector form-control selection-result"
                                    name="soluong" id="soluong" value="1" min=1 max=100>
                                @error('soluong')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button -->
            <div class="btn-position-md-middle">
                {{-- <a class="icon-lg btn btn-round btn-primary mb-0" href="#"><i class="bi bi-search fa-fw"></i></a> --}}
                <button class="icon-lg btn btn-round btn-primary mb-0" type="submit"><i
                        class="bi bi-search fa-fw"></i></button>
            </div>
        </form>
        <!-- Booking from END -->
    </div>
</div>
<!-- Search END -->
