<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --page-bg: #f5f6f8;
            --surface: #ffffff;
            --text: #1f2937;
            --text-muted: #6b7280;
            --border: #e5e7eb;
            --sidebar-bg: #0f172a;
            --sidebar-text: #cbd5e1;
            --danger: #dc2626;
            --danger-hover: #b91c1c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: var(--page-bg);
            color: var(--text);
            font-size: 14px;
            line-height: 1.5;
        }

        a {
            color: var(--primary);
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        button,
        a,
        input,
        select,
        textarea {
            -webkit-tap-highlight-color: transparent;
        }

        button:focus-visible,
        a:focus-visible,
        input:focus-visible,
        select:focus-visible,
        textarea:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Main layout */

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            flex-shrink: 0;
            padding: 24px 16px;
            background-color: var(--sidebar-bg);
            color: #ffffff;
        }

        .brand {
            display: block;
            margin-bottom: 32px;
            color: #ffffff;
            font-size: 20px;
            font-weight: 700;
            text-decoration: none;
        }

        .menu-heading {
            margin: 24px 12px 10px;
            color: #94a3b8;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.4px;
        }


        .menu-link {
            display: block;
            padding: 11px 12px;
            margin-bottom: 6px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            border-left: 3px solid transparent;
            transition: background-color 0.15s ease,
                color 0.15s ease,
                border-color 0.15s ease;
        }

        .menu-link:hover {
            background-color: #1e293b;
            color: #ffffff;
            border-left-color: #93c5fd;
        }

        .menu-link:focus-visible {
            outline: 2px solid #93c5fd;
            outline-offset: 2px;
        }


        .menu-link.active {
            background-color: #1e293b;
            color: #ffffff;
            border-left: 3px solid #93c5fd;
        }

        .menu-link.active:hover {
            background-color: #334155;
            color: #ffffff;
        }



        .main-area {
            display: flex;
            flex: 1;
            flex-direction: column;
            min-width: 0;
        }

        /* Top navigation */

        .topbar {
            display: flex;
            min-height: 72px;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: center;
            gap: 16px;
            padding: 16px 28px;
            background-color: var(--surface);
            border-bottom: 1px solid var(--border);
        }

        .topbar span {
            color: var(--text);
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .topbar form {
            margin: 0;
        }

        .logout-button {
            min-height: 40px;
            padding: 10px 16px;
            background-color: var(--danger);
            color: #ffffff;
            border: 1px solid var(--danger);
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: var(--danger-hover);
            border-color: var(--danger-hover);
        }

        /* Page content and headings */

        .content {
            flex: 1;
            min-width: 0;
            padding: 28px;
        }

        .page-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            color: var(--text);
            font-size: 26px;
            font-weight: 600;
            line-height: 1.3;
        }

        .page-header p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        /* Forms */

        .form-card {
            width: 100%;
            max-width: 650px;
            padding: 28px;
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-size: 14px;
            font-weight: 600;
        }

        .form-control {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 12px;
            background-color: #ffffff;
            color: var(--text);
            border: 1px solid #d1d5db;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.12);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .form-control:disabled {
            background-color: #f3f4f6;
            color: var(--text-muted);
            cursor: not-allowed;
        }

        .form-error,
        .invalid-feedback {
            display: block;
            margin-top: 6px;
            color: #b91c1c;
            font-size: 13px;
        }

        .is-invalid {
            border-color: #dc2626;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        /* Buttons */


        /* Top navigation logout button */

        .logout-button {
            min-height: 40px;
            padding: 10px 16px;
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.15s ease,
                border-color 0.15s ease;
        }

        .logout-button:hover {
            background-color: #fee2e2;
            border-color: #fca5a5;
        }

        /* Shared button styles */

        .action-button,
        .secondary-button,
        .delete-button {
            display: inline-flex;
            min-height: 40px;
            justify-content: center;
            align-items: center;
            gap: 6px;
            padding: 10px 16px;
            border: 1px solid transparent;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.15s ease,
                border-color 0.15s ease,
                color 0.15s ease;
        }

        /* Primary button: Add, Save, Create, Update */

        .action-button {
            background-color: #eaf2ff;
            color: #1d4ed8;
            border-color: #c7dcff;
        }

        .action-button:hover {
            background-color: #dbeafe;
            border-color: #a5c8ff;
        }

        /* Secondary button: Back, Cancel */

        .secondary-button {
            background-color: #f8fafc;
            color: #475569;
            border-color: #dbe1e8;
        }

        .secondary-button:hover {
            background-color: #eef2f7;
            border-color: #cbd5e1;
        }

        /* Delete button */

        .delete-button {
            min-height: 36px;
            padding: 8px 12px;
            background-color: #fef2f2;
            color: #b91c1c;
            border-color: #fecaca;
        }

        .delete-button:hover {
            background-color: #fee2e2;
            border-color: #fca5a5;
        }

        /* Keyboard accessibility */

        .action-button:focus-visible,
        .secondary-button:focus-visible,
        .delete-button:focus-visible,
        .logout-button:focus-visible {
            outline: 2px solid #2563eb;
            outline-offset: 2px;
        }

        /* Tables */

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .data-table th,
        .data-table td {
            padding: 13px 16px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            vertical-align: middle;
        }

        .data-table th {
            background-color: #f9fafb;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .data-table td {
            color: #4b5563;
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .data-table tbody tr:hover {
            background-color: #f9fafb;
        }

        /* Success and error messages */

        .alert-success,
        .alert-error {
            padding: 12px 14px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border-color: #bbf7d0;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #991b1b;
            border-color: #fecaca;
        }

        /* Dashboard statistics */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        .stat-card {
            min-width: 0;
            padding: 24px;
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .stat-card h3 {
            margin: 0 0 16px;
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 600;
        }

        .stat-card .stat-number {
            margin: 0;
            color: var(--primary);
            font-size: 30px;
            font-weight: 600;
            line-height: 1.2;
            overflow-wrap: anywhere;
        }

        .edit-link {
            display: inline-block;
            padding: 7px 12px;
            background-color: #eaf2ff;
            color: #1d4ed8;
            border: 1px solid #c7dcff;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .edit-link:hover {
            background-color: #dbeafe;
            border-color: #a5c8ff;
        }

        .table-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .table-actions form {
            margin: 0;
        }


        /* Responsive layout */

        @media (max-width: 900px) {
            .content {
                padding: 24px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 20px 16px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .menu-heading {
                margin-top: 18px;
            }

            .topbar {
                justify-content: space-between;
                padding: 16px;
            }

            .content {
                padding: 20px 16px;
            }

            .page-header h1 {
                font-size: 23px;
            }

            .form-card {
                padding: 22px;
            }
        }

        @media (max-width: 420px) {
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .stat-card {
                padding: 20px;
            }

            .form-card {
                padding: 18px;
            }

            .data-table th,
            .data-table td {
                padding: 11px 12px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <div class="layout">


        <aside class="sidebar">

            <a href="{{ route('dashboard') }}" class="brand">
                Inventory Admin
            </a>

            <p class="menu-heading">MAIN MENU</p>

            <a href="{{ route('dashboard') }}" class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <p class="menu-heading">MANAGEMENT</p>

            <a href="{{ route('users.index') }}" class="menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                User Management
            </a>

            <a href="{{ route('customers.index') }}"
                class="menu-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                Customer Management
            </a>

            <a href="{{ route('products.index') }}"
                class="menu-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                Product Management
            </a>

        </aside>


        <div class="main-area">

            <header class="topbar">

                <span>{{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}"
                    onsubmit="return confirm('Are you sure you want to log out?');">

                    @csrf

                    <button type="submit" class="logout-button">
                        Logout
                    </button>

                </form>

            </header>

            <main class="content">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
