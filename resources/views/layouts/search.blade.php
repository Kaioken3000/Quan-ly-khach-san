@if(Request::is('loaiphongs') || Request::is('loaiphongs*'))
    <form action="loaiphongs-search" method="POST">
        @csrf
        <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
    </form>
@elseif(Request::is('phongs') || Request::is('phongs*'))
    <form action="phongs-search" method="POST">
        @csrf
        <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
    </form>
@else
    <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
@endif