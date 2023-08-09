<section class="section mt-3">
    <div class="container">
        <div id="exTab1" class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#1a" data-toggle="tab">Thông Tin Phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#2a" data-toggle="tab">Lịch sử phòng ở</a>
                </li>
            </ul>

            <div class="tab-content clearfix">
                <div class="tab-pane active" id="1a">
                    @include('client.layouts2.yourRoomDetailTable')
                </div>
                <div class="tab-pane" id="2a">
                    @include('client.layouts2.yourRoomDetailHistory')
                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <style>
            .nav-item a{
                color: black
            }
        </style>
</section>
