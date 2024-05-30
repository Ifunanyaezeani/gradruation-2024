<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/tiny-slider/tiny-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <meta name="google-translate-customization" content="..." />
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,tr',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,tr',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        function loadGoogleTranslate() {
            var lang = getCookie("googtrans");
            if (lang) {
                var translateElement = document.createElement("script");
                translateElement.src = "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";
                document.body.appendChild(translateElement);
                var intervalId = setInterval(function() {
                    var frame = document.querySelector(".goog-te-menu-frame.skiptranslate");
                    if (frame) {
                        clearInterval(intervalId);
                        frame.contentWindow.document.querySelector('.goog-te-menu2-item-selected').click();
                    }
                }, 100);
            } else {
                googleTranslateElementInit();
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadGoogleTranslate();
        });

        document.addEventListener('click', function() {
            setTimeout(function() {
                var frame = document.querySelector(".goog-te-menu-frame.skiptranslate");
                if (frame) {
                    frame.contentWindow.document.querySelector('.goog-te-menu2-item-selected').click();
                }
            }, 500);
        });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <style>
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0 !important;
        }

        .goog-te-gadget-icon {
            display: none !important;
        }
    </style>
</head>

<body class="bg-light">

    <header class="navbar-light header-sticky">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <span class="navbar-brand-item"><Strong>Data Master</Strong></span>
                </a>
                {{-- <div id="google_translate_element"></div> --}}

                <button class="navbar-toggler ms-auto mx-3 me-md-0 p-0 p-sm-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#dashboardMenu" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-animation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <livewire:pages.student-logout>

            </div>
        </nav>
    </header>

    <main>

        <section class="pt-3">
            <div class="container">
                <div class="row">

                    <!-- Sidebar START -->
                    <livewire:pages.student-menu>
                        <!-- Sidebar END -->

                        <div class="col-lg-8 col-xl-9">

                            {{ $slot }}

                        </div>

                </div>
            </div>
        </section>

    </main>

    <script src="//code.tidio.co/mwt34o9ickmikvpe8adsfmhsigh8yhjg.js" async></script>
    <script src="{{ asset('assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>

</body>

</html>
