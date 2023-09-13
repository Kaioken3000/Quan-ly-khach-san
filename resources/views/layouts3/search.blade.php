<div class="search-box d-none d-lg-block" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}" style="width:25rem;">



    @if (Request::is('loaiphongs') || Request::is('loaiphongs*'))
        <form action="loaiphongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm loại phòng..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('phongs') || Request::is('phongs*'))
        <form action="phongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm phòng..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('dichvus') || Request::is('dichvus*'))
        <form action="dichvus-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm dịch vụ..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    {{-- @elseif(Request::is('phongs') || Request::is('phongs*'))
        <form action="phongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm phòng..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form> --}}
    @elseif(Request::is('khachhangs') || Request::is('khachhangs*'))
        <form action="khachhangs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm khách hàng..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    {{-- @elseif(Request::is('datphongs') || Request::is('datphongs*'))
        <form action="datphongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm đặt phòng..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form> --}}
    @elseif(Request::is('nhanviens') || Request::is('nhanviens*'))
        <form action="nhanviens-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm nhân viên..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('users') || Request::is('users*'))
        <form action="users-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm tài khoản..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('catrucs') || Request::is('catrucs*'))
        <form action="catrucs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm ca trực..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('chinhanhs') || Request::is('chinhanhs*'))
        <form action="chinhanhs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm chi nhánh..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('thietbis') || Request::is('thietbis*'))
        <form action="thietbis-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm thiết bị..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('giuongs') || Request::is('giuongs*'))
        <form action="giuongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm giường..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('hinhs') || Request::is('hinhs*'))
        <form action="hinhs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm hình..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('virtualtours') || Request::is('virtualtours*'))
        <form action="virtualtours-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm virtual tour..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('mieutas') || Request::is('mieutas*'))
        <form action="mieutas-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm miêu tả..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('anuongs') || Request::is('anuongs*'))
        <form action="anuongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm dịch vụ ăn uống..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @else
        {{-- <form action="#" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Tìm kiếm..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form> --}}
    @endif

    {{-- <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
        data-bs-dismiss="search">
        <button type="submit" class="btn btn-link btn-close-falcon p-0" aria-label="Close">
        </button>
    </div> --}}
</div>
