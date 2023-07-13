<!DOCTYPE html>
<html>

@hasrole(['Admin', 'User'])

{{-- For admin --}}
@include('Chatify::layouts.appForAdmin')

@endhasrole

@hasrole('Khachhang')
{{-- For client --}}
@include('Chatify::layouts.appForClient')

@endhasrole

</html>
