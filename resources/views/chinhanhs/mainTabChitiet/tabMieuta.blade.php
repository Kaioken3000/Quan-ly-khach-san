<div class="d-flex">
    <div class="flex-grow-1 mt-2">
        <h4 class="card-title">Thông tin chi tiết miêu tả</h4>
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
