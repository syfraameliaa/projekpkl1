<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bs.min.css">
    <title>Login</title>
    <style>
        body {
            background: url('/img/bg.jpg') no-repeat center center/cover;
            min-height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 0;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            z-index: 1;
        }

        .card-custom {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 420px;
            border: 1px solid rgba(255,255,255,0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1e3a8a;
            font-weight: 700;
        }

        label {
            color: #1e40af;
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #bfdbfe;
            padding: 10px;
            background: rgba(255,255,255,0.85);
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-primary:hover {
            box-shadow: 0 5px 15px rgba(59,130,246,0.4);
        }

        .link-register {
            text-align: center;
            margin-top: 15px;
        }

        .link-register a {
            color: #1e40af;
            text-decoration: none;
            font-weight: 500;
        }

        footer {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="card-custom">
            <h2>Login</h2>

            <form action="{{ route('authenticate') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary text-white">Login</button>

                <div class="link-register">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <x-footer />
</body>
</html>