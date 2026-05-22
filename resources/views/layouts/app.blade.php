<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Inventory Kantor
    </title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

</head>

<body style="background: #f4f7fe;">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

        <div class="container-fluid">

            <a class="navbar-brand fw-bold"
               href="/dashboard">

                Inventory Kantor

            </a>

            <div class="d-flex align-items-center text-white">

                <span class="me-3">

                    {{ Auth::user()->name }}

                </span>

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button class="btn btn-danger btn-sm">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
    <div class="container-fluid py-4">

        @yield('content')

    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>