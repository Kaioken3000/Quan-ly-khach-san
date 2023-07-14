<form action="generate-invoice-pdf" method="get" class="my-1 col-4">
    @csrf
    <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
    <button type="submit" class="w-100 btn btn-info"><i class="fa fa-file mb-1"></i> In hoá đơn</button>
</form>
