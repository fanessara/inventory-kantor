@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="mb-4">

                <h3 class="fw-bold">
                    Form Peminjaman Barang
                </h3>

                <p class="text-muted">
                    Input data peminjaman inventaris kantor
                </p>

            </div>

            <form action="/peminjaman"
                  method="POST">

                @csrf

                <div class="row">

                    <!-- BARANG -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Pilih Barang
                        </label>

                        <select name="barang_id"
                                class="form-control"
                                required>

                            <option value="">
                                -- Pilih Barang --
                            </option>

                            @foreach($barang as $item)

                                <option value="{{ $item->id }}">

                                    {{ $item->nama_barang }}
                                    (stok: {{ $item->stok }})

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- NAMA PEMINJAM -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Peminjam
                        </label>

                        <input type="text"
                               name="nama_peminjam"
                               class="form-control"
                               required>

                    </div>

                    <!-- JUMLAH -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jumlah Pinjam
                        </label>

                        <input type="number"
                               name="jumlah"
                               class="form-control"
                               required>

                    </div>

                    <!-- TANGGAL -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal Pinjam
                        </label>

                        <input type="date"
                               name="tanggal_pinjam"
                               class="form-control"
                               required>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Simpan Peminjaman

                </button>

            </form>

        </div>

    </div>

</div>

@endsection