<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form action="/client/search-phong" method="get" class="search-model-form">
            @csrf
            <input type="text" id="search-input" placeholder="Search here....." name="search">
        </form>
    </div>
</div>
<!-- Search model end -->
