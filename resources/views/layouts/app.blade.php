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

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{

        background:
        linear-gradient(
            135deg,
            #dbeafe 0%,
            #eef2ff 40%,
            #f5f3ff 100%
        );

        min-height:100vh;

        font-family:'Segoe UI',sans-serif;

        overflow-x:hidden;

    }

    /* SIDEBAR */
    .sidebar{

        width:260px;
        height:100vh;

        position:fixed;

        background:
        linear-gradient(
            180deg,
            #1e3a5f 0%,
            #284b73 45%,
            #355c7d 100%
        );

        color:white;

        padding-top:20px;

        overflow-y:auto;

        border-right:
        1px solid rgba(255,255,255,0.08);

        box-shadow:
        10px 0 30px rgba(30,58,95,0.18);

        z-index:100;

    }

    /* SIDEBAR GLOW */
    .sidebar::before{

        content:'';

        position:absolute;

        width:300px;
        height:300px;

        background:
        rgba(255,255,255,0.06);

        border-radius:50%;

        top:-120px;
        right:-120px;

    }

    /* LOGO */
    .sidebar h3{

        font-weight:800;

        font-size:28px;

        line-height:1.2;

        padding-left:28px;

        margin-bottom:45px;

        color:white;

    }

    /* MENU */
    .sidebar a{

        display:flex;

        align-items:center;

        gap:15px;

        color:#dbeafe;

        text-decoration:none;

        padding:18px 24px;

        margin:10px 18px;

        border-radius:22px;

        transition:.35s ease;

        font-weight:600;

        font-size:17px;

    }

    /* ICON */
    .sidebar a i{

        font-size:28px;

    }

    /* HOVER */
    .sidebar a:hover{

        background:
        rgba(255,255,255,0.08);

        color:white;

        transform:translateX(5px);

    }

    /* ACTIVE */
    .sidebar .active{

        background:
        linear-gradient(
            135deg,
            #4f8cff,
            #7c6cff
        );

        color:white;

        box-shadow:
        0 10px 25px rgba(79,140,255,0.35);

    }

    /* MAIN CONTENT */
    .main-content{

        margin-left:260px;

        padding:35px;

    }

    /* TOPBAR */
   .topbar{

    display:flex;

    justify-content:space-between;

    align-items:center;

    background:rgba(255,255,255,0.55);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,0.4);

    border-radius:35px;

    padding:28px 40px;

    margin-bottom:30px;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.08);

}

.topbar-left h4{

    font-size:26px;

    font-weight:800;

    color:#0f172a;

    margin-bottom:4px;

}

.topbar-left small{

    color:#64748b;

    font-size:17px;

}

.topbar-right{

    display:flex;

    align-items:center;

    gap:20px;

}

.user-info{

    text-align:right;

}

.user-name{

    font-size:18px;

    font-weight:700;

    color:#0f172a;

    line-height:1.2;

}

.user-role{

    font-size:15px;

    color:#64748b;

    text-transform:capitalize;

}

    /* HERO */
    .hero-section{

        background:
        linear-gradient(
            135deg,
            #3b82f6,
            #7c3aed
        );

        border-radius:40px;

        padding:55px;

        color:white;

        position:relative;

        overflow:hidden;

        margin-bottom:35px;

        box-shadow:
        0 25px 60px rgba(99,102,241,0.25);

    }

    /* HERO CIRCLE */
    .hero-section::before{

        content:'';

        position:absolute;

        width:350px;
        height:350px;

        background:
        rgba(255,255,255,0.08);

        border-radius:50%;

        top:-120px;
        right:-80px;

    }

    .hero-section::after{

        content:'';

        position:absolute;

        width:250px;
        height:250px;

        background:
        rgba(255,255,255,0.06);

        border-radius:50%;

        bottom:-120px;
        left:-80px;

    }

    .hero-section h2{

    font-size:40px;

    font-weight:800;

    line-height:1.15;

    margin-bottom:20px;

    position:relative;

    z-index:2;

}

.hero-section p{

    font-size:17px;

    line-height:1.8;

    max-width:850px;

    position:relative;

    z-index:2;

    color:
    rgba(255,255,255,0.92);

}

    /* CARD */
    .dashboard-card{

        background:
        rgba(255,255,255,0.55);

        backdrop-filter:blur(16px);

        border:
        1px solid rgba(255,255,255,0.4);

        border-radius:30px;

        box-shadow:
        0 10px 35px rgba(15,23,42,0.08);

    }

    /* STAT CARD */
    .stat-card{

        border-radius:30px;

        padding:30px;

        color:white;

        position:relative;

        overflow:hidden;

        box-shadow:
        0 18px 40px rgba(15,23,42,0.12);

    }

    .stat-card h5{

        font-size:22px;

        font-weight:700;

    }

    .stat-card h2{

        font-size:52px;

        font-weight:800;

        margin-top:15px;

    }

    .stat-card i{

        position:absolute;

        right:25px;
        bottom:20px;

        font-size:55px;

        opacity:0.2;

    }

    /* COLORS */
    .bg-blue{

        background:
        linear-gradient(
            135deg,
            #3b82f6,
            #6366f1
        );

    }

    .bg-green{

        background:
        linear-gradient(
            135deg,
            #10b981,
            #34d399
        );

    }

    .bg-red{

        background:
        linear-gradient(
            135deg,
            #ef4444,
            #f87171
        );

    }

    .bg-orange{

        background:
        linear-gradient(
            135deg,
            #f97316,
            #fb923c
        );

    }

    /* TABLE */
    .table-container{

        background:
        rgba(255,255,255,0.55);

        backdrop-filter:blur(16px);

        border-radius:30px;

        padding:30px;

        box-shadow:
        0 10px 35px rgba(15,23,42,0.08);

    }

    .table{

        margin:0;

    }

    .table thead{

        background:
        linear-gradient(
            135deg,
            #6366f1,
            #8b5cf6
        );

        color:white;

    }

    .table thead th{

        border:none;

        padding:18px;

        font-size:15px;

    }

    .table tbody tr{

        transition:.3s;

    }

    .table tbody tr:hover{

        background:
        rgba(99,102,241,0.06);

    }

    .table tbody td{

        padding:18px;

        vertical-align:middle;

    }

    /* BUTTON */
    .btn{

        border:none;

        border-radius:18px;

        font-weight:600;

        padding:12px 22px;

    }

    .btn-primary{

        background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

        box-shadow:
        0 10px 25px rgba(99,102,241,0.22);

    }

    .btn-danger{

        background:
        linear-gradient(
            135deg,
            #ef4444,
            #f43f5e
        );

    }

    /* SCROLLBAR */
    ::-webkit-scrollbar{

        width:10px;

    }

    ::-webkit-scrollbar-thumb{

        background:
        linear-gradient(
            180deg,
            #6366f1,
            #8b5cf6
        );

        border-radius:20px;

    }

</style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h3>
            PT. SEJAHTERA ABADI
        </h3>

        <!-- DASHBOARD -->
        <a href="/dashboard"
           class="{{ request()->is('dashboard') ? 'active' : '' }}">

            <i class="mdi mdi-view-dashboard"></i>
            Dashboard

        </a>

        <!-- DATA BARANG -->
        <a href="/barang"
           class="{{ request()->is('barang*') ? 'active' : '' }}">

            <i class="mdi mdi-package-variant"></i>
            Data Barang

        </a>

        <!-- PEMINJAMAN -->
        <a href="/peminjaman"
           class="{{ request()->is('peminjaman*') ? 'active' : '' }}">

            <i class="mdi mdi-swap-horizontal"></i>
            Peminjaman

        </a>

        <!-- RIWAYAT -->
        <a href="/riwayat"
           class="{{ request()->is('riwayat*') ? 'active' : '' }}">

            <i class="mdi mdi-history"></i>
            Riwayat

        </a>

        <!-- USER -->
        @if(Auth::user()->role == 'admin')

        <a href="/user"
           class="{{ request()->is('user*') ? 'active' : '' }}">

            <i class="mdi mdi-account"></i>
            Pengguna

        </a>

        @endif

        <!-- PROFILE -->
        <a href="{{ route('edit.profile') }}"
           class="{{ request()->is('edit-profile') ? 'active' : '' }}">

            <i class="mdi mdi-account-edit"></i>
            Edit Profile

        </a>

    </div>

    <!-- MAIN -->
    <div class="main-content">

        <!-- TOPBAR -->
<div class="topbar">

    <div class="topbar-left">

        <h4>
            Sistem Inventory Kantor
        </h4>

        <small>
            Management inventaris PT.SEJAHTERA ABADI
        </small>

    </div>

    <div class="topbar-right">

        <div class="user-info">

            <div class="user-name">
                {{ Auth::user()->name }}
            </div>

            <div class="user-role">
                {{ Auth::user()->role }}
            </div>

        </div>

        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button class="btn btn-danger">

                <i class="mdi mdi-logout"></i>
                Logout

            </button>

        </form>

    </div>

</div>
        <!-- HERO -->
        <div class="hero-section">

            <h2>
                Selamat Datang, {{ Auth::user()->name }}
            </h2>

            <p>

                Sistem inventory kantor untuk mengelola data barang,
                peminjaman, stok, pengguna, serta monitoring inventaris
                secara Langsung dan transparan.

            </p>

        </div>

        <!-- CONTENT -->
        @yield('content')

    </div>

</body>

</html>