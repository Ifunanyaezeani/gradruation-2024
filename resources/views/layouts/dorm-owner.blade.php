<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Dormitory Owner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/tiny-slider/tiny-slider.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/apexcharts/css/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
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
                <a class="navbar-brand" href="{{ route('dorm-owner.dashboard') }}" wire:navigate>
                    <span class="navbar-brand-item"><Strong>Data Master</Strong></span>
                </a>

                <button class="navbar-toggler ms-auto mx-3 me-md-0 p-0 p-sm-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#dashboardMenu" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-animation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <livewire:pages.dorm-owner-logout>

            </div>
        </nav>
    </header>

    <main>

        <section class="pt-4">
            <div class="container">
                <div class="card rounded-3 border p-3 pb-2">
                    <!-- Avatar and info START -->
                    <div class="d-sm-flex align-items-center">
                        <div class="avatar avatar-xl mb-2 mb-sm-0">
                            @if (Auth::user()->profile_picture == null)
                                <img class="avatar-img rounded-circle border border-3 border-primary"
                                    src="{{ asset('assets/images/avatar/p1.svg') }}" alt="" />
                            @else
                                <img class="avatar-img rounded-circle border border-3 border-primary"
                                    src="{{ Auth::user()->profile_picture }}" alt="" />
                            @endif
                        </div>
                        <h4 class="mb-2 mb-sm-0 ms-sm-3"><span class="fw-light">Hi</span>
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </h4>
                        <a href="{{ route('dorm-owner.add-dorm') }}"
                            class="btn btn-sm btn-primary-soft mb-0 ms-auto flex-shrink-0">
                            <i class="bi bi-plus-lg fa-fw me-2"></i>Add New Dormitroy
                        </a>
                    </div>

                    <livewire:pages.dorm-owner-menu>
                        <!-- Nav links END -->
                </div>
            </div>
        </section>

        <section class="pt-0">
            {{ $slot }}
        </section>

    </main>

    <script src="//code.tidio.co/mwt34o9ickmikvpe8adsfmhsigh8yhjg.js" async></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/apexcharts/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/tiny-slider/tiny-slider.js') }}"></script>

    <script src="{{ asset('assets/js/functions.js') }}"></script>
    </script>

</body>

</html>
