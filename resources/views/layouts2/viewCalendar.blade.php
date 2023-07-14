<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>
<body>
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
                editable: false
                , height: 600
                , resourceAreaWidth: 230
                , aspectRatio: 1.5
                , events: SITEURL + "/userfullcalender"
                , displayEventTime: false
                , editable: false
                , eventRender: function(event, element, view) {
                        if (event.allDay === 'true') {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                        // chuyen tu id nhanvien sang ten nhan vien
                        @foreach($allNhanvien as $thisnhanvien)
                        if (event.title == "{{$thisnhanvien->ma}}") {
                            event.title = "{{$thisnhanvien->ten}}";
                            element.find('.fc-title').text("{{$thisnhanvien->ten}}")
                        }
                        @endforeach
                        //Check what is the key for description in event and use that one.
                        if (event.catrucid) {
                            // chuyen tu id catruc sang ten catruc
                            @foreach($catrucs as $catruc)
                            if (event.catrucid == "{{$catruc->id}}") {
                                event.catrucid = "{{$catruc->ten}}";
                            }
                            @endforeach
                            element.find('.fc-title').append("-" + event.catrucid);
                        }
                    }
                    // , eventLimit: true, // for all non-TimeGrid views
                    // views: {
                    //     timeGrid: {
                    //         eventLimit: 2 // adjust to 6 only for timeGridWeek/timeGridDay
                    //     }
                    // }
                , selectable: true
                , selectHelper: true
            });

            change();

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }

    </script>

</body>
