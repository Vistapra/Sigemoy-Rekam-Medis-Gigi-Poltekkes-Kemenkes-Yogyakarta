<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Si Gemoy</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">
    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }

        /* Preloader styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 9999;
        }

        .logo-animation {
            width: 150px;
            height: 150px;
            position: relative;
            animation: pulse 1.5s ease-in-out infinite;
        }

        .logo-animation img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }

        /* Message container styles */
        #messageContainer {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9998;
            width: 300px;
        }

        .message {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            overflow: hidden;
            opacity: 0;
            transform: translateX(100%);
            transition: opacity 0.3s ease-out, transform 0.5s ease-out;
        }

        .message.show {
            opacity: 1;
            transform: translateX(0);
        }

        .message-header {
            padding: 12px 15px;
            font-weight: bold;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .message-body {
            padding: 15px;
            color: #333;
        }

        .message-success .message-header {
            background-color: #28a745;
        }

        .message-error .message-header {
            background-color: #dc3545;
        }

        .message-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            padding: 0;
            line-height: 1;
        }

        /* Main wrapper styles */
        #main-wrapper {
            opacity: 0;
            transition: opacity 0.5s ease-in;
        }

        #main-wrapper.show {
            opacity: 1;
        }
    </style>
    @yield('header')
</head>

<body>
    <div id="messageContainer"></div>
    <div id="preloader">
        <div class="logo-animation">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
    </div>

    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        @include('layout.partial.header')
        @include('layout.partial.sidebar')

        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('layout.partial.footer')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="{{ asset('js/kuisioner.js') }}"></script>
    <script src="{{ asset('js/notifications.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="{{ asset('vendor/metismenu/js/metisMenu.min.js') }}"></script>


    <script>
        // Preloader and main content visibility
        window.addEventListener('load', function() {
            var preloader = document.getElementById('preloader');
            var mainWrapper = document.getElementById('main-wrapper');

            preloader.classList.add('fade-out');
            setTimeout(function() {
                preloader.style.display = 'none';
                mainWrapper.classList.add('show');
            }, 500);
        });

        // Message system
        function showMessage(type, title, message) {
            const messageContainer = document.getElementById('messageContainer');
            const messageElement = document.createElement('div');
            messageElement.className = `message message-${type}`;
            messageElement.innerHTML = `
                <div class="message-header">
                    <span>${title}</span>
                    <button class="message-close">&times;</button>
                </div>
                <div class="message-body">${message}</div>
            `;
            messageContainer.appendChild(messageElement);

            // Trigger reflow to enable animation
            messageElement.offsetHeight;

            // Show the message with animation
            setTimeout(() => {
                messageElement.classList.add('show');
            }, 10);

            // Remove the message after 5 seconds
            const timeout = setTimeout(() => {
                removeMessage(messageElement);
            }, 5000);

            // Add click event to close button
            const closeButton = messageElement.querySelector('.message-close');
            closeButton.addEventListener('click', () => {
                clearTimeout(timeout);
                removeMessage(messageElement);
            });
        }

        function removeMessage(messageElement) {
            messageElement.classList.remove('show');
            setTimeout(() => {
                messageElement.remove();
            }, 500);
        }

        // Toastr notifications (modified to use the new showMessage function)
        @if (Session::has('sukses'))
            showMessage('success', 'Sukses', "{{ Session::get('sukses') }}");
        @endif
        @if (Session::has('gagal'))
            showMessage('error', 'Gagal', "{{ Session::get('gagal') }}");
        @endif

        // Pusher configuration
        var pusher = new Pusher('f57e2c2221bf57143666', {
            cluster: 'ap1'
        });
        var user_id = "{{ auth()->user()->id }}";
        var role = "{{ auth()->user()->role_display() }}";

        // Initialize notifications
        initializeNotifications(role);
    </script>
    @yield('script')

    
   <script>
        (function() {
           
            if (typeof console !== "undefined") {
                console.log = console.warn = console.error = function() {};
            }

           
            document.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            }, false);

            Disable certain keyboard shortcuts
            document.addEventListener('keydown', function(e) {
              
                if (e.ctrlKey && (e.shiftKey && (e.keyCode === 73 || e.keyCode === 74) || e.keyCode === 85)) {
                    e.preventDefault();
                }
               
                if (e.keyCode === 123) {
                    e.preventDefault();
                }
        });

      
        function disableDevTools() {
            if (typeof window.__defineGetter__ === "function") {
                window.__defineGetter__('console', function() {
                    return {
                        log: function() {},
                        warn: function() {},
                        error: function() {}
                    };
                });
            }
        }
        disableDevTools();

        document.documentElement.style.display = 'none';
        document.addEventListener('DOMContentLoaded', function() {
        document.documentElement.style.display = 'block';
        });
        })();
    </script>
</body>

</html>
