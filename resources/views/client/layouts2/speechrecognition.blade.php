<div class="container">
    <div class="d-flex">
        <div>
            <form action="/client/search-phong" method="get" class="d-flex">
                @csrf
                <input type="text" id="search-input" placeholder="Tìm kiếm phòng....." name="search"
                    class="form-control form-control-lg-border">
                <div id="status"></div>
            </form>
            <div id="message" class="message" name="search"></div>
        </div>
        <div>
            <button id="talk_button" type="button" onclick="talkWithApp(event)"
                class="rounded-circle border-0 mx-3" style="width: 50px; height: 50px">
                <i class="fa fa-microphone" style="font-size: 25px"></i>
            </button>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var final_transcript = '';
    var recognizing = false;
    var ignore_onend;
    var start_timestamp;


    // Speech Recognition
    if (!('webkitSpeechRecognition' in window)) {
        message.innerHTML =
            'Web Speech API is not supported by this browser. Upgrade to <a href="//www.google.com/chrome">Chrome</a> version 25 or later.';
    } else {
        var recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;

        recognition.onstart = function() {
            recognizing = true;
            message.innerHTML = 'Đang lắng nghe.';
           // talk_button.innerHTML = 'Đang nghe';
        };

        recognition.onresult = function(event) {
            var interim_transcript = '';
            for (var i = event.resultIndex; i < event.results.length; ++i) {
                if (event.results[i].isFinal) {
                    final_transcript += event.results[i][0].transcript;
                } else {
                    interim_transcript += event.results[i][0].transcript;
                }
            }
            // final_span.innerHTML = final_transcript;
            $('#search-input').val(final_transcript)
            interim_span.innerHTML = interim_transcript;
        };

        recognition.onend = function() {

            recognizing = false;
            if (ignore_onend) {
                return;
            }
            speechMyText(final_transcript);
            if (!final_transcript) {
                message.innerHTML = '';
                // talk_button.innerHTML = 'Tìm kiếm';
                return;
            }
        };

        recognition.onerror = function(event) {
            if (event.error == 'no-speech') {
                message.innerHTML = 'Không có lời nói nào được phát hiện.';
                ignore_onend = true;
            }
            if (event.error == 'audio-capture') {
                message.innerHTML = 'Không tìm thấy micrô. Đảm bảo rằng micrô đã được cài đặt.';
                ignore_onend = true;
            }
            if (event.error == 'not-allowed') {
                if (event.timeStamp - start_timestamp < 100) {
                    message.innerHTML =
                        'Quyền sử dụng micrô bị chặn. Để thay đổi hãy vào chrome://settings/contentExceptions#media-stream';
                } else {
                    message.innerHTML = 'Quyền sử dụng micrô đã bị từ chối.';
                }
                ignore_onend = true;
            }
        };

        recognition.start()

    }

    function talkWithApp(event) {
        if (recognizing) {
            recognition.stop();
            message.innerHTML = '';
            // talk_button.innerHTML = 'Tìm kiếm';
            return;
        }
        final_transcript = '';
        // recognition.lang = language.value;
        recognition.lang = 'vi';
        recognition.start();
        ignore_onend = false;
        // final_span.innerHTML = '';
        $('#search-input').val('')
        interim_span.innerHTML = '';
        message.innerHTML = 'Nhấp vào nút "Cho phép" ở trên để bật micrô của bạn.';
        start_timestamp = event.timeStamp;
    }

    // Speech Synthesis
    function speechMyText(textToSpeech) {
        var u = new SpeechSynthesisUtterance();
        u.text = textToSpeech;
        // u.lang = language.value;
        u.lang = 'vi';
        u.rate = 1.0;
        u.onend = function(event) {}
        speechSynthesis.speak(u);
    }
</script>
