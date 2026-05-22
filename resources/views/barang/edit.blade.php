@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div class="card dashboard-card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h3 class="font-weight-bold mb-1">
                        Edit Barang
                    </h3>

                    <p class="text-muted mb-0">
                        Update data inventaris kantor
                    </p>

                </div>

            </div>

            <form action="/barang/{{ $barang->id }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- KODE BARANG -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Kode Barang</label>

                            <input type="text"
                                   name="kode_barang"
                                   class="form-control"
                                   value="{{ $barang->kode_barang }}"
                                   required>

                        </div>

                    </div>

                    <!-- NAMA BARANG -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Nama Barang</label>

                            <input type="text"
                                   name="nama_barang"
                                   class="form-control"
                                   value="{{ $barang->nama_barang }}"
                                   required>

                        </div>

                    </div>

                    <!-- KATEGORI -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Kategori</label>

                            <input type="text"
                                   name="kategori"
                                   class="form-control"
                                   value="{{ $barang->kategori }}"
                                   required>

                        </div>

                    </div>

                    <!-- RUANGAN -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Ruangan</label>

                            <input type="text"
                                   name="ruangan"
                                   class="form-control"
                                   value="{{ $barang->ruangan }}"
                                   required>

                        </div>

                    </div>

                    <!-- STOK -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Stok</label>

                            <input type="number"
                                   name="stok"
                                   class="form-control"
                                   value="{{ $barang->stok }}"
                                   required>

                        </div>

                    </div>

                    <!-- KONDISI -->
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Kondisi</label>

                            <select name="kondisi"
                                    class="form-control"
                                    required>

                                <option value="Baik"
                                    {{ $barang->kondisi == 'Baik' ? 'selected' : '' }}>
                                    Baik
                                </option>

                                <option value="Rusak"
                                    {{ $barang->kondisi == 'Rusak' ? 'selected' : '' }}>
                                    Rusak
                                </option>

                                <option value="Perbaikan"
                                    {{ $barang->kondisi == 'Perbaikan' ? 'selected' : '' }}>
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
                                      placeholder="Masukkan deskripsi barang...">{{ $barang->deskripsi }}</textarea>

                        </div>

                    </div>

                    <!-- GAMBAR -->
                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Gambar Barang</label>

                            <input type="file"
                                   name="gambar"
                                   class="form-control">

                        </div>

                        @if($barang->gambar)

                            <div class="mt-3">

                                <p class="text-muted">
                                    Gambar Saat Ini
                                </p>

                                <img src="{{ asset('gambar_barang/' . $barang->gambar) }}"
                                     width="150"
                                     height="150"
                                     style="object-fit: cover;
                                            border-radius: 15px;
                                            border: 3px solid #eee;
                                            padding: 4px;">

                            </div>

                        @endif

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="mt-4 d-flex">

                    <button type="submit"
                            class="btn btn-primary mr-2">

                        <i class="mdi mdi-content-save"></i>

                        Update Barang

                    </button>

                    <a href="/barang"
                       class="btn btn-light">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection