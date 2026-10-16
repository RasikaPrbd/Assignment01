<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Form</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #1f2937;
        }

        .login-card {
            background-color: #ffffff;
            width: 100%;
            max-width: 380px;
            padding: 32px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        h1 {
            margin: 0 0 8px;
            text-align: center;
            font-size: 26px;
            font-weight: 600;
        }

        .subtitle {
            margin: 0 0 28px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        input {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 12px;
            font-family: inherit;
            font-size: 14px;
            color: #111827;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.15s ease;
        }

        input::placeholder {
            color: #9ca3af;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.12);
        }

        .error-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 5px;
            color: #b91c1c;
            font-size: 13px;
            line-height: 1.5;
        }

        .error-message p {
            margin: 0 0 5px;
        }

        .error-message p:last-child {
            margin-bottom: 0;
        }


        button {
            width: 100%;
            min-height: 44px;
            padding: 12px;
            margin-top: 26px;

            background-color: #eaf2ff;
            color: #1d4ed8;

            border: 1px solid #c7dcff;
            border-radius: 6px;

            font-family: inherit;
            font-size: 15px;
            font-weight: 600;

            cursor: pointer;
            transition: background-color 0.15s ease,
                border-color 0.15s ease;
        }

        button:hover {
            background-color: #dbeafe;
            border-color: #a5c8ff;
        }

        button:focus-visible {
            outline: 2px solid #2563eb;
            outline-offset: 3px;
        }


        @media (max-width: 480px) {
            .login-card {
                padding: 24px;
            }
        }
    </style>
</head>

<body>

    <main class="login-card">
        <h1>Login</h1>
        <p class="subtitle">Enter your account details to sign in.</p>

        @if ($errors->any())
            <div class="error-message" role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('authenticate') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Enter your email" autocomplete="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    autocomplete="current-password" required>
            </div>

            <button type="submit">Sign In</button>
        </form>
    </main>

</body>

</html>
