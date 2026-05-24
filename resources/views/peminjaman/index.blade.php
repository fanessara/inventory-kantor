@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h3 class="fw-bold">
                        Data Peminjaman
                    </h3>

                    <p class="text-muted mb-0">
                        Daftar peminjaman barang inventaris kantor
                    </p>

                </div>

                <a href="/peminjaman/create"
                   class="btn btn-primary">

                    + Tambah Peminjaman

                </a>

            </div>

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Barang</th>
                            <th>Peminjam</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($peminjaman as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="fw-bold">

                                    {{ $item->barang->nama_barang }}

                                </div>

                                <small class="text-muted">

                                    {{ $item->barang->kode_barang }}

                                </small>

                            </td>

                            <td>

                                {{ $item->nama_peminjam }}

                            </td>

                            <td>

                                {{ $item->jumlah }}

                            </td>

                            <td>

                                {{ $item->tanggal_pinjam }}

                            </td>

                            <td>

                                @if($item->status == 'Dipinjam')

                                    <span class="badge bg-warning text-dark">

                                        Dipinjam

                                    </span>

                                @else

                                    <span class="badge bg-success">

                                        Dikembalikan

                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($item->status == 'Dipinjam')

                                    <form action="/peminjaman/{{ $item->id }}"
                                          method="POST">

                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="btn btn-success btn-sm">

                                            Kembalikan

                                        </button>

                                    </form>

                                @else

                                    <span class="text-success fw-bold">

                                        Selesai

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="text-center text-muted">

                                Belum ada data peminjaman

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