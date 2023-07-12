<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body>
    <div class="pd-20 card-box mb-30 mt-3">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Nhập thông tin</h4>
            </div>
        </div>
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label class="weight-600">Ca trực</label>
                        @foreach($catrucs as $catruc)
                        <div class="form-check">
                            <input class="" type="checkbox" id="catruc{{$catruc->id}}" name="catrucid[]" value="{{$catruc->id}}">
                            <label>
                                {{$catruc->ten}}: {{$catruc->giobatdau}} - {{$catruc->gioketthuc}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nhân viên</label>
                <select class="form-control" name="nhanvienid" id="nhanvienid" class="nhanvienid">
                    @foreach($allNhanvien as $thisNhanvien)
                    <option value="{{$thisNhanvien->ma}}">{{$thisNhanvien->ma}} - {{$thisNhanvien->ten}}</option>
                    @endforeach
                </select>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
            </div>
        </form>
    </div>
    <div id='calendar' class="card-box p-3 my-3"></div>
    <script>
        catrucid = "";
        catrucChecks = []
        nhanvienid = "{{$allNhanvien[0]->ma}}";

        function change() {
            $("input[type=checkbox]").on("change", function() {
                if (this.checked) {
                    catrucChecks.push(this.value)
                } else {
                    var index = catrucChecks.indexOf(this.value);
                    if (index > -1) {
                        catrucChecks.splice(index, 1);
                    }
                }
            });
            $('select').on('change', function() {
                nhanvienid = this.value;
            });
        }
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true
                , height: 600
                , resourceAreaWidth: 230
                , aspectRatio: 1.5
                , events: SITEURL + "/fullcalender"
                , displayEventTime: false
                , editable: true
                , eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                    //Check what is the key for description in event and use that one.
                    if (event.catrucid) {
                        element.find('.fc-title').append("- Ca trực: " + event.catrucid);
                    }
                }
                , selectable: true
                , selectHelper: true
                , select: function(start, end, allDay) {
                    var title = "1";
                    // catrucid = prompt('Ca truc id:');
                    // nhanvienid = prompt('Nhan vien id:');
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                        for (var i = 0; i < catrucChecks.length; i++) {
                            catrucid = catrucChecks[i]
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax"
                                , data: {
                                    catrucid: catrucid
                                    , nhanvienid: nhanvienid
                                    , ngaybatdau: start
                                    , ngayketthuc: end
                                    , type: 'add'
                                }
                                , type: "POST"
                                , success: function(data) {
                                    console.log(data)
                                    displayMessage("Event Created Successfully");
                                    calendar.fullCalendar('renderEvent', {
                                        id: data.id
                                        , title: nhanvienid + "- Ca trực: " + data.catrucid
                                        , start: start
                                        , end: end
                                        , allDay: allDay
                                    }, true);

                                    calendar.fullCalendar('unselect');
                                }
                            });
                        }
                    }
                }
                , eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    $.ajax({
                        url: SITEURL + '/fullcalenderAjax'
                        , data: {
                            ngaybatdau: start
                            , ngayketthuc: end
                            , id: event.id
                            , type: 'update'
                        }
                        , type: "POST"
                        , success: function(response) {
                            displayMessage("Event Updated Successfully");
                        }
                    });
                }
                , eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST"
                            , url: SITEURL + '/fullcalenderAjax'
                            , data: {
                                id: event.id
                                , type: 'delete'
                            }
                            , success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event Deleted Successfully");
                            }
                        });
                    }
                }

            });

            change();

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

    </script>

</body>
