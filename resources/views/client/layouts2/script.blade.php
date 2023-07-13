<!-- Js Plugins -->
<script src="/client2/js/jquery-3.3.1.min.js"></script>
<script src="/client2/js/bootstrap.min.js"></script>
<script src="/client2/js/jquery.magnific-popup.min.js"></script>
<script src="/client2/js/jquery.nice-select.min.js"></script>
<script src="/client2/js/jquery-ui.min.js"></script>
<script src="/client2/js/jquery.slicknav.js"></script>
<script src="/client2/js/owl.carousel.min.js"></script>
<script src="/client2/js/main.js"></script>

<div id="google_translate_element"></div>

{{-- <script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'en'
                , autoDisplay: false
                , includedLanguages: 'vi', // Specify the languages you want to support
            }
            , 'google_translate_element'
        );
    }

    // Automatically trigger the translation
    function triggerTranslation() {
        var translateButton = document.querySelector('.goog-te-combo');
        var event = new MouseEvent('mouseover', {
            view: window
            , bubbles: true
            , cancelable: true
        });
        translateButton.dispatchEvent(event);
    }

    // Invoke translation when the page loads
    window.onload = triggerTranslation;
    
</script> --}}
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'en'
                , includedLanguages: 'vi'
                , autoDisplay: false
            , }
            , 'google_translate_element'
        );
    }

    function triggerTranslation() {
        setTimeout(function() {
            var translateButton = document.querySelector('.goog-te-combo option[value=vi]');
            if (translateButton) {
                translateButton.selected = true;
                translateButton.parentElement.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
                var body = document.getElementsByTagName("body")
                body[0].style.top = "0px"
            }
        }, 1000);

    }

    window.onload = triggerTranslation;

</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
    /* div.goog-te-gadget {
        color: transparent !important;
    }

    div.goog-te-gadget-simple {
        border: none !important;
        background-color: transparent !important;
    } */

    /* Add any additional styling as needed */

    #google_translate_element {
        display: none;
    }

    .skiptranslate {
        display: none;
    }

</style>