<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Si Gemoy | Login Kader Kesehatan</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mobile/loginkader.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="h-100">
    <div class="wrapper">
        <div class="logo">
            <a href="/" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Si Gemoy Logo">
            </a>
        </div>
        <p class="text-center">KADER KESEHATAN</p>
        <form action="{{ Route('login.auth') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-field">
                <input type="email" name="email" placeholder="email" required>
            </div>
            <div class="form-field">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button class="btn" type="submit">LOGIN</button>
            <div class="text-center">
                <a href="{{ Route('login_terapis_gigi') }}">Login Sebagai Terapis Gigi</a>
            </div>
        </form>
    </div>

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('sukses'))
            toastr.success("{{ Session::get('sukses') }}", "Sukses", {
                timeOut: 5000
            });
        @endif
        @if (Session::has('gagal'))
            toastr.error("{{ Session::get('gagal') }}", "Gagal", {
                timeOut: 5000
            });
        @endif
    </script>
</body>

</html>
