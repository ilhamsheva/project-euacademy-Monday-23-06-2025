<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - MyApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;
            overflow-y: auto;
            background: none !important;
            background-color: transparent !important;
        }

        .hero-login {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px;
        }

        .hero-login::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(255, 255, 255, 0.74);
            backdrop-filter: blur(2px);
            z-index: 1;
        }

        .hero-bg {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .hero-bg img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .wrapper {
            z-index: 2;
            position: relative;
            max-width: 960px;
            width: 100%;
            background: transparent !important;
        }

        .inner {
            display: flex;
            gap: 2rem;
            padding: 3rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .image-1, .image-2 {
            max-width: 200px;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            z-index: 10;
        }

        .form-holder {
            position: relative;
        }

        .form-holder input.form-control {
            padding-right: 40px;
        }

        @media (max-width: 768px) {
            .inner {
                flex-direction: column;
                align-items: center;
            }
            .image-1, .image-2 {
                display: none;
            }
        }
    </style>
</head>

<body>
<section class="hero-login">
    <div class="hero-bg">
        <img src="{{ asset('assets/img/hero-bg-light.webp') }}" alt="">
    </div>

    <div class="wrapper" data-aos="fade-up">
        <div class="inner" data-aos="zoom-in">

            <!-- Ilustrasi Kiri -->
            <img src="{{ asset('assets/img/image-1.png') }}" alt="image" class="image-1" data-aos="fade-right">

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" data-aos="fade-up" data-aos-delay="200">
                @csrf

                <h3 data-aos="fade-right" data-aos-delay="250">Welcome Back</h3>

                <!-- Kolom email/phone -->
                <div class="form-holder" data-aos="fade-up" data-aos-delay="300">
                    <span class="lnr lnr-envelope"></span>
                    <input type="text" name="login" class="form-control" placeholder="Email/Phone Number" value="{{ old('login') }}" required autofocus>
                </div>
                @error('login')
                <small style="color:red;">{{ $message }}</small>
                @enderror

                <!-- Kolom password -->
                <div class="form-holder" data-aos="fade-up" data-aos-delay="400">
                    <span class="lnr lnr-lock"></span>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="fa-solid fa-eye toggle-password" onclick="togglePassword(this, 'password')"></span>
                </div>
                @error('password')
                <small style="color:red;">{{ $message }}</small>
                @enderror

                <!-- Remember me -->
                <div class="form-holder" data-aos="fade-up" data-aos-delay="500">
                    <label style="font-size: 13px;">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                <!-- Tombol submit -->
                <button type="submit" data-aos="fade-up" data-aos-delay="600">
                    <span>Login</span>
                </button>

                <!-- Link lupa password -->
                <div class="form-holder text-center mt-3" data-aos="fade-up" data-aos-delay="700">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size: 13px;">Forgot Your Password?</a>
                    @endif
                </div>

                <!-- Link Sign up -->
                <div class="form-holder text-center mt-3" data-aos="fade-up" data-aos-delay="800">
                    <p style="font-size: 13px;">Don't have an account? <a href="{{ route('register') }}" style="text-decoration: none; color: #007bff;">Sign up here</a></p>
                </div>
            </form>

            <!-- Ilustrasi Kanan -->
            <img src="{{ asset('assets/img/image-2.png') }}" alt="image" class="image-2" data-aos="fade-left">
        </div>
    </div>
</section>

<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/mainAuth.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
    });

    function togglePassword(icon, inputId) {
        const input = document.getElementById(inputId);
        if (!input) return;
        input.type = input.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }
</script>
</body>
</html>