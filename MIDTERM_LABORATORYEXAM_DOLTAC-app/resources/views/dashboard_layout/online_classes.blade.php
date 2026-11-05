<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Classes - SIA101 Student Portal</title>

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
            max-width: 1000px;
            width: 92%;
            margin: 40px auto;
            flex: 1;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            color: #2b4374;
            margin-bottom: 6px;
        }

        .header p {
            font-size: 14px;
            color: #667085;
        }

        .classes {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .class-card {
            --class-accent: #4b78ad;
            position: relative;
            display: flex;
            min-height: 285px;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #dce5f0;
            border-top: 3px solid var(--class-accent);
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 12px 28px rgba(31, 50, 88, 0.08), 0 2px 6px rgba(31, 50, 88, 0.04);
            transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease;
        }

        .class-card:nth-child(3n + 2) {
            --class-accent: #3b9a91;
        }

        .class-card:nth-child(3n) {
            --class-accent: #d29a4a;
        }

        .class-card:hover {
            transform: translateY(-5px);
            border-color: color-mix(in srgb, var(--class-accent) 38%, #dce5f0);
            border-top-color: var(--class-accent);
            box-shadow: 0 22px 38px rgba(31, 50, 88, 0.15), 0 5px 12px rgba(31, 50, 88, 0.06);
        }

        .class-icon {
            width: 50px;
            height: 50px;
            flex: 0 0 50px;
            background: color-mix(in srgb, var(--class-accent) 12%, #ffffff);
            border: 1px solid color-mix(in srgb, var(--class-accent) 22%, #ffffff);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--class-accent);
            margin: 0 auto 16px;
        }

        .class-icon svg {
            width: 22px;
            height: 22px;
        }

        .class-card h3 {
            font-size: 18px;
            color: #2b4374;
            margin-bottom: 9px;
        }

        .class-card p {
            font-size: 13px;
            line-height: 1.4;
            min-height: 35px;
            color: #667085;
            margin-bottom: 15px;
        }

        .class-status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-size: 11.5px;
            background: #f3f8f6;
            border: 1px solid #d8ebe2;
            border-radius: 999px;
            padding: 7px 11px;
            margin: auto 0 16px;
            color: #426b58;
        }

        .class-status::before {
            content: "";
            width: 7px;
            height: 7px;
            flex: 0 0 7px;
            border-radius: 50%;
            background: #70a989;
        }

        .class-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            text-decoration: none;
            color: white;
            background: #2b4374;
            border: none;
            border-radius: 8px;
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(43, 67, 116, 0.25);
            transition: 0.2s;
        }

        .class-btn svg {
            width: 15px;
            height: 15px;
        }

        .class-btn:hover {
            background: #1f3258;
            transform: translateY(-2px);
        }

        .class-btn:focus-visible {
            outline: 3px solid #9cc9ef;
            outline-offset: 3px;
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
            max-width: 420px;
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
            padding: 22px 20px;
            font-size: 14px;
            color: #475569;
            line-height: 1.5;
            text-align: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            text-align: left;
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

        @media (max-width: 850px) {
            .classes {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .classes {
                grid-template-columns: 1fr;
            }

            .container {
                margin-top: 30px;
            }

            .modal-card {
                width: 90%;
            }
        }

        .manage-add-btn { 
            margin-top: 18px; 
            border: 1px solid #3b9a91; 
            border-radius: 8px; 
            padding: 10px 18px; 
            background: #3b9a91; 
            color: #ffffff; 
            font: inherit; 
            font-size: 13px; 
            font-weight: 600; 
            cursor: pointer; 
            transition: background 0.2s, border-color 0.2s; 
        }
        .manage-add-btn:hover { 
            background: #287c75; 
            border-color: #287c75; 
        }

        .card-actions { display:flex; gap:8px; margin-top:12px; }
        .card-actions button { border:0; border-radius:6px; padding:7px 12px; font-size:12px; font-weight:600; cursor:pointer; }
        .subject-edit { background:#e8eef8; color:#2b4374; }
        .subject-delete { background:#fdecec; color:#b42318; }
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
                <a href="/calendar">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    Calendar
                </a>
                <a href="/online-classes" class="active">
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

    <div class="container">
        <div class="header">
            <h1>Online Classes</h1>
            <p>Access your subject classrooms and online learning activities.</p>
            <button type="button" class="manage-add-btn" id="addSubjectButton">+ Add Subject</button>
        </div>

        <div class="classes" id="classesContainer"></div>
    </div>

    <!-- Modal Form for Add/Edit Subject -->
    <div id="subjectModal" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header">
                <h3 id="modalTitle">Add New Subject</h3>
                <button type="button" class="modal-close" onclick="closeSubjectModal()">&times;</button>
            </div>
            <form id="subjectForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nameInput">Subject Code or Name</label>
                        <input type="text" id="nameInput" placeholder="e.g. SIA 101" required>
                    </div>
                    <div class="form-group">
                        <label for="descInput">Subject Description</label>
                        <input type="text" id="descInput" placeholder="e.g. Systems analysis activities" required>
                    </div>
                    <div class="form-group">
                        <label for="urlInput">Classroom Link</label>
                        <input type="text" id="urlInput" placeholder="e.g. https://meet.google.com/...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeSubjectModal()">Cancel</button>
                    <button type="submit" class="btn-save">Save Subject</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Confirmation for Delete Subject -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header" style="background: #b42318;">
                <h3>Confirm Delete</h3>
                <button type="button" class="modal-close" onclick="closeDeleteModal()">&times;</button>
            </div>
            <div class="modal-body" id="deleteMessage">
                Are you sure you want to delete this subject?
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
        const defaultSubjects = [
            { id:'ued101', name:'UED 101', description:'Understanding the basics and concepts of the subject.', status:'Online Classroom: Available Soon', url:'#' },
            { id:'geelec4', name:'GE ELEC 4', description:'General education elective subject and activities.', status:'Online Classroom: Available Soon', url:'#' },
            { id:'net102', name:'NET 102', description:'Networking concepts, activities, and laboratory tasks.', status:'Online Classroom: Available Soon', url:'#' },
            { id:'pf102', name:'PF 102', description:'Programming fundamentals and coding activities.', status:'Online Classroom: Available Soon', url:'#' },
            { id:'cc106', name:'CC 106', description:'Application development concepts and projects.', status:'Online Classroom: Available Soon', url:'#' },
            { id:'sia101', name:'SIA 101', description:'Systems analysis and information systems activities.', status:'Online Classroom: Available Soon', url:'#' }
        ];

        let subjects = JSON.parse(localStorage.getItem('siaOnlineSubjects') || 'null') || defaultSubjects;
        let editingSubject = null;
        let subjectToDeleteId = null;

        function saveSubjects() {
            localStorage.setItem('siaOnlineSubjects', JSON.stringify(subjects));
        }

        function renderSubjects() {
            const container = document.getElementById('classesContainer');
            container.replaceChildren();
            subjects.forEach(subject => {
                const card = document.createElement('div');
                card.className = 'class-card';
                const icon = document.createElement('div');
                icon.className = 'class-icon';
                icon.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>';
                const title = document.createElement('h3');
                title.textContent = subject.name;
                const description = document.createElement('p');
                description.textContent = subject.description;
                const status = document.createElement('div');
                status.className = 'class-status';
                status.textContent = subject.status;
                const link = document.createElement('a');
                link.href = subject.url || '#';
                link.className = 'class-btn';
                link.textContent = 'Enter Classroom';
                const actions = document.createElement('div');
                actions.className = 'card-actions';
                const edit = document.createElement('button');
                edit.className = 'subject-edit';
                edit.textContent = 'Edit';
                edit.onclick = () => openSubjectModal(subject);
                const remove = document.createElement('button');
                remove.className = 'subject-delete';
                remove.textContent = 'Delete';
                remove.onclick = () => openDeleteModal(subject);
                actions.append(edit, remove);
                card.append(icon, title, description, status, link, actions);
                container.appendChild(card);
            });
        }

        function openSubjectModal(subjectToEdit = null) {
            editingSubject = subjectToEdit;
            const modal = document.getElementById('subjectModal');
            const modalTitle = document.getElementById('modalTitle');

            if (editingSubject) {
                modalTitle.textContent = 'Edit Subject';
                document.getElementById('nameInput').value = editingSubject.name;
                document.getElementById('descInput').value = editingSubject.description;
                document.getElementById('urlInput').value = editingSubject.url === '#' ? '' : editingSubject.url;
            } else {
                modalTitle.textContent = 'Add New Subject';
                document.getElementById('subjectForm').reset();
            }

            modal.classList.add('active');
        }

        function closeSubjectModal() {
            document.getElementById('subjectModal').classList.remove('active');
            editingSubject = null;
        }

        document.getElementById('subjectForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('nameInput').value.trim();
            const description = document.getElementById('descInput').value.trim();
            const urlInput = document.getElementById('urlInput').value.trim();
            const url = urlInput ? urlInput : '#';

            if (!name || !description) return;

            if (editingSubject) {
                editingSubject.name = name;
                editingSubject.description = description;
                editingSubject.url = url;
            } else {
                subjects.push({
                    id: `subject-${Date.now()}`,
                    name,
                    description,
                    status: 'Online Classroom: Available Soon',
                    url
                });
            }

            saveSubjects();
            renderSubjects();
            closeSubjectModal();
        });

        function openDeleteModal(subject) {
            subjectToDeleteId = subject.id;
            document.getElementById('deleteMessage').textContent = `Are you sure you want to delete ${subject.name} from your online classes?`;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
            subjectToDeleteId = null;
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
            if (!subjectToDeleteId) return;
            subjects = subjects.filter(item => item.id !== subjectToDeleteId);
            saveSubjects();
            renderSubjects();
            closeDeleteModal();
        });

        document.getElementById('addSubjectButton').addEventListener('click', () => openSubjectModal());
        renderSubjects();

        function toggleNotificationSidebar() {
            const sidebar = document.getElementById('notifSidebar');
            const overlay = document.getElementById('notifOverlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('open');
        }
    </script>
</body>
</html>