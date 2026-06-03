<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register - Inventory Kantor</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Inter',sans-serif;
        }

        body{

           min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            overflow-y:auto;

            padding:40px 20px;


            background:
            linear-gradient(
                135deg,
                #81A6C6 0%,
                #A8C4DD 50%,
                #D6E5F2 100%
            );

        }

        body::before{

            content:'';

            position:fixed;

            inset:-200px;

            background:
            radial-gradient(circle at 20% 20%, rgba(255,255,255,0.35), transparent 25%),
            radial-gradient(circle at 80% 30%, rgba(255,255,255,0.25), transparent 25%),
            radial-gradient(circle at 50% 80%, rgba(255,255,255,0.20), transparent 25%);

            filter:blur(60px);

            animation:auroraMove 18s ease infinite;

            z-index:-2;

        }

        @keyframes auroraMove{

            0%{transform:translate(0,0);}
            25%{transform:translate(-30px,20px);}
            50%{transform:translate(30px,-20px);}
            75%{transform:translate(-20px,-30px);}
            100%{transform:translate(0,0);}

        }

        .register-card{

            width:100%;

            max-width:500px;

            background:rgba(255,255,255,0.60);

            backdrop-filter:blur(25px);

            border:1px solid rgba(255,255,255,0.35);

            border-radius:32px;

            padding:35px;

            box-shadow:
            0 20px 50px rgba(0,0,0,0.08);

            animation:fadeIn .8s ease;

            width:100%;
            max-width:500px;

            margin:40px 0;

        }

        @keyframes fadeIn{

            from{
                opacity:0;
                transform:translateY(20px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }

        }

        .logo-box{

            width:90px;

            height:90px;

            margin:auto;

            border-radius:24px;

            display:flex;

            justify-content:center;

            align-items:center;

            background:
            linear-gradient(
                135deg,
                #81A6C6,
                #5D87AD
            );

            color:white;

            font-size:42px;

            margin-bottom:25px;

            box-shadow:
            0 15px 30px rgba(93,135,173,.25);

        }

        h2{

            text-align:center;

            font-weight:800;

            color:#16324F;

            margin-bottom:8px;

        }

        .subtitle{

            text-align:center;

            color:#4b647d;

            margin-bottom:30px;

        }

        .form-label{

            font-weight:600;

            color:#334155;

            margin-bottom:8px;

        }

        .form-control{

            height:55px;

            border:none;

            border-radius:18px;

            background:white;

            padding-left:18px;

            box-shadow:
            0 4px 12px rgba(0,0,0,.05);

        }

        .form-control:focus{

            box-shadow:
            0 0 0 4px rgba(129,166,198,.20);

        }

        .btn-register{

            height:55px;

            border:none;

            border-radius:18px;

            background:
            linear-gradient(
                135deg,
                #81A6C6,
                #5D87AD
            );

            color:white;

            font-weight:700;

            width:100%;

            transition:.3s;

        }

        .btn-register:hover{

            transform:translateY(-2px);

        }

        .login-link{

            text-align:center;

            margin-top:20px;

        }

        .login-link a{

            color:#5D87AD;

            text-decoration:none;

            font-weight:600;

        }

        .login-link a:hover{

            text-decoration:underline;

        }

    </style>

</head>

<body>

<div class="register-card">

    <div class="logo-box">

        <i class="mdi mdi-account-plus"></i>

    </div>

    <h2>
        Buat Akun Baru
    </h2>

    <p class="subtitle">
        Registrasi pengguna Inventory Kantor
    </p>

    @if ($errors->any())

        <div class="alert alert-danger rounded-4">

            {{ $errors->first() }}

        </div>

    @endif

    <form method="POST"
          action="{{ route('register') }}">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama Lengkap
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   required>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Konfirmasi Password
            </label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-register">

            <i class="mdi mdi-account-check"></i>
            Register Sekarang

        </button>

    </form>

    <div class="login-link">

        Sudah punya akun?

        <a href="{{ route('login') }}">
            Login di sini
        </a>

    </div>

</div>

</body>
</html>