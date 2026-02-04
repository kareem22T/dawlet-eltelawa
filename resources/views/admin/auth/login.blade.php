<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - لوحة التحكم</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #1a1410 0%, #2d1810 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Background decoration */
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(214, 142, 38, 0.1) 0%, transparent 70%);
            top: -250px;
            right: -250px;
            border-radius: 50%;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(214, 142, 38, 0.08) 0%, transparent 70%);
            bottom: -200px;
            left: -200px;
            border-radius: 50%;
        }

        .login-container {
            background: rgba(26, 20, 16, 0.95);
            border: 1px solid rgba(214, 142, 38, 0.3);
            border-radius: 24px;
            padding: 40px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #D68E26, #C17A1F);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 24px rgba(214, 142, 38, 0.3);
        }

        .login-icon svg {
            width: 40px;
            height: 40px;
            fill: white;
        }

        .login-title {
            color: #D68E26;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }

        .alert {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #EF4444;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(214, 142, 38, 0.2);
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-family: 'Cairo', sans-serif;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #D68E26;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(214, 142, 38, 0.1);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
        }

        .form-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(214, 142, 38, 0.3);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.05);
            cursor: pointer;
            accent-color: #D68E26;
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        .login-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #D68E26, #C17A1F);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            font-family: 'Cairo', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(214, 142, 38, 0.3);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(214, 142, 38, 0.4);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #D68E26;
        }

        .back-link svg {
            width: 16px;
            height: 16px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            .login-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                </svg>
            </div>
            <h1 class="login-title">لوحة التحكم</h1>
            <p class="login-subtitle">قم بتسجيل الدخول للوصول إلى لوحة الإدارة</p>
        </div>

        @if ($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" class="form-input" value="{{ old('email') }}"
                    placeholder="أدخل البريد الإلكتروني" required autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">كلمة المرور</label>
                <input id="password" type="password" name="password" class="form-input" placeholder="أدخل كلمة المرور"
                    required>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">تذكرني</label>
            </div>

            <button type="submit" class="login-button">تسجيل الدخول</button>
        </form>

        <a href="{{ route('home') }}" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            العودة للصفحة الرئيسية
        </a>
    </div>
</body>

</html>
