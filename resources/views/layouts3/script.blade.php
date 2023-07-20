<script>
    var navbarTopShape = localStorage.getItem('phoenixNavbarTopShape');
    var navbarPosition = localStorage.getItem('phoenixNavbarPosition');
    var body = document.querySelector('body');
    var navbarDefault = document.querySelector('#navbarDefault');
    var navbarTopNew = document.querySelector('#navbarTopNew');
    var navbarSlim = document.querySelector('#navbarSlim');
    var navbarTopSlimNew = document.querySelector('#navbarTopSlimNew');

    var documentElement = document.documentElement;
    var navbarVertical = document.querySelector('.navbar-vertical');

    if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
        navbarDefault.remove();
        navbarTopNew.remove();
        navbarTopSlimNew.remove();
        navbarSlim.style.display = 'block';
        navbarVertical.style.display = 'inline-block';
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        navbarVertical.remove();
        navbarTopNew.remove();
        navbarSlim.remove();
        navbarTopSlimNew.removeAttribute('style');
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        navbarSlim.remove();
        navbarVertical.remove();
        navbarTopSlimNew.remove();
        navbarTopNew.removeAttribute('style');
        documentElement.classList.add('navbar-horizontal')

    } else {
        body.classList.remove('nav-slim');
        navbarSlim.remove();
        navbarTopNew.remove();
        navbarTopSlimNew.remove();
        navbarDefault.removeAttribute('style');
        navbarVertical.removeAttribute('style');
    }

    var navbarTopStyle = localStorage.getItem('phoenixNavbarTopStyle');
    var navbarTop = document.querySelector('.navbar-top');
    if (navbarTopStyle === 'darker') {
        navbarTop.classList.add('navbar-darker');
    }

    var navbarVerticalStyle = localStorage.getItem('phoenixNavbarVerticalStyle');
    var navbarVertical = document.querySelector('.navbar-vertical');
    if (navbarVerticalStyle === 'darker') {
        navbarVertical.classList.add('navbar-darker');
    }
</script>
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

<script>
    $(document).ready(function() {
        // var table = $('#DataTables_Table_0').DataTable();
        let table = new DataTable('.table');

        // Sort by column 1 and then re-draw
        table
            .order([0, 'desc'])
            .draw();
    });

    function filterColumn(columnIndex, value) {
        let table = $(".table").DataTable();
        table
            .columns([5, 6])
            .search("")
            .draw();
        table
            .column(columnIndex)
            .search(value)
            .draw();
    }
</script>

<style>
    #DataTables_Table_0_length label,
    #DataTables_Table_0_filter label {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    #DataTables_Table_0_length label {
        width: 180px;
    }
</style>
