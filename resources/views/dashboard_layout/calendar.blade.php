<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar - SIA101 Student Portal</title>

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
            width: 92%;
            max-width: 950px;
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

        .calendar-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin: 24px 0 18px;
        }

        .month-label {
            color: #263b65;
            font-size: 22px;
            font-weight: 700;
        }

        .calendar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .calendar-actions button {
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            border: 1px solid #d6deea;
            border-radius: 7px;
            background: #ffffff;
            color: #334155;
            font: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
        }

        .calendar-actions button:hover {
            background: #edf2f9;
            border-color: #9eafc9;
        }

        .calendar-actions .today-button {
            color: #ffffff;
            background: #2b4374;
            border-color: #2b4374;
        }

        .calendar-actions .today-button:hover {
            background: #1f3258;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            overflow: hidden;
            border: 1px solid #8cccf0;
            border-radius: 8px;
            box-shadow: 0 0 0 3px rgba(125, 211, 252, 0.12);
        }

        .weekday-heading {
            padding: 11px 6px;
            background: #f3f6fb;
            color: #60708a;
            text-align: center;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .calendar-day {
            min-width: 0;
            min-height: 115px;
            padding: 8px;
            border-top: 1px solid #e5eaf1;
            border-right: 1px solid #e5eaf1;
            background: #ffffff;
            color: #344054;
            text-align: left;
            font: inherit;
            cursor: pointer;
            transition: background 0.15s;
            display: flex;
            flex-direction: column;
        }

        .calendar-day:nth-child(7n) {
            border-right: 0;
        }

        .calendar-day:hover {
            background: #f7f9fc;
        }

        .calendar-day.outside-month {
            background: #fafbfd;
            color: #a0a9b8;
        }

        .calendar-day.selected {
            background: #eef3fb;
            box-shadow: inset 0 0 0 2px #5578ad;
        }

        .day-number {
            display: inline-flex;
            width: 25px;
            height: 25px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 12px;
            font-weight: 600;
        }

        .today .day-number {
            color: #ffffff;
            background: #2b4374;
        }

        .day-events {
            display: flex;
            flex-direction: column;
            gap: 3px;
            margin-top: 5px;
            overflow-y: auto;
            max-height: 80px;
        }

        .day-event {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 3px 5px;
            border-left: 2px solid #4d719f;
            border-radius: 3px;
            background: #eaf0f8;
            color: #304a72;
            font-size: 9.5px;
            line-height: 1.2;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            gap: 4px;
        }

        .day-event span {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .event-inline-actions {
            display: flex;
            gap: 3px;
            opacity: 0.7;
            flex-shrink: 0;
        }

        .day-event:hover .event-inline-actions {
            opacity: 1;
        }

        .event-inline-actions button {
            background: none;
            border: none;
            font-size: 9px;
            cursor: pointer;
            padding: 1px 3px;
            border-radius: 2px;
            font-weight: bold;
        }

        .inline-edit { color: #2b4374; }
        .inline-edit:hover { background: #d0def0; }
        .inline-delete { color: #b42318; }
        .inline-delete:hover { background: #f9d8d6; }

        footer {
            text-align: center;
            padding: 25px;
            font-size: 13px;
            color: #667085;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            margin-top: auto;
        }

        .calendar-actions #addClassButton { background:#3b9a91; border-color:#3b9a91; color:#fff; }
        .calendar-actions #addClassButton:hover { background:#287c75; }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(3px);
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.25s ease-in-out;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-card {
            background: #ffffff;
            width: 100%;
            max-width: 440px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(35, 56, 95, 0.2);
            overflow: hidden;
            transform: translateY(15px) scale(0.98);
            transition: all 0.25s ease-in-out;
            border: 1px solid #e2e8f0;
        }

        .modal-overlay.active .modal-card {
            transform: translateY(0) scale(1);
        }

        .modal-header {
            background: #2b4374;
            color: #ffffff;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 16px;
            font-weight: 700;
        }

        .modal-header .modal-close {
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .modal-header .modal-close:hover {
            opacity: 1;
        }

        .modal-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .modal-body-text {
            font-size: 14px;
            color: #475569;
            line-height: 1.5;
            text-align: center;
            padding: 6px 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: #2b4374;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus {
            border-color: #3b9a91;
            box-shadow: 0 0 0 3px rgba(59, 154, 145, 0.15);
        }

        .modal-footer {
            padding: 14px 20px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
            padding: 9px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
        }

        .btn-save {
            background: #3b9a91;
            color: #ffffff;
            border: 1px solid #3b9a91;
            padding: 9px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-save:hover {
            background: #287c75;
        }

        .btn-delete-confirm {
            background: #b42318;
            color: #ffffff;
            border: 1px solid #b42318;
            padding: 9px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-delete-confirm:hover {
            background: #911e14;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
            }

            .card {
                padding: 22px 16px;
            }

            .calendar-day {
                min-height: 90px;
                padding: 5px;
            }

            .day-event {
                font-size: 8.5px;
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
            SIA101 Student Portal
        </div>

        <div class="nav-container">
            <div class="nav-links">
                <a href="/homepage">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Home
                </a>
                <a href="/chat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    Chat
                </a>
                <a href="/calendar" class="active">
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
                <h1>Class Calendar</h1>
                <div class="divider"></div>
                <p>Monthly view of your classes and assigned rooms</p>
            </div>

            <div class="calendar-toolbar">
                <h2 class="month-label" id="monthLabel" aria-live="polite"></h2>
                <div class="calendar-actions" aria-label="Calendar navigation">
                    <button type="button" class="today-button" id="addClassButton">+ Add Class</button>
                    <button type="button" id="previousMonth" aria-label="Previous month">&#8249;</button>
                    <button type="button" class="today-button" id="goToToday">Today</button>
                    <button type="button" id="nextMonth" aria-label="Next month">&#8250;</button>
                </div>
            </div>

            <div class="calendar-grid" id="calendarGrid" aria-label="Monthly calendar">
                <div class="weekday-heading">Mon</div>
                <div class="weekday-heading">Tue</div>
                <div class="weekday-heading">Wed</div>
                <div class="weekday-heading">Thu</div>
                <div class="weekday-heading">Fri</div>
                <div class="weekday-heading">Sat</div>
                <div class="weekday-heading">Sun</div>
            </div>
        </div>
    </main>

    <!-- Modal Form for Add/Edit Class -->
    <div id="classModal" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header">
                <h3 id="modalTitle">Add New Class</h3>
                <button type="button" class="modal-close" onclick="closeClassModal()">&times;</button>
            </div>
            <form id="classForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subjectInput">Subject Name</label>
                        <input type="text" id="subjectInput" placeholder="e.g. SIA 101" required>
                    </div>
                    <div class="form-group">
                        <label for="timeInput">Schedule Time</label>
                        <input type="text" id="timeInput" placeholder="e.g. 8:00 AM - 11:00 AM" required>
                    </div>
                    <div class="form-group">
                        <label for="roomInput">Room / Location</label>
                        <input type="text" id="roomInput" placeholder="e.g. Annex RM 5 or Online" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeClassModal()">Cancel</button>
                    <button type="submit" class="btn-save">Save Class</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Confirmation for Delete Class -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header" style="background: #b42318;">
                <h3>Confirm Delete</h3>
                <button type="button" class="modal-close" onclick="closeDeleteModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-body-text" id="deleteMessage">Are you sure you want to delete this class from the schedule?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
                <button type="button" class="btn-delete-confirm" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>

    <footer>
        SIA101 Student Portal &copy; 2026
    </footer>

    <script>
        const defaultSchedule = {
            1: [
                { time: '8:00 AM - 11:00 AM', subject: 'NET 101', room: 'Online' },
                { time: '11:00 AM - 2:00 PM', subject: 'SIA 101', room: 'Online' },
                { time: '2:00 PM - 5:00 PM', subject: 'IT ELEC 2', room: 'Online' }
            ],
            2: [
                { time: '10:00 AM - 12:00 PM', subject: 'UED 101', room: 'Annex RM 5' },
                { time: '1:00 PM - 3:00 PM', subject: 'CC 106', room: 'Digitel IT RM 3' },
                { time: '3:00 PM - 4:30 PM', subject: 'GE ELEC 4', room: 'Annex RM 6' }
            ],
            3: [
                { time: '8:00 AM - 11:00 AM', subject: 'UED 101', room: 'Online' },
                { time: '2:00 PM - 5:00 PM', subject: 'CC 106', room: 'Main Bldg. CHS LAB' }
            ],
            4: [
                { time: '8:00 AM - 10:00 AM', subject: 'SIA 101', room: 'Online' },
                { time: '11:00 AM - 2:00 PM', subject: 'PF 102', room: 'Online' },
                { time: '3:00 PM - 4:30 PM', subject: 'GE ELEC 4', room: 'Online' }
            ],
            5: [
                { time: '7:00 AM - 9:00 AM', subject: 'NET 102', room: 'Online' },
                { time: '9:00 AM - 11:00 AM', subject: 'IT ELEC 2', room: 'Online' },
                { time: '1:00 PM - 3:00 PM', subject: 'PF 102', room: 'Annex RM 6' }
            ]
        };

        const today = new Date();
        let visibleMonth = new Date(today.getFullYear(), today.getMonth(), 1);
        let selectedDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());
        const dateKey = date => `${date.getFullYear()}-${String(date.getMonth()+1).padStart(2,'0')}-${String(date.getDate()).padStart(2,'0')}`;
        let savedEvents = JSON.parse(localStorage.getItem('siaCalendarEvents') || '[]');
        let eventOverrides = JSON.parse(localStorage.getItem('siaCalendarOverrides') || '{}');
        let deletedDefaultEvents = JSON.parse(localStorage.getItem('siaDeletedCalendarEvents') || '[]');
        let recurringEvents = [];
        let editingEvent = null;
        let eventToDelete = null;

        Object.entries(defaultSchedule).forEach(([weekday, events]) => {
            events.forEach((event, index) => recurringEvents.push({
                id: `default-${weekday}-${index}`, weekday: Number(weekday), ...event, isDefault: true
            }));
        });

        function saveEvents() {
            localStorage.setItem('siaCalendarEvents', JSON.stringify(savedEvents));
            localStorage.setItem('siaCalendarOverrides', JSON.stringify(eventOverrides));
            localStorage.setItem('siaDeletedCalendarEvents', JSON.stringify(deletedDefaultEvents));
        }

        function formatDate(date, options) {
            return date.toLocaleDateString('en-US', options);
        }

        function getEventsForDate(date) {
            return [
                ...recurringEvents.filter(event => event.weekday === date.getDay() && !deletedDefaultEvents.includes(event.id))
                    .map(event => ({ ...event, ...(eventOverrides[event.id] || {}) })),
                ...savedEvents.filter(event => event.date === dateKey(date))
            ];
        }

        function renderCalendar() {
            const grid = document.getElementById('calendarGrid');
            grid.querySelectorAll('.calendar-day').forEach(day => day.remove());
            document.getElementById('monthLabel').textContent = formatDate(visibleMonth, {
                month: 'long', year: 'numeric'
            });

            const year = visibleMonth.getFullYear();
            const month = visibleMonth.getMonth();
            const firstWeekday = (new Date(year, month, 1).getDay() + 6) % 7;
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const cellCount = Math.ceil((firstWeekday + daysInMonth) / 7) * 7;

            for (let cellIndex = 0; cellIndex < cellCount; cellIndex += 1) {
                const dayDate = new Date(year, month, cellIndex - firstWeekday + 1);
                const dayCell = document.createElement('div');
                dayCell.className = 'calendar-day';

                if (dayDate.getMonth() !== month) dayCell.classList.add('outside-month');
                if (dayDate.toDateString() === today.toDateString()) dayCell.classList.add('today');
                if (dayDate.toDateString() === selectedDate.toDateString()) dayCell.classList.add('selected');

                const number = document.createElement('span');
                number.className = 'day-number';
                number.textContent = dayDate.getDate();
                dayCell.appendChild(number);

                const events = getEventsForDate(dayDate);
                if (events.length > 0) {
                    const eventList = document.createElement('div');
                    eventList.className = 'day-events';
                    events.forEach(event => {
                        const marker = document.createElement('div');
                        marker.className = 'day-event';
                        
                        const textSpan = document.createElement('span');
                        textSpan.textContent = `${event.time.split(' - ')[0]} ${event.subject}`;
                        marker.appendChild(textSpan);

                        const inlineActions = document.createElement('div');
                        inlineActions.className = 'event-inline-actions';

                        const editBtn = document.createElement('button');
                        editBtn.className = 'inline-edit';
                        editBtn.textContent = '✎';
                        editBtn.title = 'Edit Class';
                        editBtn.onclick = (e) => {
                            e.stopPropagation();
                            openClassModal(event);
                        };

                        const deleteBtn = document.createElement('button');
                        deleteBtn.className = 'inline-delete';
                        deleteBtn.textContent = '✕';
                        deleteBtn.title = 'Delete Class';
                        deleteBtn.onclick = (e) => {
                            e.stopPropagation();
                            openDeleteModal(event);
                        };

                        inlineActions.append(editBtn, deleteBtn);
                        marker.appendChild(inlineActions);
                        eventList.appendChild(marker);
                    });
                    dayCell.appendChild(eventList);
                }

                dayCell.addEventListener('click', () => {
                    selectedDate = dayDate;
                    renderCalendar();
                });
                grid.appendChild(dayCell);
            }
        }

        /* Modal Functions for Add/Edit */
        function openClassModal(eventToEdit = null) {
            editingEvent = eventToEdit;
            const modal = document.getElementById('classModal');
            const modalTitle = document.getElementById('modalTitle');

            if (editingEvent) {
                modalTitle.textContent = 'Edit Class';
                document.getElementById('subjectInput').value = editingEvent.subject;
                document.getElementById('timeInput').value = editingEvent.time;
                document.getElementById('roomInput').value = editingEvent.room;
            } else {
                modalTitle.textContent = 'Add New Class';
                document.getElementById('classForm').reset();
            }

            modal.classList.add('active');
        }

        function closeClassModal() {
            document.getElementById('classModal').classList.remove('active');
            editingEvent = null;
        }

        document.getElementById('classForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const subject = document.getElementById('subjectInput').value.trim();
            const time = document.getElementById('timeInput').value.trim();
            const room = document.getElementById('roomInput').value.trim();

            if (!subject || !time || !room) return;

            const changes = { subject, time, room };

            if (editingEvent) {
                if (editingEvent.isDefault) {
                    eventOverrides[editingEvent.id] = changes;
                } else {
                    const item = savedEvents.find(i => i.id === editingEvent.id);
                    if (item) Object.assign(item, changes);
                }
            } else {
                savedEvents.push({
                    id: `event-${Date.now()}`,
                    date: dateKey(selectedDate),
                    subject,
                    time,
                    room
                });
            }

            saveEvents();
            renderCalendar();
            closeClassModal();
        });

        /* Modal Functions for Delete */
        function openDeleteModal(event) {
            eventToDelete = event;
            document.getElementById('deleteMessage').textContent = `Are you sure you want to delete ${event.subject} from the schedule?`;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
            eventToDelete = null;
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
            if (!eventToDelete) return;
            if (eventToDelete.isDefault) {
                deletedDefaultEvents.push(eventToDelete.id);
            } else {
                savedEvents = savedEvents.filter(item => item.id !== eventToDelete.id);
            }
            saveEvents();
            renderCalendar();
            closeDeleteModal();
        });

        document.getElementById('addClassButton').addEventListener('click', () => openClassModal());
        document.getElementById('previousMonth').addEventListener('click', () => {
            visibleMonth = new Date(visibleMonth.getFullYear(), visibleMonth.getMonth() - 1, 1);
            renderCalendar();
        });
        document.getElementById('nextMonth').addEventListener('click', () => {
            visibleMonth = new Date(visibleMonth.getFullYear(), visibleMonth.getMonth() + 1, 1);
            renderCalendar();
        });
        document.getElementById('goToToday').addEventListener('click', () => {
            visibleMonth = new Date(today.getFullYear(), today.getMonth(), 1);
            selectedDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());
            renderCalendar();
        });

        renderCalendar();

        function toggleNotificationSidebar() {
            const sidebar = document.getElementById('notifSidebar');
            const overlay = document.getElementById('notifOverlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('open');
        }
    </script>
</body>
</html>