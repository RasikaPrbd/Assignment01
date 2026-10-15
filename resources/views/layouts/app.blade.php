<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            flex-shrink: 0;
            background: #0f172a;
            color: white;
            padding: 24px 16px;
        }

        .brand {
            display: block;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            margin-bottom: 32px;
        }

        .menu-heading {
            color: #94a3b8;
            font-size: 12px;
            font-weight: bold;
            margin: 24px 12px 10px;
        }

        .menu-link {
            display: block;
            padding: 12px;
            margin-bottom: 6px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 6px;
        }

        .menu-link:hover {
            background: #334155;
            color: white;
        }

        .main-area {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: white;
            min-height: 72px;
            padding: 16px 28px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .topbar form {
            margin: 0;
        }

        .logout-button {
            padding: 10px 16px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .content {
            padding: 28px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .table-wrap {
            overflow-x: auto;
            background: white;
            border-radius: 8px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        .data-table th {
            background: #e2e8f0;
            color: #1e293b;
        }

        .action-button {
            display: inline-block;
            padding: 10px 14px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .delete-button {
            padding: 8px 12px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .alert-success {
            padding: 12px;
            margin-bottom: 16px;
            background: #dcfce7;
            color: #166534;
            border-radius: 6px;
        }

        .alert-error {
            padding: 12px;
            margin-bottom: 16px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 6px;
        }


        .form-card {
            max-width: 650px;
            padding: 24px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font: inherit;
        }

        textarea.form-control {
            resize: vertical;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 24px;
        }

        .secondary-button {
            display: inline-block;
            padding: 10px 14px;
            background: #e2e8f0;
            color: #1e293b;
            text-decoration: none;
            border-radius: 6px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .stat-card h3 {
            margin: 0 0 12px;
            color: #64748b;
            font-size: 15px;
        }

        .stat-card .stat-number {
            font-size: 32px;
            font-weight: bold;
            margin: 0;
            color: #0f172a;
        }

        @media (max-width: 800px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .content {
                padding: 16px;
            }

            .topbar {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="layout">

        <aside class="sidebar">

            <a href="{{ route('dashboard') }}" class="brand">
                Inventory Admin
            </a>

            <p class="menu-heading">MAIN MENU</p>

            <a href="{{ route('dashboard') }}" class="menu-link">
                Dashboard
            </a>

            <p class="menu-heading">MANAGEMENT</p>

            <a href="{{ route('users.index') }}" class="menu-link">
                User Management
            </a>

            <a href="{{ route('customers.index') }}" class="menu-link">
                Customer Management
            </a>

            <a href="{{ route('products.index') }}" class="menu-link">
                Product Management
            </a>

        </aside>

        <div class="main-area">

            <header class="topbar">

                <span>
                    {{ auth()->user()->name }}
                </span>

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
