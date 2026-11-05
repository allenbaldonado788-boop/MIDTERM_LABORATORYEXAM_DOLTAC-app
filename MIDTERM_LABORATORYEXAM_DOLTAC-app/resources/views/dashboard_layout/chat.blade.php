<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - SIA101 Student Portal</title>

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
            max-width: 850px;
            margin: 40px auto;
            flex: 1;
        }

        .card {
            background: transparent;
            border: 0;
            border-radius: 0;
            padding: 0;
            box-shadow: none;
        }

        .title {
            text-align: center;
            margin-bottom: 25px;
        }

        .title h1 {
            font-size: 26px;
            color: #2b4374;
            margin-bottom: 6px;
        }

        .title p {
            font-size: 14px;
            color: #667085;
        }

        .divider {
            width: 40px;
            height: 3px;
            background: #2b4374;
            margin: 10px auto;
            border-radius: 2px;
        }

        .chat-box {
            display: flex;
            flex-direction: column;
            gap: 2px;
            background: linear-gradient(145deg, #ffffff 0%, #f3f9ff 58%, #eaf5ff 100%);
            border: 1px solid #d6e5f3;
            border-radius: 16px;
            padding: 24px;
            min-height: 330px;
            box-shadow: 0 16px 36px rgba(43, 67, 116, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .message {
            margin-bottom: 13px;
            max-width: 75%;
        }

        .message .name {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #4a5568;
        }

        .message .text {
            padding: 11px 14px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.5;
        }

        .teacher {
            margin-right: auto;
        }

        .teacher .text {
            background: #ffffff;
            border: 1px solid #dce5ef;
            color: #2c3e50;
            box-shadow: 0 4px 12px rgba(31, 50, 88, 0.06);
        }

        .student {
            margin-left: auto;
            text-align: right;
        }

        .student .text {
            background: linear-gradient(135deg, #36578f, #2b4374);
            border: 1px solid #29416f;
            color: white;
            box-shadow: 0 5px 14px rgba(43, 67, 116, 0.2);
        }

        .message-form {
            display: flex;
            gap: 10px;
            margin-top: auto;
            padding-top: 16px;
        }

        .message-form input {
            flex: 1;
            min-height: 46px;
            padding: 11px 14px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid #cbd9e8;
            border-radius: 10px;
            color: #333333;
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-size: 14px;
            outline: none;
        }

        .message-form input::placeholder {
            color: #999999;
        }

        .message-form input:focus {
            background: #ffffff;
            border-color: #2b4374;
            box-shadow: 0 0 0 3px rgba(43, 67, 116, 0.1);
        }

        .send-btn {
            padding: 10px 24px;
            background: #2b4374;
            color: white;
            border: none;
            border-radius: 50px;
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(43, 67, 116, 0.25);
            transition: 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .send-btn svg {
            width: 15px;
            height: 15px;
        }

        .send-btn:hover {
            background: #1f3258;
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

            .container {
                width: 92%;
            }

            .message {
                max-width: 90%;
            }

            .message-form {
                flex-direction: column;
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
                <a href="/homepage">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Home
                </a>
                <a href="/chat" class="active">
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
        <div class="card">
            <div class="title">
                <h1>Student Chat</h1>
                <div class="divider"></div>
                <p>Communication area for students and teachers</p>
            </div>

            <div class="chat-box">
                <div class="message teacher">
                    <div class="name">Teacher</div>
                    <div class="text">Welcome students! Please check your class schedule.</div>
                </div>

                <div class="message student">
                    <div class="name">Student</div>
                    <div class="text">Thank you, Ma'am/Sir!</div>
                </div>

                <div class="message teacher">
                    <div class="name">Teacher</div>
                    <div class="text">Please make sure to attend your scheduled online classes.</div>
                </div>

                <form class="message-form">
                    <input type="text" placeholder="Type your message...">
                    <button type="button" class="send-btn">
                        <span>Send</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </form>
            </div>
        </div>
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