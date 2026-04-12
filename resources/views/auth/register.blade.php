<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bs.min.css">
    <title>Register</title>
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

        .link-login {
            text-align: center;
            margin-top: 15px;
        }

        .link-login a {
            color: #1e40af;
            text-decoration: none;
            font-weight: 500;
        }

        .text-danger {
            font-size: 0.875rem;
            color: #dc3545;
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
            <h2>Register</h2>

            <form action="{{ route('store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary text-white">Register</button>

                <div class="link-login">
                    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>

    <x-footer />
</body>
</html>