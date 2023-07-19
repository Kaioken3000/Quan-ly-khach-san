<html>

<body>
    <h1>Speech-to-Text with Google's Web Speech Recognition API</h1>

    <select id="languageSelect">
        <option value="en-US" selected>English (United States)</option>
        <option value="fr-CA">French (Canada)</option>
        <option value="fr-FR">French (France)</option>
        <option value="af-ZA">Afrikaans (South Africa)</option>
        <option value="am-ET">Amharic (Ethiopia)</option>
        <option value="hy-AM">Armenian (Armenia)</option>
        <option value="az-AZ">Azerbaijani (Azerbaijan)</option>
        <option value="id-ID">Indonesian (Indonesia)</option>
        <option value="ms-MY">Malay (Malaysia)</option>
        <option value="bn-BD">Bengali (Bangladesh)</option>
        <option value="bn-IN">Bengali (India)</option>
        <option value="ca-ES">Catalan (Spain)</option>
        <option value="cs-CZ">Czech (Czech Republic)</option>
        <option value="da-DK">Danish (Denmark)</option>
        <option value="de-DE">German (Germany)</option>
        <option value="en-AU">English (Australia)</option>
        <option value="en-CA">English (Canada)</option>
        <option value="en-GH">English (Ghana)</option>
        <option value="en-GB">English (United Kingdom)</option>
        <option value="en-IN">English (India)</option>
        <option value="en-IE">English (Ireland)</option>
        <option value="en-KE">English (Kenya)</option>
        <option value="en-NZ">English (New Zealand)</option>
        <option value="en-NG">English (Nigeria)</option>
        <option value="en-PH">English (Philippines)</option>
        <option value="en-ZA">English (South Africa)</option>
        <option value="en-TZ">English (Tanzania)</option>
        <option value="es-AR">Spanish (Argentina)</option>
        <option value="es-BO">Spanish (Bolivia)</option>
        <option value="es-CL">Spanish (Chile)</option>
        <option value="es-CO">Spanish (Colombia)</option>
        <option value="es-CR">Spanish (Costa Rica)</option>
        <option value="es-EC">Spanish (Ecuador)</option>
        <option value="es-SV">Spanish (El Salvador)</option>
        <option value="es-ES">Spanish (Spain)</option>
        <option value="es-US">Spanish (United States)</option>
        <option value="es-GT">Spanish (Guatemala)</option>
        <option value="es-HN">Spanish (Honduras)</option>
        <option value="es-MX">Spanish (Mexico)</option>
        <option value="es-NI">Spanish (Nicaragua)</option>
        <option value="es-PA">Spanish (Panama)</option>
        <option value="es-PY">Spanish (Paraguay)</option>
        <option value="es-PE">Spanish (Peru)</option>
        <option value="es-PR">Spanish (Puerto Rico)</option>
        <option value="es-DO">Spanish (Dominican Republic)</option>
        <option value="es-UY">Spanish (Uruguay)</option>
        <option value="es-VE">Spanish (Venezuela)</option>
        <option value="eu-ES">Basque (Spain)</option>
        <option value="fil-PH">Filipino (Philippines)</option>
        <option value="gl-ES">Galician (Spain)</option>
        <option value="ka-GE">Georgian (Georgia)</option>
        <option value="gu-IN">Gujarati (India)</option>
        <option value="hr-HR">Croatian (Croatia)</option>
        <option value="zu-ZA">Zulu (South Africa)</option>
        <option value="is-IS">Icelandic (Iceland)</option>
        <option value="it-IT">Italian (Italy)</option>
        <option value="jv-ID">Javanese (Indonesia)</option>
        <option value="kn-IN">Kannada (India)</option>
        <option value="km-KH">Khmer (Cambodia)</option>
        <option value="lo-LA">Lao (Laos)</option>
        <option value="lv-LV">Latvian (Latvia)</option>
        <option value="lt-LT">Lithuanian (Lithuania)</option>
        <option value="hu-HU">Hungarian (Hungary)</option>
        <option value="ml-IN">Malayalam (India)</option>
        <option value="mr-IN">Marathi (India)</option>
        <option value="nl-NL">Dutch (Netherlands)</option>
        <option value="ne-NP">Nepali (Nepal)</option>
        <option value="nb-NO">Norwegian Bokmål (Norway)</option>
        <option value="pl-PL">Polish (Poland)</option>
        <option value="pt-BR">Portuguese (Brazil)</option>
        <option value="pt-PT">Portuguese (Portugal)</option>
        <option value="ro-RO">Romanian (Romania)</option>
        <option value="si-LK">Sinhala (Sri Lanka)</option>
        <option value="sk-SK">Slovak (Slovakia)</option>
        <option value="sl-SI">Slovenian (Slovenia)</option>
        <option value="su-ID">Sundanese (Indonesia)</option>
        <option value="sw-TZ">Swahili (Tanzania)</option>
        <option value="sw-KE">Swahili (Kenya)</option>
        <option value="fi-FI">Finnish (Finland)</option>
        <option value="sv-SE">Swedish (Sweden)</option>
        <option value="ta-IN">Tamil (India)</option>
        <option value="ta-SG">Tamil (Singapore)</option>
        <option value="ta-LK">Tamil (Sri Lanka)</option>
        <option value="ta-MY">Tamil (Malaysia)</option>
        <option value="te-IN">Telugu (India)</option>
        <option value="vi-VN">Vietnamese (Vietnam)</option>
        <option value="tr-TR">Turkish (Turkey)</option>
        <option value="ur-PK">Urdu (Pakistan)</option>
        <option value="ur-IN">Urdu (India)</option>
        <option value="el-GR">Greek (Greece)</option>
        <option value="bg-BG">Bulgarian (Bulgaria)</option>
        <option value="ru-RU">Russian (Russia)</option>
        <option value="sr-RS">Serbian (Serbia)</option>
        <option value="uk-UA">Ukrainian (Ukraine)</option>
        <option value="he-IL">Hebrew (Israel)</option>
        <option value="ar-IL">Arabic (Israel)</option>
        <option value="ar-JO">Arabic (Jordan)</option>
        <option value="ar-AE">Arabic (United Arab Emirates)</option>
        <option value="ar-BH">Arabic (Bahrain)</option>
        <option value="ar-DZ">Arabic (Algeria)</option>
        <option value="ar-SA">Arabic (Saudi Arabia)</option>
        <option value="ar-KW">Arabic (Kuwait)</option>
        <option value="ar-MA">Arabic (Morocco)</option>
        <option value="ar-TN">Arabic (Tunisia)</option>
        <option value="ar-OM">Arabic (Oman)</option>
        <option value="ar-PS">Arabic (Palestinian Authority)</option>
        <option value="ar-QA">Arabic (Qatar)</option>
        <option value="ar-LB">Arabic (Lebanon)</option>
        <option value="ar-EG">Arabic (Egypt)</option>
        <option value="fa-IR">Persian (Iran)</option>
        <option value="hi-IN">Hindi (India)</option>
        <option value="th-TH">Thai (Thailand)</option>
        <option value="ko-KR">Korean (South Korea)</option>
        <option value="cmn-Hans-CN">Chinese, Mandarin (Simplified, China)</option>
        <option value="cmn-Hans-HK">Chinese, Mandarin (Simplified, Hong Kong)</option>
        <option value="cmn-Hant-TW">Chinese, Mandarin (Traditional, Taiwan)</option>
        <option value="yue-Hant-HK">Chinese, Cantonese (Traditional, Hong Kong)</option>
        <option value="ja-JP">Japanese (Japan)</option>
        <option value="cmn-Hans-SG">Chinese, Mandarin (Simplified, Singapore)</option>
    </select>
    <button onclick="getLocalStream()">Allow microphone</button>
    <button id="toggleButton">Start Speech Recognition</button>

    <div id="status"></div>
    <div id="transcription"></div>

</body>

</html>
<style>
    body {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }

    p {
        font-weight: bold;
    }
</style>
<script>
    function getLocalStream() {
        navigator.mediaDevices
            .getUserMedia({
                video: false,
                audio: true
            })
            .then((stream) => {
                window.localStream = stream; // A
                window.localAudio.srcObject = stream; // B
                window.localAudio.autoplay = true; // C
            })
            .catch((err) => {
                console.error(`you got an error: ${err}`);
            });
    }
</script>
<script>
    var transcriptionDiv = document.getElementById("transcription");
    var toggleButton = document.getElementById("toggleButton");
    var statusDiv = document.getElementById("status");
    var languageSelect = document.getElementById("languageSelect");
    var isListening = false;
    var recognition = null;

    toggleButton.addEventListener("click", function() {
        if (!isListening) {
            startRecording();
        } else {
            stopRecording();
        }
    });

    languageSelect.addEventListener("change", function() {
        stopRecording();
    });

    function startRecording() {
        try {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.lang = languageSelect.value;

            recognition.onstart = function(event) {
                toggleButton.textContent = "Stop Speech Recognition";
                statusDiv.textContent = "Speech recognition in progress...";
            };

            recognition.onresult = function(event) {
                var transcription = "";
                for (var i = event.resultIndex; i < event.results.length; ++i) {
                    transcription += event.results[i][0].transcript;
                }
                transcriptionDiv.innerHTML =
                    "<p>" + transcription + "</p>" + transcriptionDiv.innerHTML;
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
                toggleButton.textContent = "Start Speech Recognition";
                statusDiv.textContent = "Speech recognition stopped.";
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
        toggleButton.textContent = "Start Speech Recognition";
        statusDiv.textContent = "";
        isListening = false;
    }
</script>
