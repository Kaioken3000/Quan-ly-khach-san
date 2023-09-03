<div class="d-flex">
    <div class="flex-grow-1 mt-2">
        <h4 class="card-title">Thông tin chi tiết hình</h4>
    </div>
    <div>
        @foreach ($chinhanhs as $chinhanh)
            @include('chinhanhs.modal.modalThemHinhChinhanh')
        @endforeach
    </div>
</div>
<table>
    <thead>
        <tr>
            <th>Chi nhánh</th>
            <th>Hình</th>
            @hasanyrole('MainAdmin|Admin')
                <th>Action</th>
            @endhasanyrole
        </tr>
    </thead>
    <tbody>
        @foreach ($chinhanhs as $chinhanh)
            <tr>
                <td style="width: 95%">
                    <div class="row">
                        @foreach ($chinhanh->hinhchinhanhs as $hinhchinhanh)
                            <div class="mb-1 col-5">
                                <?php $hinh = App\Models\Hinh::where('id', $hinhchinhanh->hinhid)->first(); ?>
                                <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                    title="{{ $hinh->vitri }}" src="/client/images/{{ $hinh->vitri }}"
                                    class="img-fluid rounded " style="max-width: 180px">
                                <div class="d-flex mt-1">
                                    <p class="flex-grow-1">{{ $hinh->vitri }}</p>
                                    <div>
                                        @include('chinhanhs.modal.modalXoaHinhChinhanh')
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
