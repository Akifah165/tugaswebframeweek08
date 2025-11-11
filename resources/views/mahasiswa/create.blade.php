@extends('layout')
@section('content')
<h2>Tambah Mahasiswa</h2>
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
<form action="{{ route('mahasiswas.store') }}" method="POST">
@csrf
<div class="mb-3">
  <label>NIM</label>
  <input type="text" name="nim" class="form-control" value="{{ old('nim') }}">
</div>
<div class="mb-3">
  <label>Nama</label>
  <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
</div>
<div class="mb-3">
  <label>Jenis Kelamin</label><br>
  <label><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label>
  <label class="ms-3"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
</div>
<div class="mb-3">
  <label>Jurusan</label>
  <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}">
</div>
<div class="mb-3">
  <label>Alamat</label>
  <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
