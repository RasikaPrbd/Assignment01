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
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #0f172a;
            color: white;
            padding: 20px 32px;
        }

        main {
            max-width: 800px;
            margin: 50px auto;
            padding: 24px;
        }

        .card {
            background: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #00000010;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            background: #dcfce7;
            color: #166534;
            border-radius: 20px;
            font-size: 14px;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            color: white;
            background: #dc2626;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

    <header>
        <h2>User Dashboard</h2>
    </header>

    <main>
        <div class="card">
            <h1>
                Welcome, {{ auth()->user()->name }}!
            </h1>

            <p class="status">Logged In Successfully</p>

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

                <button type="submit">Logout</button>
            </form>
        </div>
    </main>

</body>

</html>
