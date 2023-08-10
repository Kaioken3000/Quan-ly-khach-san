<section class="section mt-3">
    <div id="exTab1" class="mx-5">
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
                @include('client.yourRoom.yourRoomDetailTable')
            </div>
            <div class="tab-pane" id="2a">
                @include('client.yourRoom.yourRoomDetailHistory')
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        .nav-item a {
            color: black
        }
    </style>
</section>
