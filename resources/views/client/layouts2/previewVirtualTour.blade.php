<!-- Latest compiled and minified JavaScript -->
<script src="/pannellum/pannellum.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/pannellum/pannellum.css">
<style>
    #panorama {
        width: 100%;
        height: {{$height}};
    }
</style>
<div class="d-flex justify-content-center">
    <div id="panorama"></div>
</div>
<script>
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "/client/images/{{ $virtualtour->hinh }}",
        "autoLoad": true,
        "hfov": 120
    });
</script>
