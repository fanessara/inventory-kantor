@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">

        <!-- FOTO -->
        <div class="col-md-4">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center">

                    @if($barang->gambar)

                        <img src="{{ asset('gambar_barang/' . $barang->gambar) }}"
                             class="img-fluid rounded-4 shadow-sm"
                             style="height: 300px;
                                    object-fit: cover;">

                    @else

                        <img src="https://via.placeholder.com/300"
                             class="img-fluid rounded-4">

                    @endif

                </div>

            </div>

        </div>

        <!-- DETAIL -->
        <div class="col-md-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h2 class="fw-bold">

                                {{ $barang->nama_barang }}

                            </h2>

                            <p class="text-muted">

                                {{ $barang->kode_barang }}

                            </p>

                        </div>

                        <a href="/barang"
                           class="btn btn-light">

                            Kembali

                        </a>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <label class="text-muted">
                                Kategori
                            </label>

                            <h5>

                                {{ $barang->kategori }}

                            </h5>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="text-muted">
                                Ruangan
                            </label>

                            <h5>

                                {{ $barang->ruangan }}

                            </h5>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="text-muted">
                                Stok
                            </label>

                            <h5>

                                {{ $barang->stok }}

                            </h5>

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="text-muted">
                                Kondisi
                            </label>

                            <h5>

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

                            </h5>

                        </div>

                        <div class="col-md-12">

                            <label class="text-muted">
                                Deskripsi
                            </label>

                            <p>

                                {{ $barang->deskripsi }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- RIWAYAT PEMINJAMAN -->
    <div class="card shadow border-0 rounded-4 mt-4">

        <div class="card-body">

            <h4 class="fw-bold mb-4">

                Riwayat Peminjaman

            </h4>

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($barang->peminjaman as $pinjam)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $pinjam->nama_peminjam }}

                            </td>

                            <td>

                                {{ $pinjam->jumlah }}

                            </td>

                            <td>

                                {{ $pinjam->tanggal_pinjam }}

                            </td>

                            <td>

                                @if($pinjam->status == 'Dipinjam')

                                    <span class="badge bg-warning text-dark">

                                        Dipinjam

                                    </span>

                                @else

                                    <span class="badge bg-success">

                                        Dikembalikan

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center text-muted">

                                Belum ada riwayat peminjaman

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection