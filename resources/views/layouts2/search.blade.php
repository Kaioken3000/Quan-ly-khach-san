@if(Request::is('loaiphongs') || Request::is('loaiphongs*'))
    <form action="loaiphongs-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('dashboard') || Request::is('dashboard*'))
    <form action="#" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('phongs') || Request::is('phongs*'))
    <form action="phongs-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('dichvus') || Request::is('dichvus*'))
    <form action="dichvus-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('phongs') || Request::is('phongs*'))
    <form action="phongs-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('khachhangs') || Request::is('khachhangs*'))
    <form action="khachhangs-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('datphongs') || Request::is('datphongs*'))
    <form action="datphongs-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('nhanviens') || Request::is('nhanviens*'))
    <form action="nhanviens-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@elseif(Request::is('users') || Request::is('users*'))
    <form action="users-search" method="GET">
        <div class="form-group mb-0">
            <i class="dw dw-search2 search-icon"></i>
            @csrf
            <input type="text" name="search" class="form-control search-input" placeholder="Search Here" />
        </div>
    </form>
@else
    <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
@endif