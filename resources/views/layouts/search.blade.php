@if(Request::is('loaiphongs') || Request::is('loaiphongs*'))
    <form action="loaiphongs-search" method="GET">
        @csrf
        <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
    </form>
@elseif(Request::is('phongs') || Request::is('phongs*'))
    <form action="phongs-search" method="GET">
        @csrf
        <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
    </form>
@elseif(Request::is('khachhangs') || Request::is('khachhangs*'))
    <form action="khachhangs-search" method="GET">
        @csrf
        <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
    </form>
@elseif(Request::is('datphongs') || Request::is('datphongs*'))
    <form action="datphongs-search" method="GET">
        @csrf
        <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
    </form>
@else
    <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
@endif