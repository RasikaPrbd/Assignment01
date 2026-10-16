<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f6f8;
            color: #1f2937;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Header */

        header {
            padding: 20px 28px;
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        .header-content {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
        }

        /* Main content */

        main {
            width: 100%;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .user-card {
            padding: 32px;
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .user-card h1 {
            margin: 0 0 18px;
            font-size: 26px;
            font-weight: 600;
            line-height: 1.3;
            overflow-wrap: anywhere;
        }

        .user-card p {
            margin: 16px 0;
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
        }

        /* Login status */

        .status {
            display: inline-block;
            padding: 6px 11px;
            margin-bottom: 8px;
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 600;
        }

        /* Logout button */

        form {
            margin: 24px 0 0;
        }

        .logout-button {
            display: inline-block;
            min-height: 42px;
            padding: 10px 18px;
            background-color: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 6px;
            font-family: inherit;
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

        .logout-button:focus-visible {
            outline: 2px solid #2563eb;
            outline-offset: 3px;
        }

        /* Responsive layout */

        @media (max-width: 480px) {
            header {
                padding: 18px 20px;
            }

            main {
                margin: 24px auto;
                padding: 0 16px;
            }

            .user-card {
                padding: 22px;
            }

            .user-card h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="header-content">
            <h2>User Dashboard</h2>
        </div>
    </header>

    <main>
        <section class="user-card">

            <h1>
                Welcome, {{ auth()->user()->name }}!
            </h1>

            <span class="status">
                Logged In Successfully
            </span>

            <p>
                Welcome to the system. You have successfully
                logged in to your account.
            </p>

            <p>
                You can safely log out when you are finished.
            </p>

            <form method="POST" action="{{ route('logout') }}"
                onsubmit="return confirm('Are you sure you want to log out?');">

                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>

            </form>

        </section>
    </main>

</body>

</html>
