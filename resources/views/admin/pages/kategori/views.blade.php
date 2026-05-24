@extends('admin.layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Data Kategori</h4>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm btn-icon-text">
                <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Kategori
            </a>
        </div>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($kategoris as $index => $kategori)
              <tr>
                <td>{{ $kategoris->firstItem() + $index }}</td>
                <td class="font-weight-bold">{{ $kategori->nama_kategori }}</td>
                <td>
                  <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm" title="Edit">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" id="delete-form-{{ $kategori->id }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $kategori->id }}" data-name="{{ $kategori->nama_kategori }}" title="Hapus">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="text-center">Belum ada data kategori.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        
        <div class="mt-4 d-flex justify-content-center">
            {{ $kategoris->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection