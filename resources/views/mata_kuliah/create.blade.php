@extends('layout')
@section('content')
<h2>Tambah Mata Kuliah</h2>
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
<form action="{{ route('mata_kuliahs.store') }}" method="POST">@csrf
<div class="mb-3"><label>Kode MK</label><input type="text" name="kode_mk" class="form-control"></div>
<div class="mb-3"><label>Nama MK</label><input type="text" name="nama_mk" class="form-control"></div>
<div class="mb-3"><label>SKS</label><input type="number" name="sks" class="form-control" min="1" max="6"></div>
<div class="mb-3"><label>Dosen Pengampu</label>
<select name="dosen_id" class="form-select">
<option value="">-- Pilih Dosen --</option>
@foreach($dosens as $dosen)
<option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
@endforeach
</select></div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('mata_kuliahs.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
