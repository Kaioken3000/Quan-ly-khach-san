<!-- Main navbar START -->
<div class="navbar-collapse collapse" id="navbarCollapse">
    <!-- Nav Search START -->
    <div class="col-xxl-6">
        <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
            <div class="nav-item w-100">
                <form action="/client/search-phong" method="get" class="rounded position-relative">
                    @csrf
                    <input class="form-control pe-5 bg-secondary bg-opacity-10" type="search" placeholder="Search"
                        name="search" id="search-input" aria-label="Search">
                    {{-- Search button --}}
                    <button
                        class="btn btn-link bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                        type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
                    {{-- Micro button --}}
                </form>
            </div>
            <button id="toggleButton" class="btn btn-link bg-transparent my-4"><i class="fa fa-microphone"
                    style="font-size: 25px"></i></button>
            <div id="transcription" class=""></div>
        </div>
    </div>
    <div class="d-flex px-1 align-items-center col-xxl-6">
        <div id="status" class=""></div>
        <div class="spinner-grow" role="status" id="hearing">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Nav Search END -->
</div>
<!-- Main navbar END -->
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
                statusDiv.textContent = "Đang lắng nghe...";
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
