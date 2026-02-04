<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة التحكم - المتأهلون الـ 32')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Cairo", sans-serif;
            background: #0A0A0A;
            color: #fff;
            min-height: 100vh;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1A1410 0%, #0A0A0A 100%);
            border-left: 1px solid rgba(214, 142, 38, 0.2);
            padding: 30px 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(214, 142, 38, 0.2);
        }

        .sidebar-logo img {
            width: 60px;
            margin-bottom: 10px;
        }

        .sidebar-logo h2 {
            color: #D68E26;
            font-size: 20px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(214, 142, 38, 0.1);
            color: #D68E26;
        }

        .sidebar-menu svg {
            width: 20px;
            height: 20px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-right: 280px;
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            color: #D68E26;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
        }

        /* Cards */
        .card {
            background: linear-gradient(180deg, #1A1410 0%, #0A0A0A 100%);
            border: 1px solid rgba(214, 142, 38, 0.3);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 20px;
            color: #fff;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #1A1410 0%, #0A0A0A 100%);
            border: 1px solid rgba(214, 142, 38, 0.3);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(214, 142, 38, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .stat-value {
            font-size: 36px;
            font-weight: bold;
            color: #D68E26;
            margin-bottom: 8px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: right;
            border-bottom: 1px solid rgba(214, 142, 38, 0.1);
        }

        th {
            background: rgba(214, 142, 38, 0.1);
            color: #D68E26;
            font-weight: 600;
        }

        tr:hover {
            background: rgba(214, 142, 38, 0.05);
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(180deg, #D68E26 0%, #B7880D 100%);
            color: #000;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(214, 142, 38, 0.4);
        }

        .btn-secondary {
            background: rgba(214, 142, 38, 0.1);
            color: #D68E26;
            border: 1px solid rgba(214, 142, 38, 0.3);
        }

        .btn-danger {
            background: rgba(220, 38, 38, 0.1);
            color: #DC2626;
            border: 1px solid rgba(220, 38, 38, 0.3);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 14px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            background: rgba(26, 20, 16, 0.5);
            border: 1px solid rgba(214, 142, 38, 0.2);
            border-radius: 8px;
            color: #fff;
            font-family: "Cairo", sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #D68E26;
            background: rgba(26, 20, 16, 0.7);
        }

        /* Alerts */
        .alert {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22C55E;
        }

        .alert-error {
            background: rgba(220, 38, 38, 0.1);
            border: 1px solid rgba(220, 38, 38, 0.3);
            color: #DC2626;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-right: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo">
                <h2>لوحة التحكم</h2>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="14" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                        </svg>
                        الرئيسية
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.contestants.index') }}"
                        class="{{ request()->routeIs('admin.contestants.*') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        المتسابقون
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.votes') }}"
                        class="{{ request()->routeIs('admin.votes') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M9 12l2 2 4-4" />
                            <path d="M5 7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7z" />
                            <path d="M22 19H2" />
                        </svg>
                        الأصوات
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                            <polyline points="15 3 21 3 21 9" />
                            <line x1="10" y1="14" x2="21" y2="3" />
                        </svg>
                        عرض الموقع
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>
