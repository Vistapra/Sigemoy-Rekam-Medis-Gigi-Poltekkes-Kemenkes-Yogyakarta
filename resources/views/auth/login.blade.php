<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pilih Akses Login | SI-GEMOY</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/sigemoy-rebuild.css') }}" rel="stylesheet" />
</head>
<body class="sg-body sg-auth-page">
    <main class="sg-auth-card">
        <a href="{{ route('sigemoy') }}" class="sg-auth-logo" aria-label="Kembali ke Beranda">
            <svg viewBox="0 0 40 40" width="40" height="40"><defs><linearGradient id="sgLogoAuth" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#14C3C2"/><stop offset="100%" stop-color="#0B7A79"/></linearGradient></defs><rect x="2" y="2" width="36" height="36" rx="12" fill="url(#sgLogoAuth)"/><path d="M13 14c0-2.8 2.7-4.5 5.2-3.3.8.4 1.8.4 2.6 0C23.3 9.5 26 11.2 26 14c0 3.4-2.4 6-3.4 9.7-.5 1.9-2.7 1.9-3.2 0C18.4 20 16 17.4 16 14z" fill="#fff" opacity=".95"/><circle cx="20" cy="27.5" r="1.6" fill="#F59E0B"/></svg>
        </a>
        
        <h1 class="sg-auth-title">Pilih Akses Login</h1>
        <p class="sg-auth-subtitle">Silakan pilih peran Anda untuk masuk ke sistem rekam medis praktis SI-GEMOY.</p>

        <div class="sg-multilogin-options">
            <a href="{{ route('login_kader_kesehatan') }}" class="sg-multilogin-card">
                <div class="sg-multilogin-card__ico">
                    <svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2a7.2 7.2 0 0 1-6-3.22c.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08a7.2 7.2 0 0 1-6 3.22z"/></svg>
                </div>
                <div class="sg-multilogin-card__text">
                    <span class="sg-multilogin-card__title">Kader Kesehatan</span>
                    <span class="sg-multilogin-card__desc">Akses portal khusus kader</span>
                </div>
                <div class="sg-multilogin-card__arrow">
                    <svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg>
                </div>
            </a>

            <a href="{{ route('login_terapis_gigi') }}" class="sg-multilogin-card">
                <div class="sg-multilogin-card__ico">
                    <svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M12 2c-1.1 0-2 .9-2 2v2H8V4c0-1.1-.9-2-2-2s-2 .9-2 2v4c0 2.21 1.79 4 4 4v7c0 1.66 1.34 3 3 3s3-1.34 3-3v-7c2.21 0 4-1.79 4-4V4c0-1.1-.9-2-2-2s-2 .9-2 2v2h-2V4c0-1.1-.9-2-2-2z"/></svg>
                </div>
                <div class="sg-multilogin-card__text">
                    <span class="sg-multilogin-card__title">Terapis Gigi</span>
                    <span class="sg-multilogin-card__desc">Akses untuk tenaga medis</span>
                </div>
                <div class="sg-multilogin-card__arrow">
                    <svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg>
                </div>
            </a>
        </div>

        <div class="sg-auth-links" style="margin-top: 32px;">
            <a href="{{ route('sigemoy') }}">Kembali ke Halaman Utama</a>
        </div>
    </main>
</body>
</html>
