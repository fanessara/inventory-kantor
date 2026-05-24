@extends('admin.layouts.app-crud')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Kategori</h4>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="forms-sample" action="{{ route('kategori.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Elektronik" value="{{ old('nama_kategori') }}" required>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          <a href="{{ route('kategori.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection