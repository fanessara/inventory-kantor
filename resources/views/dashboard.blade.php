@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <!-- HEADER -->
    <div class="mb-4">

        <h2 class="font-weight-bold">
            Dashboard Inventory Kantor
        </h2>

        <p class="text-muted">
            Monitoring inventaris kantor secara realtime
        </p>

    </div>

    <!-- STATISTIK -->
    <div class="row">

        <!-- TOTAL BARANG -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Total Barang
                            </p>

                            <h2 class="font-weight-bold">

                                {{ $totalBarang }}

                            </h2>

                        </div>

                        <div class="icon-box bg-primary text-white">

                            <i class="mdi mdi-cube-outline"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- TOTAL STOK -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Total Stok
                            </p>

                            <h2 class="font-weight-bold">

                                {{ $totalStok }}

                            </h2>

                        </div>

                        <div class="icon-box bg-success text-white">

                            <i class="mdi mdi-package-variant"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- BARANG RUSAK -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Barang Rusak
                            </p>

                            <h2 class="font-weight-bold">

                                {{ $barangRusak }}

                            </h2>

                        </div>

                        <div class="icon-box bg-danger text-white">

                            <i class="mdi mdi-alert-circle"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- STOK MENIPIS -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Stok Menipis
                            </p>

                            <h2 class="font-weight-bold">

                                {{ $stokMenipis }}

                            </h2>

                        </div>

                        <div class="icon-box bg-warning text-white">

                            <i class="mdi mdi-alert"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ROW KEDUA -->
    <div class="row">

        <!-- TOTAL PEMINJAMAN -->
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body">

                    <h5 class="mb-3">
                        Total Peminjaman
                    </h5>

                    <h1 class="font-weight-bold text-primary">

                        {{ $totalPeminjaman }}

                    </h1>

                    <p class="text-muted">
                        Total aktivitas peminjaman barang
                    </p>

                </div>

            </div>

        </div>

        <!-- BARANG TERBARU -->
        <div class="col-md-8 mb-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h5 class="mb-0">
                            Barang Terbaru
                        </h5>

                        <a href="/barang"
                           class="btn btn-sm btn-primary">

                            Lihat Semua

                        </a>

                    </div>

                    <div class="table-responsive">

                        <table class="table table-hover">

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

                                        {{ $barang->nama_barang }}

                                    </td>

                                    <td>

                                        {{ $barang->kategori }}

                                    </td>

                                    <td>

                                        {{ $barang->stok }}

                                    </td>

                                    <td>

                                        @if($barang->kondisi == 'Baik')

                                            <span class="badge badge-success">

                                                Baik

                                            </span>

                                        @elseif($barang->kondisi == 'Rusak')

                                            <span class="badge badge-danger">

                                                Rusak

                                            </span>

                                        @else

                                            <span class="badge badge-warning">

                                                Perbaikan

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center">

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