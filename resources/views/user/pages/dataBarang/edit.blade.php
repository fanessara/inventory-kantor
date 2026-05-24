@extends('user.layouts.app-crud')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Data Barang</h4>
        <p class="card-description">
          Perbarui detail barang inventaris
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="forms-sample" action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="row">
              <div class="col-md-6 form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 form-group">
                <label for="kategori_id">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                  <option value="">-- Pilih Kategori --</option>
                  @foreach($kategoris as $kategori)
                      <option value="{{ $kategori->id }}" {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                          {{ $kategori->nama_kategori }}
                      </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label for="ruangan_id">Ruangan</label>
                <select class="form-control" id="ruangan_id" name="ruangan_id" required>
                  <option value="">-- Pilih Ruangan --</option>
                  @foreach($ruangans as $ruangan)
                      <option value="{{ $ruangan->id }}" {{ old('ruangan_id', $barang->ruangan_id) == $ruangan->id ? 'selected' : '' }}>
                          {{ $ruangan->nama_ruangan }}
                      </option>
                  @endforeach
                </select>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 form-group">
                <label for="jumlah">Jumlah / Stok</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}" min="1" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="kondisi">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" required>
                  <option value="baik" {{ old('kondisi', $barang->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                  <option value="rusak" {{ old('kondisi', $barang->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
              </div>
          </div>

          <div class="form-group">
            <label for="foto">Foto Barang Sebelumnya</label>
            
            <!-- Tampilkan Preview Foto Lama (Jika Ada) -->
            @if($barang->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $barang->foto) }}" alt="Foto {{ $barang->nama_barang }}" width="150" style="border-radius: 8px; border: 1px solid #ddd; padding: 4px;">
                </div>
                <small class="text-danger d-block mb-2">* Biarkan kosong jika tidak ingin mengubah foto</small>
            @else
                <small class="text-muted d-block mb-2">Belum ada foto. Silakan upload foto baru.</small>
            @endif

            <!-- Input File Baru -->
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
        </div>

          <button type="submit" class="btn btn-warning mr-2">Update Data</button>
          <a href="{{ route('barang.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection