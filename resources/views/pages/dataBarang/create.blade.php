@extends('layouts.app-crud')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Barang</h4>
        <p class="card-description">
          Masukkan detail barang inventaris baru ke dalam sistem
        </p>

        <!-- Nampilin pesan error validasi -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="forms-sample" action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="row">
              <div class="col-md-6 form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Contoh: BRG-001" value="{{ old('kode_barang') }}" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Contoh: Laptop Asus ROG" value="{{ old('nama_barang') }}" required>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 form-group">
                <label for="kategori_id">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                  <option value="">-- Pilih Kategori --</option>
                  @foreach($kategoris as $kategori)
                      <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label for="ruangan_id">Ruangan</label>
                <select class="form-control" id="ruangan_id" name="ruangan_id" required>
                  <option value="">-- Pilih Ruangan --</option>
                  @foreach($ruangans as $ruangan)
                      <option value="{{ $ruangan->id }}" {{ old('ruangan_id') == $ruangan->id ? 'selected' : '' }}>{{ $ruangan->nama_ruangan }}</option>
                  @endforeach
                </select>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 form-group">
                <label for="jumlah">Jumlah / Stok</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" min="1" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="kondisi">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" required>
                  <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                  <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
              </div>
          </div>

          <div class="form-group">
            <label>Foto Barang</label>
            <input type="file" name="foto" class="file-upload-default" accept="image/*" style="display: none;">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto (Maks 2MB)">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button" onclick="document.querySelector('input[name=foto]').click()">Upload</button>
              </span>
            </div>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Simpan Data</button>
          <a href="{{ route('barang.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection