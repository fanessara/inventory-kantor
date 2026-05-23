@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Data Akun Peminjam</h4>
            <a href="{{ route('peminjam.create') }}" class="btn btn-primary btn-sm btn-icon-text">
                <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Akun Peminjam
            </a>
        </div>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Jabatan</th>
                <th>No HP</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($peminjams as $index => $peminjam)
              <tr>
                <td>{{ $peminjams->firstItem() + $index }}</td> 
                <td class="font-weight-bold">{{ $peminjam->name }}</td>
                <td>{{ $peminjam->username }}</td>
                <td>{{ $peminjam->jabatan }}</td>
                <td>{{ $peminjam->no_hp }}</td>
                <td>
                  <a href="{{ route('peminjam.edit', $peminjam->id) }}" class="btn btn-warning btn-sm" title="Edit">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  
                  <form action="{{ route('peminjam.destroy', $peminjam->id) }}" method="POST" id="delete-form-{{ $peminjam->id }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $peminjam->id }}" data-name="{{ $peminjam->name }}" title="Hapus">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center">Belum ada data akun peminjam.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-center">
            {{ $peminjams->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection