<!DOCTYPE html>
<html>

@hasanyrole('MainAdmin|Admin|User')
    {{-- For admin --}}
    @include('Chatify::layouts.appForAdmin')
@endhasanyrole

@hasrole('Khachhang')
    {{-- For client --}}
    @include('Chatify::layouts.appForClient')
@endhasrole

</html>
