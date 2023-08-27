<div class="d-flex">
    <div class="flex-grow-1">
        <h5 class="text-700 fw-semi-bold mx-3 mt-3">Thông tin chi tiết miêu tả</h5>
    </div>
    <div>
        @foreach ($chinhanhs as $chinhanh)
            @include('chinhanhs.modal.modalThemMieutaChinhanh')
        @endforeach
    </div>
</div>
<table>
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Nội dung</th>
            @hasanyrole('MainAdmin|Admin')
                <th>Action</th>
            @endhasanyrole
        </tr>
    </thead>
    <tbody>
        @foreach ($chinhanhs as $chinhanh)
            <tr>
                <td>
                    @foreach ($chinhanh->mieutachinhanhs as $mieutachinhanh)
                        <?php $mieuta = App\Models\Mieuta::where('id', $mieutachinhanh->mieutaid)->first(); ?>
                        <div class="d-flex justify-content-between gap-1">
                            {!! $mieuta->noidung !!}
                            <div>
                                @include('chinhanhs.modal.modalXoaMieutaChinhanh')
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
