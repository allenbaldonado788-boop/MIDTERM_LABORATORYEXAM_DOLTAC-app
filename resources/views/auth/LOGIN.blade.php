<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background:
                radial-gradient(ellipse at 0% 72%, rgba(125, 211, 252, 0.42), transparent 38%),
                radial-gradient(ellipse at 100% 78%, rgba(147, 197, 253, 0.34), transparent 36%),
                linear-gradient(135deg, #f3faff 0%, #ffffff 48%, #eff8ff 100%);
            font-family: 'Arial Narrow', Arial, sans-serif;
            color: #333333;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 16px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0 0 auto;
            height: 210px;
            background: #2b4374;
        }

        .card {
            position: relative;
            z-index: 2;
            background: #ffffff;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-radius: 18px;
            border: 1px solid #dce4ef;
            box-shadow: 0 24px 60px rgba(20, 35, 65, 0.2);
            width: min(900px, 100%);
            color: #333333;
            overflow: hidden;
        }

        .welcome-panel {
            position: relative;
            display: flex;
            min-height: 540px;
            align-items: flex-end;
            padding: 48px;
            overflow: hidden;
            background: #20365f;
        }

        .welcome-panel img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .welcome-panel::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(20, 38, 68, 0.12) 15%, rgba(20, 38, 68, 0.88) 100%);
        }

        .welcome-copy {
            position: relative;
            z-index: 1;
            color: #ffffff;
            text-align: left;
        }

        .welcome-copy span {
            display: block;
            margin-bottom: 12px;
            color: #c9def6;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .welcome-copy h1 {
            max-width: 360px;
            font-size: 36px;
            line-height: 1.12;
            color: #ffffff;
        }

        .welcome-copy p {
            max-width: 330px;
            margin-top: 14px;
            color: #e2eaf5;
            font-size: 15px;
            line-height: 1.6;
        }

        .card-body {
            align-self: center;
            padding: 52px 48px;
            text-align: center;
        }

        .header-heart {
            color: #2b4374;
            font-size: 11px;
            margin-bottom: 4px;
            opacity: 0.9;
        }

        .header-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 6px;
            color: #2b4374;
        }

        .header-icon svg {
            width: 28px;
            height: 28px;
        }

        h2 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 6px;
            color: #2b4374;
        }

        .welcome-note {
            margin-bottom: 14px;
            color: #718096;
            font-size: 13px;
            line-height: 1.5;
        }

        .title-divider {
            width: 30px;
            height: 2px;
            background: #2b4374;
            margin: 0 auto 22px;
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 12px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 0.85em;
            font-weight: 600;
            margin-bottom: 6px;
            color: #333333;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .field-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: #666666;
            z-index: 2;
        }

        .field-icon svg {
            width: 100%;
            height: 100%;
        }

        input {
            width: 100%;
            background: #f8f9f9;
            border: 1px solid #cccccc;
            border-radius: 10px;
            padding: 10px 12px 10px 38px;
            color: #333333;
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-size: 14px;
            outline: none;
        }

        input::placeholder {
            color: #999999;
        }

        input:focus {
            background: #ffffff;
            border-color: #2b4374;
            box-shadow: 0 0 0 2px rgba(43, 67, 116, 0.15);
        }

        .password-container input {
            padding-right: 42px;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 19px;
            height: 19px;
            cursor: pointer;
            color: #666666;
        }

        .toggle-password svg {
            width: 100%;
            height: 100%;
        }

        .error {
            display: block;
            color: #d9534f;
            font-size: 0.75em;
            font-weight: bold;
            margin-top: 4px;
        }

        .alert {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 9px 10px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .btn {
            width: 100%;
            padding: 11px;
            background: #2b4374;
            color: white;
            border: none;
            border-radius: 50px;
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(43, 67, 116, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #1f3258;
            transform: translateY(-2px);
        }

        .btn svg {
            width: 17px;
            height: 17px;
        }

        .signup-link {
            margin-top: 18px;
            font-size: 13px;
            color: #666666;
        }

        .signup-link a {
            color: #2b4374;
            font-weight: bold;
            text-decoration: underline;
        }

        .signup-link a:hover {
            opacity: 0.8;
        }

        @media (max-width: 700px) {
            .card {
                grid-template-columns: 1fr;
                width: min(480px, 100%);
            }

            .welcome-panel {
                min-height: 220px;
                padding: 28px;
            }

            .welcome-copy h1 {
                font-size: 28px;
            }

            .card-body {
                padding: 34px 30px;
            }
        }

        @media (max-width: 450px) {
            .card-body {
                padding: 30px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <section class="welcome-panel">
            <img src="{{ asset('haha.jpg') }}" alt="Welcome Students">
            <div class="welcome-copy">
                <span>SIA101 Student Portal</span>
                <h1>WELCOME TO STUDENT PORTAL</h1>
                <p>Your campus connection starts here.</p>
            </div>
        </section>

        <div class="card-body">
            <div class="header-heart">♥</div>

            

            <h2>WELCOME BACK</h2>
            <p class="welcome-note">Sign in to continue to your student account.</p>

            <div class="title-divider"></div>

            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>

                    <div class="input-wrapper">
                        <span class="field-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>

                        <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Enter your username">
                    </div>

                    @error('username')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="input-wrapper password-container">
                        <span class="field-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </span>

                        <input type="password" name="password" id="password" placeholder="Enter your password">

                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <svg id="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </span>
                    </div>

                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn">
                    <span>Login</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>
            </form>

            <div class="signup-link">
                Don't have an account?
                <a href="{{ route('signup.show') }}">Sign Up</a>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                `;
            }
        }
    </script>

</body>
</html>