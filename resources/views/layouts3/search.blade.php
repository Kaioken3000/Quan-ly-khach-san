<div class="search-box d-none d-lg-block" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}" style="width:25rem;">



    @if (Request::is('loaiphongs') || Request::is('loaiphongs*'))
        <form action="loaiphongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('phongs') || Request::is('phongs*'))
        <form action="phongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('dichvus') || Request::is('dichvus*'))
        <form action="dichvus-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('phongs') || Request::is('phongs*'))
        <form action="phongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('khachhangs') || Request::is('khachhangs*'))
        <form action="khachhangs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('datphongs') || Request::is('datphongs*'))
        <form action="datphongs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('nhanviens') || Request::is('nhanviens*'))
        <form action="nhanviens-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('users') || Request::is('users*'))
        <form action="users-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @elseif(Request::is('catrucs') || Request::is('catrucs*'))
        <form action="catrucs-search" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            @csrf
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @else
        <form action="#" class="position-relative" data-bs-toggle="search" data-bs-display="static"
            aria-expanded="false" method="get">
            <input class="form-control form-control-sm rounded-pill search-input fuzzy-search" type="search"
                placeholder="Search..." aria-label="Search" name="search">
            <span class="fas fa-search search-box-icon"></span>
        </form>
    @endif

    <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
        data-bs-dismiss="search">
        <button type="submit" class="btn btn-link btn-close-falcon p-0" aria-label="Close">
        </button>
    </div>
</div>
