<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register - MyApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS & FONT AWESOME -->
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

        .hero-register {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px;
        }

        .hero-register::before {
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
            padding: 3rem 3rem 5rem; /* extra padding bottom */
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .form-holder {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-holder input.form-control {
            padding-right: 40px;
            width: 100%;
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

        button[type="submit"] {
            display: block;
            width: 100%;
            background-color: #78b3f1;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            z-index: 2;
            position: relative;
        }

        .image-1, .image-2 {
            max-width: 200px;
        }

        .login-link {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            z-index: 9999;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
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
<section class="hero-register">
    <div class="hero-bg">
        <img src="{{ asset('assets/img/hero-bg-light.webp') }}" alt="">
    </div>

    <div class="wrapper" data-aos="fade-up">
        <div class="inner" data-aos="zoom-in">

            <!-- Ilustrasi Kiri -->
            <img src="{{ asset('assets/img/image-1.png') }}" alt="image" class="image-1" data-aos="fade-right">

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}" data-aos="fade-up" data-aos-delay="200">
                @csrf

                <h3 data-aos="fade-right" data-aos-delay="250">New Account?</h3>

                <div class="form-holder" data-aos="fade-up" data-aos-delay="300">
                    <span class="lnr lnr-user"></span>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                </div>
                @error('name') <small style="color:red;">{{ $message }}</small> @enderror

                <div class="form-holder" data-aos="fade-up" data-aos-delay="350">
                    <span class="lnr lnr-phone-handset"></span>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required>
                </div>
                @error('phone') <small style="color:red;">{{ $message }}</small> @enderror

                <div class="form-holder" data-aos="fade-up" data-aos-delay="400">
                    <span class="lnr lnr-envelope"></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                @error('email') <small style="color:red;">{{ $message }}</small> @enderror

                <div class="form-holder" data-aos="fade-up" data-aos-delay="500">
                    <span class="lnr lnr-lock"></span>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="fa-solid fa-eye toggle-password" onclick="togglePassword(this, 'password')"></span>
                </div>
                @error('password') <small style="color:red;">{{ $message }}</small> @enderror

                <div class="form-holder" data-aos="fade-up" data-aos-delay="550">
                    <span class="lnr lnr-lock"></span>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    <span class="fa-solid fa-eye toggle-password" onclick="togglePassword(this, 'password_confirmation')"></span>
                </div>

                <button type="submit" href={{route('home')}} data-aos="fade-up" data-aos-delay="600">
                    <span>Register</span>
                </button>

                <!-- Link ke halaman login -->
                <div class="login-link aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                    <p>Already have an account? <a href="{{ route('login') }}">Login Here</a></p>
                </div>
            </form>

            <!-- Ilustrasi Kanan -->
            <img src="{{ asset('assets/img/image-2.png') }}" alt="image" class="image-2" data-aos="fade-left">
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/mainAuth.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

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
