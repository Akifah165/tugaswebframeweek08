@extends('layout')
@section('content')
<h2>Edit Mahasiswa</h2>
{{-- PESAN ERROR --}}
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
@csrf
@method('PATCH')
<div class="mb-3">
  <label>NIM</label>
  <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}">
</div>
<div class="mb-3">
  <label>Nama</label>
  <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}">
</div>
<div class="mb-3">
  <label>Jenis Kelamin</label><br>
  <label><input type="radio" name="jenis_kelamin" value="L" {{ $mahasiswa->jenis_kelamin=='L'?'checked':'' }}> Laki-laki</label>
  <label class="ms-3"><input type="radio" name="jenis_kelamin" value="P" {{ $mahasiswa->jenis_kelamin=='P'?'checked':'' }}> Perempuan</label>
</div>
<div class="mb-3">
  <label>Jurusan</label>
  <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
</div>
<div class="mb-3">
  <label>Alamat</label>
  <textarea name="alamat" class="form-control">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
</div>
<button type="submit" class="btn btn-primary">Update</button>
<a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
