<!DOCTYPE html>
<html lang="vi">

@include('client.layouts2.head')

<body>

    {{-- @include('client.layouts2.loader') --}}

    @include('client.layouts2.menu')

    @include('client.layouts2.header')

    {{-- content --}}
    {{-- <style>
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
                        <span>Virtual tour</span>
                        <h2>Enjoy our virtual tour show</h2>
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

                // panorama = new PANOLENS.ImagePanorama('https://i.imgur.com/wTCPouq.jpg');
                // panorama = new PANOLENS.ImagePanorama('/bootstrap4/vendors/images/ImagePanorama.jpg');
                panorama = new PANOLENS.ImagePanorama('/bootstrap4/vendors/images/panorama_image.jpg');


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
    </div> --}}
    <style>
        body {
            margin: 0;
        }

        iframe {
            /* height: calc(100vh - 4px);
            width: calc(100vw - 4px); */
            height: 500px;
            width: 100%;
            box-sizing: border-box;
        }

        .menu {
            display: none
        }

    </style>
    <section class="services-section spad py-5 my-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Virtual tour</span>
                        <h2>Enjoy our virtual tour show</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        {{-- <iframe src="https://www.vrwix.com/vr/hotel/IND/Tamil_Nadu/Chennai/Hilton-Chennai" frameborder="0" allowfullscreen></iframe> --}}
        <iframe src="https://www.vrwix.com/vr/hotel/IND/Kerala/Thiruvananthapuram/Wayanad-Silverwoods-Resorts?isAutoPlay=true&isHotelDetails=true" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- Services Section End
    {{-- content --}}

    @include('client.layouts2.footer')

    @include('client.layouts2.search')

    @include('client.layouts2.script')

</body>

</html>
