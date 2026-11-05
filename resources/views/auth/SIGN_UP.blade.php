<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up - SIA101 Student Portal</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial Narrow', Arial, sans-serif;
        }

        body {
            font-family: 'Arial Narrow', Arial, sans-serif;
            background:
                radial-gradient(ellipse at 0% 72%, rgba(125, 211, 252, 0.42), transparent 38%),
                radial-gradient(ellipse at 100% 78%, rgba(147, 197, 253, 0.34), transparent 36%),
                linear-gradient(135deg, #f3faff 0%, #ffffff 48%, #eff8ff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 32px 16px;
            overflow-x: hidden;
            position: relative;
            color: #333333;
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
            padding: 30px 30px 26px;
            border-radius: 12px;
            border: 1px solid #dce4ef;
            box-shadow: 0 18px 45px rgba(20, 35, 65, 0.16);
            width: min(420px, 100%);
            color: #333333;
            text-align: center;
        }

        .brand {
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .header-icon {
            width: 54px;
            height: 54px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 12px;
            color: #2b4374;
            background: #edf2f9;
            border: 1px solid #dce6f3;
            border-radius: 50%;
        }

        .header-icon svg {
            width: 26px;
            height: 26px;
        }

        h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #2b4374;
        }

        .subtitle {
            margin-bottom: 20px;
            color: #718096;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 12px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 0.85em;
            color: #333333;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .field-icon {
            position: absolute;
            left: 12px;
            color: #666666;
            display: flex;
            align-items: center;
            pointer-events: none;
            z-index: 2;
        }

        .field-icon svg {
            width: 16px;
            height: 16px;
        }

        input {
            width: 100%;
            padding: 10px 12px 10px 38px;
            background: #f8f9f9;
            border: 1px solid #cccccc;
            border-radius: 10px;
            box-sizing: border-box;
            color: #333333;
            font-size: 14px;
            font-family: 'Arial Narrow', Arial, sans-serif;
            outline: none;
            transition: all 0.2s ease;
        }

        input::placeholder {
            color: #999999;
        }

        input:focus {
            background: #ffffff;
            border-color: #2b4374;
            box-shadow: 0 0 0 2px rgba(43, 67, 116, 0.15);
        }

        .error {
            color: #d9534f;
            font-size: 0.75em;
            margin-top: 3px;
            display: block;
            font-weight: 600;
        }

        .btn {
            width: 100%;
            min-height: 44px;
            padding: 11px;
            background: #2b4374;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Arial Narrow', Arial, sans-serif;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(43, 67, 116, 0.25);
            transition: all 0.2s ease;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn:hover {
            background: #1f3258;
            transform: translateY(-2px);
        }

        .btn svg {
            width: 16px;
            height: 16px;
            stroke-width: 2;
            stroke: #ffffff;
        }

        .login-link {
            text-align: center;
            margin-top: 14px;
            font-size: 0.85em;
            color: #666666;
        }

        .login-link a {
            color: #2b4374;
            text-decoration: underline;
            font-weight: 700;
            transition: opacity 0.2s ease;
        }

        .login-link a:hover {
            opacity: 0.8;
        }

        @media (max-width: 480px) {
            body::before {
                height: 170px;
            }

            .card {
                padding: 26px 20px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="card">


        <div class="header-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5Z"></path>
                <path d="M8 7h8M8 11h8M8 15h5"></path>
            </svg>
        </div>

        <h2>CREATE ACCOUNT</h2>
        <div class="subtitle">Set up your student portal account</div>

        <form action="{{ route('signup.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="fullname">Full Name</label>
                <div class="input-wrapper">
                    <span class="field-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}" placeholder="Enter your full name">
                </div>
                @error('fullname')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <div class="input-wrapper">
                    <span class="field-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0z"></path>
                            <circle cx="12" cy="10" r="2.5"></circle>
                        </svg>
                    </span>
                    <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Enter your address">
                </div>
                @error('address')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <div class="input-wrapper">
                    <span class="field-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M5 21c0-4 3-7 7-7s7 3 7 7"></path>
                        </svg>
                    </span>
                    <input type="number" name="age" id="age" value="{{ old('age') }}" placeholder="Enter your age" min="1" max="120">
                </div>
                @error('age')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-wrapper">
                    <span class="field-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Create a username">
                </div>
                @error('username')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <span class="field-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </span>
                    <input type="password" name="password" id="password" placeholder="Create a password">
                </div>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn">
                <span>Sign Up</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </button>

        </form>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login.show') }}">Login</a>
        </div>

    </div>

</body>

</html>