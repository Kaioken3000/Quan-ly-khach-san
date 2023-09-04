<form action="{{ route('chinhanhs.store') }}" method="POST" class="w-25">
    @csrf
    @foreach ($hinhs as $hinh)
        <input class="form-check-input" type="checkbox" id="hinh{{ $hinh->id }}" name="hinhid[]"
            value="{{ $hinh->id }}" hidden>
    @endforeach
    @foreach ($mieutas as $mieuta)
        <input class="form-check-input" type="checkbox" id="mieuta{{ $mieuta->id }}" name="mieutaid[]"
            value="{{ $mieuta->id }}" hidden>
    @endforeach
    <div class="mb-3">
        <label class="form-label" for="ten">Tên chi nhánh</label>
        <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: P1" required />
        @error('ten')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="soluong">Số lượng phòng</label>
        <input type="number" name="soluong" class="form-control" id="soluong" min=0 required />
        @error('soluong')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="thanhpho">Thành phố</label>
        <select data-child="niv1" class="selectdata form-control custom-select" name="thanhpho">
            @foreach ($response as $item)
                <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
        @error('thanhpho')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="thanhpho">Quận</label>
        <select id="niv1" data-child="niv2" class="selectdata form-control custom-select" name="quan">
            @foreach ($response as $item)
                @foreach ($item['districts'] as $i)
                    <option data-group="{{ $item['name'] }}" value="{{ $item['name'] }}-{{ $i['name'] }}">
                        {{ $i['name'] }}
                    </option>
                @endforeach
            @endforeach
            @error('quan')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="sdt">Số điện thoại</label>
        <input type="number" name="sdt" class="form-control" id="sdt" min=0 required />
        @error('sdt')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("[data-child]").change(function() {
        const selectedGroup = $(this).val();
        if (selectedGroup == null) {
            $("#" + $(this).attr("id")).hide();
        } else {
            console.log(this)
            $("#" + $(this).attr("id")).show();
        }
        var $childSelect = $("#" + $(this).attr("data-child"));
        value = $childSelect
            .find("option")
            .hide()
            .filter(function(i, e) {
                return $(e).val().startsWith(selectedGroup);
            })
            .show()
            .eq(0)
            .val();
        $childSelect.val(value);
        $childSelect.trigger("change");
    });
    $("[data-child]").eq(0).trigger("change");
</script>
