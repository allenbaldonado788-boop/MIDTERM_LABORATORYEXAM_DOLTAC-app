<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - SIA101 Student Portal</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background:
                radial-gradient(ellipse at 0% 42%, rgba(125, 211, 252, 0.42), transparent 38%),
                radial-gradient(ellipse at 100% 68%, rgba(147, 197, 253, 0.34), transparent 36%),
                linear-gradient(135deg, #f3faff 0%, #ffffff 48%, #eff8ff 100%);
            font-family: 'Arial Narrow', Arial, sans-serif;
            color: #333333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            width: 100%;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #2b4374;
            border-bottom: 1px solid #23385f;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 2px 8px rgba(20, 35, 65, 0.18);
            position: relative;
            z-index: 10;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo svg {
            width: 22px;
            height: 22px;
            stroke: #ffffff;
        }

        .nav-container {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .nav-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        .nav-links a {
            color: #e8eef8;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .nav-links a svg {
            width: 16px;
            height: 16px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.14);
            color: #ffffff;
        }

        .nav-links a.active {
            background: #ffffff;
            color: #2b4374;
        }

        .notif-btn {
            position: relative;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.2s;
        }

        .notif-btn:hover {
            background: rgba(255, 255, 255, 0.22);
            color: #ffffff;
            border-color: #ffffff;
        }

        .notif-btn svg {
            width: 18px;
            height: 18px;
        }

        .notif-sidebar {
            position: fixed;
            top: 0;
            right: -380px;
            width: 380px;
            height: 100vh;
            background: #ffffff;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: right 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            border-left: 1px solid #e2e8f0;
        }

        .notif-sidebar.open {
            right: 0;
        }

        .notif-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notif-header h3 {
            font-size: 18px;
            color: #2b4374;
            font-weight: 700;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #64748b;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: #2b4374;
        }

        .notif-body {
            padding: 20px 24px;
            overflow-y: auto;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .notif-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            padding: 40px 20px;
        }

        .notif-empty svg {
            width: 48px;
            height: 48px;
            stroke: #cbd5e1;
            margin-bottom: 12px;
        }

        .notif-empty p {
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
        }

        .notif-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.3);
            z-index: 999;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .notif-overlay.open {
            display: block;
            opacity: 1;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
            flex: 1;
        }

        .welcome-card {
            padding: 8px 0 0;
            margin-bottom: 35px;
        }

        .welcome-card h1 {
            font-size: 28px;
            color: #2b4374;
            margin-bottom: 5px;
        }

        .welcome-card .subtitle {
            color: #5578ad;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .welcome-card p {
            font-size: 15px;
            line-height: 1.6;
            color: #667085;
        }

        .divider {
            width: 45px;
            height: 3px;
            background: #2b4374;
            margin: 15px 0;
            border-radius: 2px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
            margin-top: 30px;
        }

        .card {
            --card-accent: #4b78ad;
            min-height: 220px;
            background: #ffffff;
            border: 1px solid #dce5f0;
            border-top: 4px solid var(--card-accent);
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 15px 34px rgba(31, 50, 88, 0.1), 0 3px 8px rgba(31, 50, 88, 0.04);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .card:nth-child(2) {
            --card-accent: #39958d;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 22px 42px rgba(31, 50, 88, 0.16), 0 5px 12px rgba(31, 50, 88, 0.07);
        }

        .card h2 {
            font-size: 20px;
            color: #2b4374;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            line-height: 1.6;
            color: #667085;
        }

        .icon {
            width: 46px;
            height: 46px;
            background: #edf4fb;
            border: 1px solid #dce8f5;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--card-accent);
            margin-bottom: 18px;
        }

        .card:nth-child(2) .icon {
            background: #edf7f5;
            border-color: #d7ebe7;
        }

        .icon svg {
            width: 20px;
            height: 20px;
        }

        footer {
            text-align: center;
            padding: 25px;
            font-size: 13px;
            color: #667085;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            margin-top: auto;
        }

        @media (max-width: 800px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .container {
                width: 92%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                <path d="M6 6h10M6 10h10"/>
            </svg>
            Student Portal
        </div>

        <div class="nav-container">
            <div class="nav-links">
                <a href="/homepage" class="active">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Home
                </a>
                <a href="/chat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    Chat
                </a>
                <a href="/calendar">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Calendar
                </a>
                <a href="/online-classes">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    Online Classes
                </a>
                <a href="/logout">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Logout
                </a>
            </div>

            <button type="button" class="notif-btn" onclick="toggleNotificationSidebar()" title="Notifications">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
            </button>
        </div>
    </nav>

    <div id="notifOverlay" class="notif-overlay" onclick="toggleNotificationSidebar()"></div>

    <div id="notifSidebar" class="notif-sidebar">
        <div class="notif-header">
            <h3>Notifications</h3>
            <button class="close-btn" onclick="toggleNotificationSidebar()">&times;</button>
        </div>
        <div class="notif-body">
            <div class="notif-empty">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    <line x1="2" y1="2" x2="22" y2="22"></line>
                </svg>
                <p>No notifications yet</p>
            </div>
        </div>
    </div>

    <main class="container">
        <section class="welcome-card">
            <h1>Welcome to Student Portal</h1>
            <p class="subtitle">System Integration and Architecture</p>
            <div class="divider"></div>
            <p>
                Welcome to Student Portal. This dashboard provides
                students with easy access to their homepage, chat,
                class schedules, and online classes.
            </p>
        </section>

        <section class="cards">
            <div class="card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="6"></circle>
                        <circle cx="12" cy="12" r="2"></circle>
                    </svg>
                </div>
                <h2>Mission</h2>
                <p>
                    To create a simple and supportive digital space where students can stay organized, 
                    connected, and informed about their academic activities and responsibilities.
                </p>
            </div>

            <div class="card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </div>
                <h2>Vision</h2>
                <p>
                   To become a student-friendly digital portal that makes school life more 
                   organized, accessible, and easier to manage through technology.
                </p>
            </div>
        </section>
    </main>

    <footer>
        SIA101 Student Portal &copy; 2026
    </footer>

    <script>
        function toggleNotificationSidebar() {
            const sidebar = document.getElementById('notifSidebar');
            const overlay = document.getElementById('notifOverlay');
            
            sidebar.classList.toggle('open');
            overlay.classList.toggle('open');
        }
    </script>
</body>
</html>