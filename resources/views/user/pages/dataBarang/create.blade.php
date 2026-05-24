@extends('user.layouts.app-crud')

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
            <label for="foto">Foto Barang (Opsional)</label>
            
            <!-- Input File -->
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage()">
            
            <!-- Tempat Munculin Preview Foto -->
            <div class="mt-2">
                <img id="img-preview" src="" alt="Preview Foto" class="img-fluid" style="display: none; max-width: 200px; border-radius: 8px; border: 1px solid #ddd; padding: 4px;">
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

@push('scripts')
  <script>
    function previewImage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('#img-preview');

        // Munculin tag <img> yang tadinya di-hidden
        imgPreview.style.display = 'block';

        // Baca data file yang dipilih
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        // Ganti src gambar dengan file yang dipilih
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endpush