<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/erlass.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/adminlte.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Exo', sans-serif;
            overflow: hidden; /* Prevent scrollbars */
        }

        .area {
            background: #4e54c8;
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;
            height: 100vh;
            position: relative;
        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
        .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
        .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
        .circles li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; }
        .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
        .circles li:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }

        @keyframes animate {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0 ; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
        }

        .login-box {
            position: absolute; /* Changed to absolute for better positioning */
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Adjust for centering */
            z-index: 10; /* Ensure it is above the background */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .login-card-body {
            background-color: rgba(248, 249, 252, 0.9); /* Slightly transparent for effect */
            color: #333;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 5px rgba(78, 115, 223, .5);
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
        }

        .text-danger {
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="login-page">
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('login') }}" class="link-dark">
                    <img style="width: 75px; height: 75px;" src="/images/erlass.png" alt="Logo">
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login-proses') }}" method="post" aria-label="Login Form">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input id="loginEmail" name="email" type="email" class="form-control" placeholder="Email" required aria-required="true">
                            <label for="loginEmail">Email</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input id="loginPassword" name="password" type="password" class="form-control" placeholder="Password" required aria-required="true">
                            <label for="loginPassword">Password</label>
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword" onclick="togglePasswordVisibility()" aria-label="Toggle password visibility">
                            <span id="toggleIcon" class="bi bi-eye-fill"></span>
                        </button>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                    <div class="row mb-3">
                        <div class="col-8 d-inline-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" aria-label="Remember Me">
                                <label class="form-check-label" for="flexCheckDefault">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @error('login')
    <small class="text-danger">{{ $message }}</small>
    @enderror

    <script src="https://cdn.jsdelivr.net/npm/ overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('loginPassword');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.replace("bi-eye-fill", "bi-eye-slash-fill");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.replace("bi-eye-slash-fill", "bi-eye-fill");
            }
        }
        
        @if(session('failed'))
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ session('failed') }}",
        });
        @endif

        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "Success!",
            text: "{{ session('success') }}",
        });
        @endif

        @if($errors->any())
            @foreach ($errors->all() as $error)
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "{{ $error }}",
                });
            @endforeach
        @endif
    </script>
</body>
</html>