<?php 
    $today = date("Y-m-d");
    $checkin = App\Models\Check::where("nhanvienid", Auth::user()->id)->latest()->first();
    ?>
@if($checkin)
    @if($today > $checkin->ngaycheckin)
    <form action="/checkin" method="post" class="mr-1">
        @csrf
        @method('POST')
        <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
        <button type="submit" class="btn btn-primary">Checkin</button>
    </form>
    @endif
    @if($checkin->ngaycheckout == null)
    <form action="/checkout" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
    @endif
@else
    <form action="/checkin" method="post" class="mr-1">
        @csrf
        @method('POST')
        <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
        <button type="submit" class="btn btn-primary">Checkin</button>
    </form>
    <form action="/checkout" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{Auth::user()->id}}" name="nhanvienid">
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script>
    function displayMessage(message) {
        toastr.success(message, 'Event');
    }

</script>
@if(session()->has('message'))
<script>
    displayMessage("{{session()->get('message')}}")

</script>
@endif