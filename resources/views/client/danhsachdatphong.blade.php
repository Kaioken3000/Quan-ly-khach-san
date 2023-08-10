{{-- <!DOCTYPE HTML>
<html>
@include('client.layouts.head')

<body>

    @include('client.layouts.header')

    @include('client.layouts.session')

    @include('client.layouts.book')
    
    @include('client.layouts2.yourRoomDetail')
    
    @include('client.layouts.footer')

    @include('client.layouts.script')

</body>

</html> --}}

<!DOCTYPE html>
<html lang="vi">

@include('client.layouts2.head')

<body>

    {{-- @include('client.layouts2.loader') --}}

    @include('client.layouts2.menu')

    @include('client.layouts2.header')

    @include('client.yourRoom.yourRoomDetail')

    @include('client.layouts2.footer')

    {{-- @include('client.layouts2.search') --}}

    @include('client.layouts2.script')

</body>

</html>
