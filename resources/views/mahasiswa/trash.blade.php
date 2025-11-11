@extends('layout')
@section('content')
<h2>Data Mahasiswa Terhapus</h2>

@if(session('pesan'))
<div class="alert alert-success">{{ session('pesan') }}</div>
@endif

<a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary mb-2">Kembali ke Data Aktif</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Dihapus Pada</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($mahasiswas as $mhs)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $mhs->nim }}</td>
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->jurusan }}</td>
        <td>{{ $mhs->deleted_at }}</td>
        <td>
          <form action="{{ route('mahasiswas.restore', $mhs->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-success btn-sm">Pulihkan</button>
          </form>
          <form action="{{ route('mahasiswas.forceDelete', $mhs->id) }}" method="POST" class="d-inline">
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
