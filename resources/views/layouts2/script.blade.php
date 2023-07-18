{{-- <!-- js -->
<script src="/bootstrap4/vendors/scripts/core.js"></script>
<script src="/bootstrap4/vendors/scripts/script.min.js"></script>
<script src="/bootstrap4/vendors/scripts/process.js"></script>
<script src="/bootstrap4/vendors/scripts/layout-settings.js"></script>
<script src="/bootstrap4/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="/bootstrap4/vendors/scripts/dashboard3.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --> --}}

<!-- js -->
<script src="/bootstrap4/vendors/scripts/core.js"></script>
<script src="/bootstrap4/vendors/scripts/script.min.js"></script>
<script src="/bootstrap4/vendors/scripts/process.js"></script>
<script src="/bootstrap4/vendors/scripts/layout-settings.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="/bootstrap4/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="/bootstrap4/src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="/bootstrap4/vendors/scripts/datatable-setting.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script>
    $(document).ready(function() {
        // var table = $('#DataTables_Table_0').DataTable();
        var table = $('.table').DataTable();

        // Sort by column 1 and then re-draw
        table
            .order([0, 'desc'])
            .draw();
    });

    function filterColumn(columnIndex, value) {
        let table = $(".table").DataTable();
        table
            .columns([5,6])
            .search("")
            .draw();
        table
            .column(columnIndex)
            .search(value)
            .draw();
    }
</script>
