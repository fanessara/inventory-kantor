@extends('layouts.app-crud')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Ruangan</h4>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="forms-sample" action="{{ route('ruangan.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="kode_ruangan">Kode Ruangan</label>
            <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan" placeholder="Contoh: R-01" value="{{ old('kode_ruangan') }}" required>
          </div>
          <div class="form-group">
            <label for="nama_ruangan">Nama Ruangan</label>
            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="Contoh: Lab Komputer 1" value="{{ old('nama_ruangan') }}" required>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          <a href="{{ route('ruangan.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection