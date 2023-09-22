<!-- Blog Section Begin -->
<div class="row align-items-center">

    <form action="/client/search-phong" method="get">
        @csrf
        <input type="text" id="search-input" placeholder="Tìm kiếm phòng....." name="search"
            class="form-control form-control-lg-border">
            <div id="status"></div>
    </form>
    <button id="toggleButton" class="rounded-circle border-0 mx-3" style="width: 50px; height: 50px"><i
            class="fa fa-microphone" style="font-size: 25px"></i></button>

    <div id="transcription"></div>

    <script>
        var transcriptionDiv = document.getElementById("transcription");
        var toggleButton = document.getElementById("toggleButton");
        var statusDiv = document.getElementById("status");
        var searchInput = document.getElementById("search-input");
        var isListening = false;
        var recognition = null;

        toggleButton.addEventListener("click", function() {
            if (!isListening) {
                startRecording();
            } else {
                stopRecording();
            }
        });

        function startRecording() {
            try {
                recognition = new webkitSpeechRecognition();
                recognition.continuous = true;
                recognition.lang = "vi-VN";

                recognition.onstart = function(event) {
                    // toggleButton.textContent = "Stop Speech Recognition";
                    statusDiv.textContent = "Đang lắng nghe...";
                };

                recognition.onresult = function(event) {
                    var transcription = "";
                    for (var i = event.resultIndex; i < event.results.length; ++i) {
                        transcription += event.results[i][0].transcript;
                    }
                    // transcriptionDiv.innerHTML =
                    //     "<p>" + transcription + "</p>" + transcriptionDiv.innerHTML;
                    searchInput.value = transcription;
                };

                recognition.onerror = function(event) {
                    console.error(
                        "An error occurred during speech recognition: ",
                        event.error
                    );
                    statusDiv.textContent = "Error: Speech recognition encountered an error.";
                    stopRecording();
                };

                recognition.onnomatch = function(event) {
                    console.error("No speech recognized: ", event);
                    statusDiv.textContent =
                        "Error: No speech recognized. Please check your microphone permissions.";
                };

                recognition.onend = function() {
                    // toggleButton.textContent = "Start Speech Recognition";
                    // statusDiv.textContent = "Speech recognition stopped.";
                    isListening = false;
                };

                recognition.start();
                isListening = true;
            } catch (error) {
                console.error(
                    "An error occurred while starting speech recognition: ",
                    error
                );
                statusDiv.textContent = "Error: Speech recognition could not be started.";
            }
        }

        function stopRecording() {
            if (recognition) {
                recognition.stop();
                recognition = null;
            }
            // toggleButton.textContent = "Start Speech Recognition";
            statusDiv.textContent = "";
            isListening = false;
        }
    </script>
</div>
<!-- Blog Section End -->
