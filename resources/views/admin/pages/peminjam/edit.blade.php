@extends('admin.layouts.app-crud')

@section('content')
<div class="row">
  <div class="col-md-8 grid-margin stretch-card mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Akun Peminjam</h4>

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
          
          <div class="row">
              <div class="col-md-6 form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $peminjam->name) }}" required>
              </div>
              
              <div class="col-md-6 form-group">
                <label for="jabatan">Jabatan (Divisi/Unit)</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $peminjam->jabatan) }}" required>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $peminjam->username) }}" required>
              </div>

              <div class="col-md-6 form-group">
                <label for="password">Password Baru (Opsional)</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="text-muted d-block mt-1">* Kosongkan jika tidak ingin mengubah password</small>
              </div>
          </div>

          <div class="form-group">
            <label for="no_hp">Nomor HP/WhatsApp</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $peminjam->no_hp) }}" required>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="4" required>{{ old('alamat', $peminjam->alamat) }}</textarea>
          </div>

          <button type="submit" class="btn btn-warning mr-2">Update Akun</button>
          <a href="{{ route('peminjam.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection