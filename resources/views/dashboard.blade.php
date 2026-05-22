@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Dashboard Inventory
            </h2>

            <p class="text-muted mb-0">
                Selamat datang,
                {{ Auth::user()->name }}
            </p>

        </div>

        <div>

            <a href="/barang/create"
               class="btn btn-primary">

                + Tambah Barang

            </a>

        </div>

    </div>

    <!-- CARD -->
    <div class="row">

        <!-- TOTAL -->
        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted">
                                Total Barang
                            </p>

                            <h2 class="fw-bold">
                                {{ $totalBarang }}
                            </h2>

                        </div>

                        <div class="text-primary">

                            <i class="mdi mdi-cube-outline"
                               style="font-size: 45px;"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- STOK MENIPIS -->
        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted">
                                Stok Menipis
                            </p>

                            <h2 class="fw-bold text-warning">
                                {{ $stokMenipis }}
                            </h2>

                        </div>

                        <div class="text-warning">

                            <i class="mdi mdi-alert-circle-outline"
                               style="font-size: 45px;"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- BARANG RUSAK -->
        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted">
                                Barang Rusak
                            </p>

                            <h2 class="fw-bold text-danger">
                                {{ $barangRusak }}
                            </h2>

                        </div>

                        <div class="text-danger">

                            <i class="mdi mdi-close-circle-outline"
                               style="font-size: 45px;"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between mb-4">

                <div>

                    <h4 class="fw-bold">
                        Barang Terbaru
                    </h4>

                    <p class="text-muted mb-0">
                        Inventaris terbaru kantor
                    </p>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Kondisi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($barangTerbaru as $barang)

                        <tr>

                            <td>

                                @if($barang->gambar)

                                    <img src="{{ asset('gambar_barang/' . $barang->gambar) }}"
                                         width="60"
                                         height="60"
                                         style="border-radius: 12px;
                                                object-fit: cover;">

                                @endif

                            </td>

                            <td>
                                {{ $barang->kode_barang }}
                            </td>

                            <td>
                                {{ $barang->nama_barang }}
                            </td>

                            <td>
                                {{ $barang->stok }}
                            </td>

                            <td>

                                @if($barang->kondisi == 'Baik')

                                    <span class="badge bg-success">
                                        Baik
                                    </span>

                                @elseif($barang->kondisi == 'Rusak')

                                    <span class="badge bg-danger">
                                        Rusak
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        Perbaikan
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="row mb-4">

    <div class="col-md-6">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body">

                <h4 class="fw-bold mb-4">

                    Grafik Kondisi Barang

                </h4>

                <canvas id="kondisiChart"></canvas>

            </div>

        </div>

    </div>

</div>

        </div>

    </div>

</div>

<script>

const ctx = document.getElementById('kondisiChart');

new Chart(ctx, {

    type: 'doughnut',

    data: {

        labels: [

            'Baik',
            'Rusak',
            'Perbaikan'

        ],

        datasets: [{

            data: [

                {{ $barangBaik }},
                {{ $barangRusakChart }},
                {{ $barangPerbaikan }}

            ],

            backgroundColor: [

                '#198754',
                '#dc3545',
                '#ffc107'

            ],

            borderWidth: 0

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                position: 'bottom'

            }

        }

    }

});

</script>

@endsection