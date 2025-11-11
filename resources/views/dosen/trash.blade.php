@extends('layout')
@section('content')
<h2>Data Dosen Terhapus</h2>

@if(session('pesan'))
<div class="alert alert-success">{{ session('pesan') }}</div>
@endif

<a href="{{ route('dosens.index') }}" class="btn btn-secondary mb-2">Kembali ke Data Aktif</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>NIDN</th>
      <th>Nama</th>
      <th>Bidang</th>
      <th>Email</th>
      <th>Dihapus Pada</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($dosens as $dosen)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $dosen->nidn }}</td>
        <td>{{ $dosen->nama }}</td>
        <td>{{ $dosen->bidang_keahlian }}</td>
        <td>{{ $dosen->email }}</td>
        <td>{{ $dosen->deleted_at }}</td>
        <td>
          <form action="{{ route('dosens.restore', $dosen->id) }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-success btn-sm">Pulihkan</button>
          </form>
          <form action="{{ route('dosens.forceDelete', $dosen->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus permanen data ini?')">Hapus Permanen</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="text-center">Tidak ada data terhapus</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
