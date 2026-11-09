<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - MyTics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #070d1e 0%, #0a1931 100%);
            color: #f8fafc;
            min-height: 100vh;
        }

        .navbar {
            background-color: rgba(7, 13, 30, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(16, 185, 129, 0.15);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35);
        }

        .navbar .left, .navbar .right {
            display: flex;
            align-items: center;
        }

        .navbar .left h1 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, #10b981, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar .left a,
        .navbar .right a,
        .navbar .right form button {
            margin-left: 20px;
            color: rgba(241, 245, 249, 0.85);
            background: none;
            border: none;
            cursor: pointer;
            font: inherit;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .navbar .left a:hover,
        .navbar .right a:hover,
        .navbar .right form button:hover {
            color: #10b981;
        }

        .navbar .right form {
            margin: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px);
            padding: 20px;
            box-sizing: border-box;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 35px 30px;
            border-radius: 18px;
            width: 340px;
            max-width: 100%;
            text-align: center;
            border: 1px solid rgba(16, 185, 129, 0.15);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
        }

        .login-box h2 {
            margin-bottom: 24px;
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, #ffffff, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-group {
            margin-bottom: 16px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.45);
        }

        .form-group input:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.09);
            border-color: #10b981;
            box-shadow: 0 0 12px rgba(16, 185, 129, 0.35);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #059669, #10b981);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.35);
            transition: all 0.2s ease;
            margin-top: 6px;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #10b981, #34d399);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
        }

        .register-link {
            margin-top: 20px;
            font-size: 14px;
            color: #94a3b8;
        }

        .register-link a {
            color: #34d399;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .register-link a:hover {
            color: #6ee7b7;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="left">
            <h1>MyTics</h1>
            <a href="{{ url('/beranda') }}">Beranda</a>
            <a href="{{ url('/helpcenter') }}">Help Center</a>
        </div>
        <div class="right">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
        </div>
    </div>

    <div class="login-container">
        <div class="login-box">
            <h2>Login ke MyTics</h2>

            @if(session('error'))
                <div style="color: red;">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>

</body>
</html>
