@extends('layout')
@section('content')
<h2>Tambah Dosen</h2>
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
<form action="{{ route('dosens.store') }}" method="POST">@csrf
<div class="mb-3"><label>NIDN</label><input type="text" name="nidn" class="form-control"></div>
<div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control"></div>
<div class="mb-3"><label>Bidang Keahlian</label><input type="text" name="bidang_keahlian" class="form-control"></div>
<div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('dosens.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
