<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTics</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, #070d1e 0%, #0a1931 100%);
            color: #f8fafc;
            min-height: 100vh;
        }

        .navbar {
            background-color: rgba(7, 13, 30, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 0.75rem 2rem;
            border-bottom: 1px solid rgba(16, 185, 129, 0.15);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, #10b981, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            color: rgba(241, 245, 249, 0.85) !important;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #10b981 !important;
        }

        .btn-auth {
            background: linear-gradient(135deg, #059669, #10b981);
            border: none;
            color: #ffffff;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.4rem 1.2rem;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-auth:hover {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
        }

        .card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(16, 185, 129, 0.15);
            border-radius: 16px;
            color: #f8fafc;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }

        .card-header {
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid rgba(16, 185, 129, 0.15);
            font-weight: 600;
            color: #34d399;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: white;
            border-radius: 8px;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.09);
            color: white;
            border-color: #10b981;
            box-shadow: 0 0 12px rgba(16, 185, 129, 0.35);
        }

        .btn-primary {
            background: linear-gradient(135deg, #059669, #10b981);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #10b981, #34d399);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/beranda') }}">MyTics</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="{{ url('/beranda') }}">Beranda</a>
                <a class="nav-link" href="{{ url('/helpcenter') }}">Help Center</a>
            </div>
            <div>
                <a href="{{ route('login') }}" class="btn-auth">Login</a>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
