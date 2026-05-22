@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="font-weight-bold">
                Tambah Barang
            </h3>

            <p class="text-muted mb-0">
                Tambahkan data inventaris baru
            </p>

        </div>

        <a href="/barang" class="btn btn-light">

            Kembali

        </a>

    </div>

    <div class="card dashboard-card">

        <div class="card-body">

            <form action="/barang/store" method="POST">

                @csrf

                <div class="row">

                    <!-- KODE -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Kode Barang</label>

                            <input type="text"
                                   name="kode_barang"
                                   class="form-control"
                                   placeholder="Masukkan kode barang">

                        </div>

                    </div>

                    <!-- NAMA -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Nama Barang</label>

                            <input type="text"
                                   name="nama_barang"
                                   class="form-control"
                                   placeholder="Masukkan nama barang">

                        </div>

                    </div>

                    <!-- KATEGORI -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Kategori</label>

                            <input type="text"
                                   name="kategori"
                                   class="form-control"
                                   placeholder="Contoh: Elektronik">

                        </div>

                    </div>

                    <!-- RUANGAN -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Ruangan</label>

                            <input type="text"
                                   name="ruangan"
                                   class="form-control"
                                   placeholder="Contoh: Ruang IT">

                        </div>

                    </div>

                    <!-- STOK -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Stok</label>

                            <input type="number"
                                   name="stok"
                                   class="form-control"
                                   placeholder="Jumlah stok">

                        </div>

                    </div>

                    <!-- KONDISI -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Kondisi</label>

                            <select name="kondisi" class="form-control">

                                <option value="">
                                    -- Pilih Kondisi --
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

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Deskripsi</label>

                            <textarea name="deskripsi"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Masukkan deskripsi barang"></textarea>

                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">

                    <i class="mdi mdi-content-save"></i>

                    Simpan Barang

                </button>

            </form>

        </div>

    </div>

</div>

@endsection