<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Si Gemoy | Rekam Medis Praktis</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('mobile/login.css') }}">
</head>

<body class="h-100">
    <div class="wrapper">
        <div class="logo">
            <a href="/" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Si Gemoy Logo">
            </a>
        </div>
        <p class="text-center">REKAM MEDIS PRAKTIS</p>

        <a href="{{ route('login_kader_kesehatan') }}" class="btn">
            <i class="fas fa-user-md"></i>KADER KESEHATAN
        </a>
        <a href="{{ route('login_terapis_gigi') }}" class="btn">
            <i class="fas fa-tooth"></i>TERAPIS GIGI
        </a>
    </div>

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
</body>

</html>
