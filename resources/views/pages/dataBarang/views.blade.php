@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Data Barang Inventaris</h4>
            <!-- Tombol Tambah Barang (Nanti kita fungsikan) -->
            <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm btn-icon-text">
                <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Barang
            </a>
        </div>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Ruangan</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($barangs as $index => $barang)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td class="font-weight-bold">{{ $barang->kode_barang }}</td>
                <td>
                  {{ $barang->nama_barang }}
                  @if($barang->foto)
                    <br><small><a href="{{ asset('storage/' . $barang->foto) }}" target="_blank">Lihat Foto</a></small>
                  @endif
                </td>
                <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                <td>{{ $barang->ruangan->nama_ruangan ?? '-' }}</td>
                <td>{{ $barang->jumlah }}</td>
                <td>
                  @if($barang->kondisi == 'baik')
                    <label class="badge badge-success">Baik</label>
                  @else
                    <label class="badge badge-danger">Rusak</label>
                  @endif
                </td>
                <td>
                  @if($barang->status == 'tersedia')
                    <label class="badge badge-info">Tersedia</label>
                  @else
                    <label class="badge badge-warning">Dipinjam</label>
                  @endif
                </td>
                <td>
                  <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm" title="Edit">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="9" class="text-center">Belum ada data barang.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="mt-4 d-flex justify-content-center">
            {{ $barangs->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection