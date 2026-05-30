@extends('layouts.app')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <h3 class="fw-bold mb-4">

            Riwayat Peminjaman

        </h3>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($riwayats as $riwayat)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $riwayat->nama_barang }}
                        </td>

                        <td>
                            {{ $riwayat->nama_peminjam }}
                        </td>

                        <td>
                            {{ $riwayat->tanggal_pinjam }}
                        </td>

                        <td>
                            {{ $riwayat->tanggal_kembali }}
                        </td>

                        <td>

                            @if($riwayat->status == 'Dipinjam')

                                <span class="badge bg-warning">
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

                        <td colspan="6"
                            class="text-center text-muted py-4">

                            Belum ada riwayat peminjaman

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection