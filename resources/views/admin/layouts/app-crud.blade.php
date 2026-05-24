<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inventory Kantor</title>
  
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller d-flex">

    @include('admin.layouts.partials.sidebar')

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel w-100">

        <div class="content-wrapper pt-5">

          @yield('content')
          
        </div>


      </div>
    </div>
  </div>

  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  
  @stack('scripts')
  
</body>
</html>