@extends('layout.apps')
@section('content')
    <div class="popup-overlay">
        <div class="popup-container">
            <div class="popup-content">
                <img src="{{ asset('images/logo.png') }}" alt="Dental Health" class="logo pulse">
                <p class="description slide-up"><strong>Apakah Anda Ingin Rujukan Terkait Gigi?</strong></p>
                <div class="button-group">
                    <a href="https://e-tooth.id/login" class="btn btn-primary">Ya, Saya Ingin Dirujuk!</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline">Tidak, Terima Kasih</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        :root {
            --primary-color: #20d0ce;
            --bg-color: #f8f9fa;
            --overlay-color: rgba(0, 0, 0, 0.5);
        }

        body,
        html {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: var(--bg-color);
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--overlay-color);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 3rem;
            max-width: 600px;
            width: 90%;
            text-align: center;
        }

        .popup-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            width: 120px;
            margin-bottom: 2rem;
        }

        .description {
            color: var(--primary-color);
            font-size: 1.8rem;
            line-height: 1.4;
            margin-bottom: 2rem;
            font-weight: 700;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 100%;
        }

        .btn {
            padding: 1rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1ba8a7;
            box-shadow: 0 5px 15px rgba(32, 208, 206, 0.4);
        }

        .btn-outline {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            background-color: transparent;
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .slide-up {
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.5s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .popup-container {
                padding: 2rem;
            }

            .description {
                font-size: 1.5rem;
            }

            .btn {
                padding: 0.8rem 1.6rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .popup-container {
                padding: 1.5rem;
            }

            .description {
                font-size: 1.3rem;
            }

            .logo {
                width: 100px;
                margin-bottom: 1.5rem;
            }

            .btn {
                padding: 0.7rem 1.4rem;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection
