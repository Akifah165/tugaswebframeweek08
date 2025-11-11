@extends('layout')
@section('content')
<h2>Data Mata Kuliah Terhapus</h2>

@if(session('pesan'))
<div class="alert alert-success">{{ session('pesan') }}</div>
@endif

<a href="{{ route('mata_kuliahs.index') }}" class="btn btn-secondary mb-2">Kembali ke Data Aktif</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode MK</th>
      <th>Nama MK</th>
      <th>SKS</th>
      <th>Dihapus Pada</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($mataKuliahs as $mk)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $mk->kode_mk }}</td>
        <td>{{ $mk->nama_mk }}</td>
        <td>{{ $mk->sks }}</td>
        <td>{{ $mk->deleted_at }}</td>
        <td>
          <form action="{{ route('mata_kuliahs.restore', $mk->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-success btn-sm">Pulihkan</button>
          </form>
          <form action="{{ route('mata_kuliahs.forceDelete', $mk->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus permanen?')">Hapus Permanen</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="6" class="text-center">Tidak ada data terhapus</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
