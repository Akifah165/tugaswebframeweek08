@extends('layout')
@section('content')
<h2>Detail Mahasiswa</h2>
@if(session('pesan'))
<div class="alert alert-success">{{ session('pesan') }}</div>
@endif
<ul class="list-group mb-3">
  <li class="list-group-item"><strong>NIM:</strong> {{ $mahasiswa->nim }}</li>
  <li class="list-group-item"><strong>Nama:</strong> {{ $mahasiswa->nama }}</li>
  <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $mahasiswa->jenis_kelamin=='L'?'Laki-laki':'Perempuan' }}</li>
  <li class="list-group-item"><strong>Jurusan:</strong> {{ $mahasiswa->jurusan }}</li>
  <li class="list-group-item"><strong>Alamat:</strong> {{ $mahasiswa->alamat ?? 'N/A' }}</li>
</ul>
<a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" class="d-inline">
@csrf @method('DELETE')
<button type="submit" class="btn btn-danger">Hapus</button>
</form>
<a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
