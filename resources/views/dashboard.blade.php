@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">

        <h2 class="fw-bold">
            Dashboard Inventory Kantor
        </h2>

        <p class="text-muted">
            Monitoring inventaris kantor secara Langsung
        </p>

    </div>

    <!-- CARD STATISTIK -->
    <div class="row">

        <!-- TOTAL BARANG -->
        <div class="col-md-3 mb-4">

            <div class="card stat-card bg-blue border-0">

                <div class="card-body">

                    <h6>Total Barang</h6>

                    <h2 class="fw-bold">

                        {{ $totalBarang }}

                    </h2>

                    <i class="mdi mdi-package-variant"></i>

                </div>

            </div>

        </div>

        <!-- TOTAL STOK -->
        <div class="col-md-3 mb-4">

            <div class="card stat-card bg-green border-0">

                <div class="card-body">

                    <h6>Total Stok</h6>

                    <h2 class="fw-bold">

                        {{ $totalStok }}

                    </h2>

                    <i class="mdi mdi-cube-outline"></i>

                </div>

            </div>

        </div>

        <!-- BARANG RUSAK -->
        <div class="col-md-3 mb-4">

            <div class="card stat-card bg-red border-0">

                <div class="card-body">

                    <h6>Barang Rusak</h6>

                    <h2 class="fw-bold">

                        {{ $barangRusak }}

                    </h2>

                    <i class="mdi mdi-alert-circle"></i>

                </div>

            </div>

        </div>

        <!-- STOK MENIPIS -->
        <div class="col-md-3 mb-4">

            <div class="card stat-card bg-orange border-0">

                <div class="card-body">

                    <h6>Stok Menipis</h6>

                    <h2 class="fw-bold">

                        {{ $stokMenipis }}

                    </h2>

                    <i class="mdi mdi-alert"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- ROW KEDUA -->
    <div class="row">

        <!-- TOTAL PEMINJAMAN -->
        <div class="col-md-4 mb-4">

            <div class="card dashboard-card">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        Total Peminjaman

                    </h5>

                    <h1 class="fw-bold text-primary">

                        {{ $totalPeminjaman }}

                    </h1>

                    <p class="text-muted mb-0">

                        Total aktivitas peminjaman barang inventaris

                    </p>

                </div>

            </div>

        </div>

        <!-- BARANG TERBARU -->
        <div class="col-md-8 mb-4">

            <div class="card dashboard-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h5 class="fw-bold mb-0">

                            Barang Terbaru

                        </h5>

                        <a href="/barang"
                           class="btn btn-primary btn-sm">

                            Lihat Semua

                        </a>

                    </div>

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>

                                <tr>

                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Kondisi</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($barangTerbaru as $barang)

                                <tr>

                                    <td>

                                        <div class="fw-bold">

                                            {{ $barang->nama_barang }}

                                        </div>

                                    </td>

                                    <td>

                                        {{ $barang->kategori }}

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

                                @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center text-muted">

                                        Belum ada data barang

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection