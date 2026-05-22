@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="font-weight-bold">
                Data Barang
            </h3>

            <p class="text-muted mb-0">
                Management data inventaris kantor
            </p>
        </div>

        <a href="/barang/create" class="btn btn-primary">

            <i class="mdi mdi-plus"></i>

            Tambah Barang

        </a>

    </div>

    <!-- CARD -->
    <div class="card dashboard-card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Ruangan</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($barangs as $barang)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $barang->kode_barang }}
                            </td>

                            <td>
                                {{ $barang->nama_barang }}
                            </td>

                            <td>
                                {{ $barang->kategori }}
                            </td>

                            <td>
                                {{ $barang->ruangan }}
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

                            <td>

    <div class="d-flex">

        <a href="/barang/{{ $barang->id }}/edit"
           class="btn btn-warning btn-sm mr-2">

            Edit

        </a>

        <form action="/barang/{{ $barang->id }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus barang ini?')">

                Hapus

            </button>

        </form>

    </div>

</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center">

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

@endsection