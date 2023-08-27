<div class="d-flex">
    <div class="flex-grow-1">
        <h5 class="text-700 fw-semi-bold mx-3 mt-3">Thông tin chi tiết hình</h5>
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
                <td style="width: 100%">
                    <div class="row">
                        @foreach ($chinhanh->hinhchinhanhs as $hinhchinhanh)
                            <div class="mb-1 col-4">
                                <?php $hinh = App\Models\Hinh::where('id', $hinhchinhanh->hinhid)->first(); ?>
                                <img data-bs-toggle="tooltip" data-bs-popup="tooltip-custom" data-bs-placement="top"
                                    title="{{ $hinh->vitri }}" src="/client/images/{{ $hinh->vitri }}"
                                    class="img-fluid" style="max-width: 180px">
                                <div class="d-flex">
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
