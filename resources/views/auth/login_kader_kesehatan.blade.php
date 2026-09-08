<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Kader Kesehatan | SI-GEMOY</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/sigemoy-rebuild.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">
    <style>
        .sg-toast {
            font-family: var(--sg-font-sans);
        }
    </style>
</head>
<body class="sg-body sg-auth-page">
    <main class="sg-auth-card">
        <a href="{{ route('sigemoy') }}" class="sg-auth-logo" aria-label="Kembali ke Beranda">
            <svg viewBox="0 0 40 40" width="40" height="40"><defs><linearGradient id="sgLogoAuth" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#14C3C2"/><stop offset="100%" stop-color="#0B7A79"/></linearGradient></defs><rect x="2" y="2" width="36" height="36" rx="12" fill="url(#sgLogoAuth)"/><path d="M13 14c0-2.8 2.7-4.5 5.2-3.3.8.4 1.8.4 2.6 0C23.3 9.5 26 11.2 26 14c0 3.4-2.4 6-3.4 9.7-.5 1.9-2.7 1.9-3.2 0C18.4 20 16 17.4 16 14z" fill="#fff" opacity=".95"/><circle cx="20" cy="27.5" r="1.6" fill="#F59E0B"/></svg>
        </a>
        
        <h1 class="sg-auth-title">Login Kader Kesehatan</h1>
        <p class="sg-auth-subtitle">Masukkan email dan kata sandi Anda untuk mengakses portal kader kesehatan.</p>

        <form action="{{ route('login.auth') }}" method="POST" class="sg-auth-form">
            {{ csrf_field() }}
            
            <div class="sg-form-group">
                <label for="email" class="sg-form-label">Email</label>
                <input type="email" name="email" id="email" class="sg-form-control" placeholder="Masukkan email Anda" required autofocus>
            </div>
            
            <div class="sg-form-group">
                <label for="password" class="sg-form-label">Kata Sandi</label>
                <input type="password" name="password" id="password" class="sg-form-control" placeholder="Masukkan kata sandi Anda" required>
            </div>
            
            <button type="submit" class="sg-btn sg-btn--primary sg-auth-btn">Masuk</button>
        </form>

        <div class="sg-auth-links">
            <a href="{{ route('login_terapis_gigi') }}">Atau masuk sebagai Terapis Gigi &rarr;</a>
            <a href="{{ route('login') }}" style="color: var(--sg-gray); font-weight: normal; margin-top: 16px;">Kembali ke Pilihan Akses</a>
        </div>
    </main>

    <script src="{{ asset('frontend/assets/js/jquery-3.6.0-main.js') }}"></script>
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "toastClass": "sg-toast"
        };
        @if (Session::has('sukses'))
            toastr.success("{{ Session::get('sukses') }}", "Sukses");
        @endif
        @if (Session::has('gagal'))
            toastr.error("{{ Session::get('gagal') }}", "Gagal");
        @endif
    </script>
</body>
</html>
