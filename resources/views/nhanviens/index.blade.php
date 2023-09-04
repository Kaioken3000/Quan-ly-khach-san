@extends('layouts3.appForCalendar')

@section('content')
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="d-flex mt-5">
        <div class="flex-grow-1">
            @include('layouts3.title', ['titlePage' => 'Quản lý nhân viên và ca trực'])
        </div>
        <div>
            <a class="btn btn-success mb-4" href="{{ route('nhanviens.create') }}"><i class="fas fa-plus"></i>
                Tạo nhân viên</a>
        </div>
    </div>

    @hasrole('MainAdmin')
        <div class="d-flex gap-1 mb-3">
            <div>
                <button class="btn btn-primary" id="chinhanhBtn" onclick="locChinhanh('')">Tất cả</button>
            </div>
            @foreach ($chinhanhs as $chinhanh)
                <div>
                    <button class="btn btn-primary" id="chinhanhBtn{{ $chinhanh->id }}"
                        onclick="locChinhanh('{{ $chinhanh->ten }}')">{{ $chinhanh->ten }}</button>
                </div>
            @endforeach
        </div>
    @endhasrole
    <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="nhanvien-tab" data-bs-toggle="tab" href="#tab-nhanvien"
                role="tab" aria-controls="tab-home" aria-selected="true">Nhân viên</a></li>
        <li class="nav-item"><a class="nav-link" id="catruc-tab" data-bs-toggle="tab" href="#tab-catruc" role="tab"
                aria-controls="tab-profile" aria-selected="false">Ca trực</a></li>
        <li class="nav-item"><a class="nav-link" id="lichtruc-tab" data-bs-toggle="tab" href="#tab-lichtruc" role="tab"
                aria-controls="tab-lichtruc" aria-selected="false">Lịch trực</a></li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-nhanvien" role="tabpanel" aria-labelledby="nhanvien-tab">
            @include('nhanviens.mainTab.tabNhanvien')
        </div>
        <div class="tab-pane fade" id="tab-catruc" role="tabpanel" aria-labelledby="catruc-tab">
            @include('catrucs.create')
            @include('nhanviens.mainTab.tabCatruc')
        </div>
        <script>
            let table = new DataTable('.table');
            $(document).ready(function() {
                // var table = $('#DataTables_Table_0').DataTable();

                // Sort by column 1 and then re-draw
                table
                    .order([0, 'desc'])
                    .draw();
            });

            function locChinhanh(chinhanhid) {
                // let table = new DataTable('.table');
                table
                    .columns(2)
                    .search("")
                    .draw();
                table
                    .columns(2)
                    .search(chinhanhid)
                    .draw();
            }
        </script>


        <div class="tab-pane fade" id="tab-lichtruc" role="tabpanel" aria-labelledby="lichtruc-tab">
            @include('layouts2.calendar')
        </div>
    </div>
    <style>
        .selectize-control {
            border: none;
            padding: 0;
        }

        .dataTables_length label,
        .dataTables_filter label {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .dataTables_length label {
            width: 180px;
        }
    </style>
@endsection
