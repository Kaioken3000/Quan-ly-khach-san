<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form action="/client/search-phong" method="get" class="search-model-form">
            @csrf
            <input type="text" id="search-input" placeholder="Search here....." name="search">

            <div class="d-flex px-1 align-items-center">
                <div id="status" class="text-white"></div>
                <div class="spinner-grow text-white" role="status" id="hearing">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </form>

        {{-- <button id="toggleButton">Start Speech Recognition</button> --}}
        <button id="toggleButton" class="rounded-circle border-0" style="width: 50px; height: 50px"><i
                class="fa fa-microphone" style="font-size: 25px"></i></button>
        {{-- <input type="button" id="toggleButton" value="Start Speech Recognitio"> --}}

        <div id="transcription" class="text-white"></div>
    </div>
</div>
<script>
    var hearingDiv = document.getElementById("hearing");
    hearingDiv.style.display = "none";
    
    var transcriptionDiv = document.getElementById("transcription");
    var searchInputDiv = document.getElementById("search-input");
    var toggleButton = document.getElementById("toggleButton");
    var statusDiv = document.getElementById("status");
    // var languageSelect = document.getElementById("languageSelect");
    var isListening = false;
    var recognition = null;

    toggleButton.addEventListener("click", function() {
        if (!isListening) {
            startRecording();
        } else {
            stopRecording();
        }
    });

    // languageSelect.addEventListener("change", function() {
    //     stopRecording();
    // });

    function startRecording() {
        try {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            // recognition.lang = languageSelect.value;
            recognition.lang = "vi-VN";

            recognition.onstart = function(event) {
                // toggleButton.textContent = "Stop Speech Recognition";
                statusDiv.textContent = "Speech recognition in progress...";
                hearingDiv.style.display = "";
            };

            recognition.onresult = function(event) {
                var transcription = "";
                for (var i = event.resultIndex; i < event.results.length; ++i) {
                    transcription += event.results[i][0].transcript;
                }
                // transcriptionDiv.innerHTML =
                //     "<p>" + transcription + "</p>" + transcriptionDiv.innerHTML;
                searchInputDiv.value = transcription;
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
                statusDiv.textContent = "";
                hearingDiv.style.display = "none";
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
        hearingDiv.style.display = "none";
        isListening = false;
    }
</script>
<!-- Search model end -->
