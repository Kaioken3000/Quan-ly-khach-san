<style>
    #viewer {
        width: 100%;
        height: 100%;
    }

    #container {
        width: 100%;
        height: 100%;
    }

</style>
<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Chuyến tham quan ảo</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="card" id="viewer">
    <div class="card-body">
        <script src="//cdnjs.cloudflare.com/ajax/libs/three.js/105/three.js"></script>
        <script src="//cdn.jsdelivr.net/npm/panolens@0.11.0/build/panolens.min.js"></script>

        <div id="container"></div>
        <script>
            var panorama, viewer, container, infospot, infospot2;

            container = document.querySelector('#container');

            panorama = new PANOLENS.ImagePanorama('https://i.imgur.com/wTCPouq.jpg');


            infospot = new PANOLENS.Infospot();
            infospot.position.set(1000, 100, -2000);

            infospot2 = new PANOLENS.Infospot();
            infospot2.position.set(1000, 100, 2000);

            panorama.add(infospot, infospot2);

            viewer = new PANOLENS.Viewer({
                container: container
            });
            viewer.add(panorama);

        </script>

    </div>
</div>
<!-- Services Section End -->
