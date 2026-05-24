@extends('user.layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Data Ruangan</h4>
            <a href="{{ route('ruangan.create') }}" class="btn btn-primary btn-sm btn-icon-text">
                <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Ruangan
            </a>
        </div>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($ruangans as $index => $ruangan)
              <tr>
                <td>{{ $ruangans->firstItem() + $index }}</td> 
                <td class="font-weight-bold">{{ $ruangan->kode_ruangan }}</td>
                <td>{{ $ruangan->nama_ruangan }}</td>
                <td>
                  <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="btn btn-warning btn-sm" title="Edit">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  
                  <!-- Form Hapus. Peringatan JS otomatis jalan karena class "btn-delete" -->
                  <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST" id="delete-form-{{ $ruangan->id }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $ruangan->id }}" data-name="{{ $ruangan->nama_ruangan }}" title="Hapus">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center">Belum ada data ruangan.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-center">
            {{ $ruangans->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection