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

<style>
  /* Custom Loading Bar SweetAlert2 */
  .swal2-toast .swal2-timer-progress-bar {
      background: rgba(255, 255, 255, 0.9) !important;
      height: 5px !important;
      box-shadow: 0 -2px 5px rgba(255,255,255,0.5);
  }
  
</style>


<body>

  <div class="container-scroller d-flex">
    
    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <div class="container-fluid page-body-wrapper">
      
      <!-- Navbar -->
      @include('layouts.partials.navbar')

      <div class="main-panel">
          
          <!-- Konten -->
          @yield('content')

          
        </div>
        
        <!-- Footer -->
        @include('layouts.partials.footer')
        
      </div>
    </div>
  </div>
  
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <!-- Script Global untuk Tombol Hapus (SweetAlert) -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Cari semua tombol yang punya class 'btn-delete'
        const deleteButtons = document.querySelectorAll('.btn-delete');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const itemId = this.getAttribute('data-id');
                const itemName = this.getAttribute('data-name');
                
                // Munculkan Kotak Peringatan SweetAlert2
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    html: "Data <strong>" + itemName + "</strong> akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444', // Merah elegan untuk hapus
                    cancelButtonColor: '#6b7280',  // Abu-abu untuk batal
                    confirmButtonText: '<i class="mdi mdi-delete mr-1"></i> Ya, Hapus!',
                    cancelButtonText: '<i class="mdi mdi-close mr-1"></i> Batal',
                    reverseButtons: true, // Balik posisi tombol (Hapus di kanan, Batal di kiri)
                    customClass: {
                        confirmButton: 'btn btn-danger mx-1',
                        cancelButton: 'btn btn-secondary mx-1'
                    },
                    buttonsStyling: false // Matikan style bawaan swal biar pakai class bootstrap dari template lu
                }).then((result) => {
                    // Kalau user klik "Ya, Hapus!"
                    if (result.isConfirmed) {
                        // Submit form-nya
                        document.getElementById('delete-form-' + itemId).submit();
                    }
                });
            });
        });
    });
</script>
  
  @stack('scripts')
  
  <!-- Panggil Notifikasi Toast -->
  {{-- @include('layouts.partials.alert') --}}
  @include('sweetalert2::index')
</body>
</html>