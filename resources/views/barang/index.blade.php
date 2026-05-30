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
@if(auth()->user()->role == 'admin')
        <a href="/barang/create"
           class="btn btn-primary">

            <i class="mdi mdi-plus"></i>

            Tambah Barang

        </a>

@endif        

@if(auth()->user()->role == 'admin')

        <a href="/barang-pdf"
   class="btn btn-danger ml-2">

    <i class="mdi mdi-file-pdf"></i>

    Export PDF

</a>

@endif

    </div>

    <!-- CARD -->

    <div class="card mb-4 border-0 shadow-sm">

    <div class="card-body">

        <form action="/barang"
              method="GET">

            <div class="row">

                <!-- SEARCH -->
                <div class="col-md-4 mb-3">

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari nama barang..."
                           value="{{ request('search') }}">

                </div>

                <!-- FILTER KATEGORI -->
                <div class="col-md-3 mb-3">

                    <select name="kategori"
                            class="form-control">

                        <option value="">
                            Semua Kategori
                        </option>

                        <option value="Elektronik">
                            Elektronik
                        </option>

                        <option value="Furniture">
                            Furniture
                        </option>

                        <option value="ATK">
                            ATK
                        </option>

                    </select>

                </div>

                <!-- FILTER KONDISI -->
                <div class="col-md-3 mb-3">

                    <select name="kondisi"
                            class="form-control">

                        <option value="">
                            Semua Kondisi
                        </option>

                        <option value="Baik">
                            Baik
                        </option>

                        <option value="Rusak">
                            Rusak
                        </option>

                        <option value="Perbaikan">
                            Perbaikan
                        </option>

                    </select>

                </div>

                <!-- BUTTON -->
                <div class="col-md-2 mb-3">

                    <button type="submit"
                            class="btn btn-primary btn-block">

                        Filter

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>
    <div class="card dashboard-card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Ruangan</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th width="280">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($barangs as $barang)

                        <tr>

                           <td>

    {{ $loop->iteration }}

</td>

<td>

    @if($barang->gambar)

        <img src="{{ asset('gambar_barang/' . $barang->gambar) }}"
             width="70"
             height="70"
             style="object-fit: cover; border-radius: 10px;">

    @else

        <span class="text-muted">
            Tidak ada gambar
        </span>

    @endif

</td>

<td>

    {{ $barang->kode_barang }}

</td>

                            <td>

                                <strong>

                                    {{ $barang->nama_barang }}

                                </strong>

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

                            <td>

                                <div class="d-flex gap-2">

                                    <!-- DETAIL -->
                                    <a href="/barang/{{ $barang->id }}"
                                       class="btn btn-info btn-sm me-2">

                                        <i class="mdi mdi-eye"></i>

                                        Detail

                                    </a>

                                    <!-- EDIT -->
                                   @if(Auth::user()->role == 'admin')

<a href="/barang/{{ $barang->id }}/edit"
   class="btn btn-warning btn-sm me-2">

    <i class="mdi mdi-pencil"></i>

    Edit

</a>

@endif

                                    <!-- DELETE -->
                                   @if(Auth::user()->role == 'admin')

<form action="/barang/{{ $barang->id }}"
      method="POST">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Hapus barang ini?')">

        <i class="mdi mdi-delete"></i>

        Hapus

    </button>

</form>

@endif

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-4 text-muted">

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