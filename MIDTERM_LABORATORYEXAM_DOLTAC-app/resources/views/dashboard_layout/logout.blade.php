<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - SIA101 Student Portal</title>

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
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 24px;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0 0 auto;
            height: 240px;
            background: #2b4374;
        }

        .card {
            position: relative;
            z-index: 2;
            width: min(440px, 100%);
            padding: 38px 36px 32px;
            text-align: center;
            background: #ffffff;
            border: 1px solid #dce4ef;
            border-radius: 12px;
            box-shadow: 0 22px 50px rgba(20, 35, 65, 0.22), 0 4px 12px rgba(20, 35, 65, 0.08);
        }

        .brand {
            margin-bottom: 28px;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .icon {
            width: 68px;
            height: 68px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 18px;
            color: #2b4374;
            background: #edf2f9;
            border: 1px solid #dce6f3;
            border-radius: 50%;
        }

        .icon svg {
            width: 40px;
            height: 40px;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 10px;
            color: #2b4374;
        }

        .divider {
            width: 48px;
            height: 4px;
            background: #7aa4d6;
            margin: 0 auto 20px;
            border-radius: 4px;
        }

        p {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 28px;
            color: #667085;
        }

        .buttons {
            display: flex;
            gap: 10px;
            width: 100%;
        }

        .buttons form {
            display: flex;
            flex: 1 1 0;
            min-width: 0;
            margin: 0;
        }

        .buttons > .btn,
        .buttons form .btn {
            flex: 1 1 0;
            width: 100%;
            min-width: 0;
        }

        .btn {
            min-height: 44px;
            padding: 11px 16px;
            border-radius: 8px;
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .cancel {
            background: #ffffff;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .cancel:hover {
            background: #e2e8f0;
            color: #1e293b;
            transform: translateY(-1px);
        }

        .logout {
            background: #2b4374;
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(43, 67, 116, 0.25);
        }

        .logout:hover {
            background: #1f3258;
            transform: translateY(-1px);
        }

        .note {
            margin-top: 18px;
            font-size: 11px;
            color: #94a3b8;
        }

        @media (max-width: 480px) {
            body::before {
                height: 190px;
            }

            .card {
                padding: 32px 22px 26px;
            }

            .brand {
                margin-bottom: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="card">

        <div class="brand">SIA101 Student Portal</div>

        <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
        </div>

        <h1>Logout Confirmation</h1>

        <div class="divider"></div>

        <p>
            Are you sure you want to log out?
        </p>

        <div class="buttons">

            <a href="/homepage" class="btn cancel">
                Cancel
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn logout">
                    Yes, Logout
                </button>
            </form>

        </div>

    </div>

</body>
</html>