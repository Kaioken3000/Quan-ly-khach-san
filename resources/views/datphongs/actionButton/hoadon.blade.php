<form action="generate-invoice-pdf" method="get" class="my-1 col-6" target="_blank">
    @csrf
    <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
    <button type="submit" class="btn btn-info"><i class="fa fa-file"></i> In hoá đơn</button>
</form>
