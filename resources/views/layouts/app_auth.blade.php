<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
        }

        /* Soft glow background */
        body::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #bfdbfe, transparent 70%);
            top: -150px;
            left: -150px;
            z-index: 0;
        }

        body::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #c7d2fe, transparent 70%);
            bottom: -150px;
            right: -150px;
            z-index: 0;
        }

        .auth-container {
            width: 100%;
            max-width: 1100px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border-radius: 24px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 1;
        }

        .auth-left {
            flex: 1;
            background: linear-gradient(135deg, #e0f2fe, #f0f9ff);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .auth-left img {
            width: 100%;
            max-width: 380px;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .auth-right {
            flex: 1;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 26px;
            color: #1f2937;
        }

        p.subtitle {
            margin-bottom: 30px;
            color: #6b7280;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        input:focus {
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .link {
            margin-top: 16px;
            font-size: 14px;
            color: #6b7280;
        }

        .link a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .link a:hover {
            text-decoration: underline;
        }

        /* ===== RESPONSIVE ===== */

        @media (max-width: 992px) {
            .auth-right {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                border-radius: 20px;
            }

            .auth-left {
                display: none;
            }

            .auth-right {
                padding: 35px 25px;
            }

            h2 {
                font-size: 22px;
            }

            body {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .auth-right {
                padding: 25px 18px;
            }

            input {
                padding: 12px 14px;
            }

            button {
                padding: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="auth-left">
            <img src="{{ asset('storage/auth/auth.png') }}" alt="Auth Image">
        </div>

        <div class="auth-right">
            @yield('content')
        </div>
    </div>

</body>

</html>
