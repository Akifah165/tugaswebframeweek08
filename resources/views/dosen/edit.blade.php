@extends('layout')
@section('content')
<h2>Edit Dosen</h2>
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
<form action="{{ route('dosens.update',$dosen->id) }}" method="POST">@csrf @method('PATCH')
<div class="mb-3"><label>NIDN</label><input type="text" name="nidn" class="form-control" value="{{ old('nidn',$dosen->nidn) }}"></div>
<div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" value="{{ old('nama',$dosen->nama) }}"></div>
<div class="mb-3"><label>Bidang Keahlian</label><input type="text" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian',$dosen->bidang_keahlian) }}"></div>
<div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email',$dosen->email) }}"></div>
<button type="submit" class="btn btn-primary">Update</button>
<a href="{{ route('dosens.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
