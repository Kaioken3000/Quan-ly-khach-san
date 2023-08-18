<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="/Phoenix_files/popper.min.js.download"></script>
<script src="/Phoenix_files/bootstrap.min.js.download"></script>
<script src="/Phoenix_files/anchor.min.js.download"></script>
<script src="/Phoenix_files/is.min.js.download"></script>
<script src="/Phoenix_files/all.min.js.download"></script>
<script src="/Phoenix_files/lodash.min.js.download"></script>
<script src="/Phoenix_files/polyfill.min.js.download"></script>
<script src="/Phoenix_files/list.min.js.download"></script>
<script src="/Phoenix_files/feather.min.js.download"></script>
<script src="/Phoenix_files/dayjs.min.js.download"></script>
<script src="/Phoenix_files/choices.min.js.download"></script>
<script src="/Phoenix_files/echarts.min.js.download"></script>
<script src="/Phoenix_files/dhtmlxgantt.js.download"></script>
<script src="/Phoenix_files/phoenix.js.download"></script>
<script src="/Phoenix_files/projectmanagement-dashboard.js.download"></script>

{{-- datatable --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

{{-- for edit text --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.2/tinymce.min.js"
    integrity="sha512-lLE5tUMZXmDmyGWI5KDlFemVusXiALcU1lPibL4xkPbPvuOXfXcdoeU3KBDxWp18/KOzrfKkgsscN1t9740ciA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- flatpickr --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    let table = new DataTable('.table');
    $(document).ready(function() {

        // Sort by column 1 and then re-draw
        table
            .order([0, 'desc'])
            .draw();
    });

    function filterColumn(columnIndex, value) {
        let table = $(".table").DataTable();
        table
            .columns([5, 6, 7])
            .search("")
            .draw();
        table
            .column(columnIndex)
            .search(value)
            .draw();
    }

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
    function locPhongTheoLoaiphong(loaiphongten, index) {
        // let table = new DataTable('.table');
        table
            .columns(index)
            .search("")
            .draw();
        table
            .columns(index)
            .search(loaiphongten)
            .draw();
    }
</script>

<style>
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
