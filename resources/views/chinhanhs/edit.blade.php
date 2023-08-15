@extends('layouts3.app')

@section('content')
    @hasrole('Admin')
        <ul class="nav nav-underline" id="myTab" role="tablist">
            <li class="nav-item" role="presentation"><a class="nav-link active" id="thongtin-tab" data-bs-toggle="tab"
                    href="#tab-thongtin" role="tab" aria-controls="tab-thongtin" aria-selected="true">Thông tin</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" id="hinh-tab" data-bs-toggle="tab" href="#tab-hinh"
                    role="tab" aria-controls="tab-hinh" aria-selected="true">Hình</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" id="mieuta-tab" data-bs-toggle="tab" href="#tab-mieuta"
                    role="tab" aria-controls="tab-mieuta" aria-selected="true">Miêu tả</a></li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
                <form action="{{ route('chinhanhs.update', $chinhanh->id) }}" method="POST" class="w-25">
                    @csrf
                    @method('PUT')
                    @foreach ($hinhs as $hinh)
                        <input class="form-check-input" type="checkbox" id="hinh{{ $hinh->id }}" <?php
                        if (isset($chinhanh)) {
                            foreach ($chinhanh->hinhchinhanhs as $hinhchinhanh) {
                                if ($hinh->id === $hinhchinhanh->hinhid) {
                                    echo 'checked';
                                }
                            }
                        }
                        ?>
                            name="hinhid[]" value="{{ $hinh->id }}" hidden>
                    @endforeach
                    @foreach ($mieutas as $mieuta)
                        <input class="form-check-input" type="checkbox" id="mieuta{{ $mieuta->id }}" <?php
                        if (isset($chinhanh)) {
                            foreach ($chinhanh->mieutachinhanhs as $mieutachinhanh) {
                                if ($mieuta->id === $mieutachinhanh->mieutaid) {
                                    echo 'checked';
                                }
                            }
                        }
                        ?>
                            name="mieutaid[]" value="{{ $mieuta->id }}"hidden>
                    @endforeach
                    <div class="mb-3">
                        <label class="form-label" for="ten">Tên chi nhánh</label>
                        <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: P1"
                            value="{{ $chinhanh->ten }}" required />
                        @error('ten')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="soluong">Số lượng phòng</label>
                        <input type="number" name="soluong" class="form-control" id="soluong" min=0
                            value="{{ $chinhanh->soluong }}" required />
                        @error('soluong')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label" for="thanhpho">Thành phố</label>
                        <input type="text" name="thanhpho" class="form-control" id="thanhpho"
                            value="{{ $chinhanh->thanhpho }}"required />
                        @error('thanhpho')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="quan">Quận</label>
                        <input type="text" name="quan" class="form-control" id="quan" min=1
                            value="{{ $chinhanh->quan }}" required />
                        @error('quan')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <span>Thành phố</span>
                        <select data-child="niv1" class="selectdata form-control custom-select" name="thanhpho">
                            @foreach ($response as $item)
                                <option value="{{ $item['name'] }}"
                                <?php if($chinhanh->thanhpho == $item['name']) echo 'selected';?>
                                >{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <span>Quận</span>
                        <select id="niv1" data-child="niv2" class="selectdata form-control custom-select" name="quan">
                            @foreach ($response as $item)
                                @foreach ($item['districts'] as $i)
                                    <option data-group="{{ $item['name'] }}" value="{{ $item['name'] }}-{{ $i['name'] }}"
                                    <?php if($chinhanh->quan == $i['name']) echo 'selected';?>
                                    >
                                        {{ $i['name'] }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="sdt">Số điện thoại</label>
                        <input type="number" name="sdt" class="form-control" id="sdt" min=0
                            value="{{ $chinhanh->sdt }}"required />
                        @error('sdt')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="tab-hinh" role="tabpanel" aria-labelledby="hinh-tab">
                @include('chinhanhs.tab.tabHinh')
            </div>
            <div class="tab-pane fade" id="tab-mieuta" role="tabpanel" aria-labelledby="mieuta-tab">
                @include('chinhanhs.tab.tabMieuta')
            </div>
        </div>
        <script>
            function changeBoder(ele, element) {
                var elementBtn = document.getElementById(element);
                var eleBtn = document.getElementById(ele);
                if (elementBtn.checked == true) {
                    eleBtn.style.border = 'none';
                } else {
                    eleBtn.style.border = '3px black solid';
                }
            }
        </script>
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
    @endhasrole
@endsection
