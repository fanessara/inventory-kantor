@extends('layouts.app-crud')

@section('content')
<div class="row">
  <div class="col-md-8 grid-margin stretch-card mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Peminjam</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="forms-sample" action="{{ route('peminjam.update', $peminjam->id) }}" method="POST">
          @csrf
          @method('PUT')
          
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $peminjam->nama) }}" required>
          </div>
          
          <div class="form-group">
            <label for="jabatan">Jabatan (Divisi/Unit)</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $peminjam->jabatan) }}" required>
          </div>

          <div class="form-group">
            <label for="no_hp">Nomor HP/WhatsApp</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $peminjam->no_hp) }}" required>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="4" required>{{ old('alamat', $peminjam->alamat) }}</textarea>
          </div>

          <button type="submit" class="btn btn-warning mr-2">Update</button>
          <a href="{{ route('peminjam.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection