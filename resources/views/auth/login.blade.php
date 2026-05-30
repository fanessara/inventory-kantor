<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - Inventory Kantor</title>

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

        /* =========================
           BODY
        ========================= */

        body{

            height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            overflow:hidden;

            position:relative;

            background:
            linear-gradient(
                135deg,
                #dbeafe 0%,
                #c7dff2 25%,
                #81A6C6 55%,
                #9bb8d3 75%,
                #d6e6f5 100%
            );

            background-size:400% 400%;

            animation:
            gradientFlow 16s ease infinite;

        }

        /* =========================
           ANIMATION
        ========================= */

        @keyframes gradientFlow{

            0%{
                background-position:0% 50%;
            }

            50%{
                background-position:100% 50%;
            }

            100%{
                background-position:0% 50%;
            }

        }

        @keyframes floatingLight{

            0%{
                transform:translate(0,0);
            }

            50%{
                transform:translate(-40px,30px);
            }

            100%{
                transform:translate(0,0);
            }

        }

        @keyframes floatingLight2{

            0%{
                transform:translate(0,0);
            }

            50%{
                transform:translate(40px,-20px);
            }

            100%{
                transform:translate(0,0);
            }

        }

        @keyframes cardReveal{

            from{

                opacity:0;

                transform:
                translateY(40px)
                scale(.96);

            }

            to{

                opacity:1;

                transform:
                translateY(0)
                scale(1);

            }

        }

        @keyframes softGlow{

            0%{

                box-shadow:
                0 20px 50px rgba(129,166,198,0.15);

            }

            50%{

                box-shadow:
                0 30px 70px rgba(129,166,198,0.30);

            }

            100%{

                box-shadow:
                0 20px 50px rgba(129,166,198,0.15);

            }

        }

        /* =========================
           BACKGROUND LIGHT
        ========================= */

        body::before{

            content:'';

            position:absolute;

            width:700px;
            height:700px;

            background:
            radial-gradient(
                circle,
                rgba(255,255,255,0.35),
                transparent 70%
            );

            top:-250px;
            right:-150px;

            filter:blur(70px);

            animation:
            floatingLight 12s ease-in-out infinite;

        }

        body::after{

            content:'';

            position:absolute;

            width:600px;
            height:600px;

            background:
            radial-gradient(
                circle,
                rgba(129,166,198,0.40),
                transparent 70%
            );

            bottom:-200px;
            left:-150px;

            filter:blur(70px);

            animation:
            floatingLight2 14s ease-in-out infinite;

        }

        /* =========================
           LOGIN CARD
        ========================= */

        .login-card{

            width:100%;
            max-width:440px;

            background:
            rgba(255,255,255,0.55);

            backdrop-filter:blur(24px);

            border:
            1px solid rgba(255,255,255,0.35);

            border-radius:32px;

            padding:45px;

            position:relative;

            overflow:hidden;

            z-index:10;

            animation:
            cardReveal 1s ease,
            softGlow 6s ease-in-out infinite;

            transition:.4s ease;

        }

        .login-card:hover{

            transform:
            translateY(-4px);

        }

        /* REFLECTION */
        .login-card::before{

            content:'';

            position:absolute;

            top:-50%;
            left:-60%;

            width:220px;
            height:700px;

            background:
            linear-gradient(
                to right,
                transparent,
                rgba(255,255,255,0.20),
                transparent
            );

            transform:rotate(25deg);

            animation:
            reflectionMove 8s linear infinite;

        }

        @keyframes reflectionMove{

            0%{
                left:-70%;
            }

            100%{
                left:150%;
            }

        }

        /* =========================
           LOGO
        ========================= */

        .logo-box{

            width:95px;
            height:95px;

            margin:auto;

            border-radius:28px;

            display:flex;
            justify-content:center;
            align-items:center;

            background:
            linear-gradient(
                135deg,
                #5b8db8,
                #81A6C6
            );

            color:white;

            font-size:42px;

            margin-bottom:28px;

            box-shadow:
            0 15px 35px rgba(129,166,198,0.35);

            position:relative;

            overflow:hidden;

            transition:.4s ease;

        }

        .logo-box:hover{

            transform:
            rotate(-4deg)
            scale(1.05);

        }

        .logo-box::before{

            content:'';

            position:absolute;

            inset:0;

            background:
            linear-gradient(
                135deg,
                rgba(255,255,255,0.25),
                transparent
            );

        }

        /* =========================
           TEXT
        ========================= */

        h2{

            text-align:center;

            font-weight:800;

            color:#1e293b;

            margin-bottom:8px;

        }

        .subtitle{

            text-align:center;

            color:#64748b;

            margin-bottom:35px;

        }

        /* =========================
           FORM
        ========================= */

        .form-label{

            font-weight:600;

            margin-bottom:10px;

            color:#334155;

        }

        .form-control{

            height:58px;

            border:none;

            border-radius:18px;

            padding-left:18px;

            background:
            rgba(255,255,255,0.75);

            backdrop-filter:blur(10px);

            transition:.3s ease;

            box-shadow:
            0 4px 12px rgba(15,23,42,0.05);

        }

        .form-control:focus{

            transform:translateY(-2px);

            box-shadow:
            0 0 0 4px rgba(129,166,198,0.15),
            0 10px 25px rgba(129,166,198,0.12);

        }

        /* =========================
           BUTTON
        ========================= */

        .btn-login{

            height:58px;

            border:none;

            border-radius:18px;

            background:
            linear-gradient(
                135deg,
                #5b8db8,
                #81A6C6
            );

            color:white;

            font-weight:700;

            position:relative;

            overflow:hidden;

            transition:.35s ease;

            box-shadow:
            0 15px 30px rgba(129,166,198,0.30);

        }

        .btn-login:hover{

            transform:
            translateY(-3px);

            box-shadow:
            0 20px 40px rgba(129,166,198,0.40);

        }

        .btn-login::before{

            content:'';

            position:absolute;

            top:0;
            left:-120%;

            width:80%;
            height:100%;

            transform:skewX(-20deg);

            background:
            linear-gradient(
                to right,
                transparent,
                rgba(255,255,255,0.35),
                transparent
            );

        }

        .btn-login:hover::before{

            left:140%;

            transition:.8s;

        }

        /* =========================
           FOOTER
        ========================= */

        .footer-text{

            text-align:center;

            margin-top:25px;

            color:#64748b;

            font-size:14px;

        }

        .footer-text span{

            font-weight:700;

            color:#5b8db8;

        }

    </style>

</head>

<body>

    <!-- LOGIN CARD -->
    <div class="login-card">

        <!-- LOGO -->
        <div class="logo-box">

            <i class="mdi mdi-package-variant-closed"></i>

        </div>

        <!-- TITLE -->
        <h2>
            Inventory Kantor
        </h2>

        <p class="subtitle">
            Silakan login untuk melanjutkan
        </p>

        <!-- ERROR -->
        @if ($errors->any())

            <div class="alert alert-danger rounded-4">

                {{ $errors->first() }}

            </div>

        @endif

        <!-- FORM -->
        <form method="POST"
              action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->
            <div class="mb-3">

                <label class="form-label">

                    Email

                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Masukkan email"
                       required>

            </div>

            <!-- PASSWORD -->
            <div class="mb-4">

                <label class="form-label">

                    Password

                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password"
                       required>

            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="btn btn-login w-100">

                <i class="mdi mdi-login"></i>

                Login Sekarang

            </button>

        </form>

        <!-- FOOTER -->
        <div class="footer-text">

            © 2026 <span>Inventory Kantor</span>

        </div>

    </div>

</body>

</html>