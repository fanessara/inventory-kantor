<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Inventory Kantor</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <!-- CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        body{
            background: #f4f7fe;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar{
            width: 260px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg,#111827,#1e293b);
            color: white;
            padding-top: 20px;
        }

        .sidebar h3{
            font-weight: bold;
            padding-left: 25px;
            margin-bottom: 40px;
        }

        .sidebar a{
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 14px 25px;
            margin: 8px 15px;
            border-radius: 12px;
            transition: 0.3s;
            font-weight: 500;
        }

        .sidebar a:hover{
            background: #2563eb;
            color: white;
        }

        .sidebar .active{
            background: #2563eb;
            color: white;
        }

        .main-content{
            margin-left: 260px;
            padding: 25px;
        }

        .topbar{
            background: white;
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .dashboard-card{
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .stat-card{
            border-radius: 20px;
            color: white;
            padding: 25px;
            position: relative;
            overflow: hidden;
        }

        .stat-card i{
            position: absolute;
            right: 20px;
            bottom: 20px;
            font-size: 45px;
            opacity: 0.3;
        }

        .bg-blue{
            background: linear-gradient(135deg,#2563eb,#3b82f6);
        }

        .bg-green{
            background: linear-gradient(135deg,#059669,#10b981);
        }

        .bg-red{
            background: linear-gradient(135deg,#dc2626,#ef4444);
        }

        .bg-orange{
            background: linear-gradient(135deg,#ea580c,#fb923c);
        }

        .hero-section{
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            border-radius: 25px;
            padding: 40px;
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .hero-section::before{
            content:'';
            position:absolute;
            width:300px;
            height:300px;
            background: rgba(255,255,255,0.1);
            border-radius:50%;
            top:-100px;
            right:-100px;
        }

        .hero-section::after{
            content:'';
            position:absolute;
            width:200px;
            height:200px;
            background: rgba(255,255,255,0.08);
            border-radius:50%;
            bottom:-80px;
            left:-80px;
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h3>
            Inventory Kantor
        </h3>

        <a href="/dashboard" class="active">
            <i class="mdi mdi-view-dashboard"></i>
            Dashboard
        </a>

        <a href="/barang">
            <i class="mdi mdi-package-variant"></i>
            Data Barang
        </a>

        <a href="/peminjaman">
            <i class="mdi mdi-swap-horizontal"></i>
            Peminjaman
        </a>

        <a href="#">
            <i class="mdi mdi-history"></i>
            Riwayat
        </a>

        <a href="#">
            <i class="mdi mdi-account"></i>
            Pengguna
        </a>

    </div>

    <!-- MAIN -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar d-flex justify-content-between align-items-center">

            <div>

                <h4 class="mb-0 fw-bold">
                    Sistem Inventory Kantor
                </h4>

                <small class="text-muted">
                    Management inventaris modern
                </small>

            </div>

            <div class="d-flex align-items-center">

                <div class="me-3 text-end">

                    <div class="fw-bold">
                        {{ Auth::user()->name }}
                    </div>

                    <small class="text-muted">
                        Administrator
                    </small>

                </div>

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button class="btn btn-danger">

                        Logout

                    </button>

                </form>

            </div>

        </div>

        <!-- HERO -->
        <div class="hero-section">

            <h2 class="fw-bold mb-3">
                Selamat Datang, {{ Auth::user()->name }}
            </h2>

            <p class="mb-0" style="max-width:700px;">

                Sistem inventory kantor modern untuk mengelola data barang,
                peminjaman, stok, serta monitoring inventaris secara realtime
                dan profesional.

            </p>

        </div>

        <!-- CONTENT -->
        @yield('content')

    </div>

</body>

</html>