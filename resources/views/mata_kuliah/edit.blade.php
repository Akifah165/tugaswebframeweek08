@extends('layout')
@section('content')
<h2>Edit Mata Kuliah</h2>
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
<form action="{{ route('mata_kuliahs.update',$mataKuliah->id) }}" method="POST">@csrf @method('PATCH')
<div class="mb-3"><label>Kode MK</label><input type="text" name="kode_mk" class="form-control" value="{{ old('kode_mk',$mataKuliah->kode_mk) }}"></div>
<div class="mb-3"><label>Nama MK</label><input type="text" name="nama_mk" class="form-control" value="{{ old('nama_mk',$mataKuliah->nama_mk) }}"></div>
<div class="mb-3"><label>SKS</label><input type="number" name="sks" class="form-control" value="{{ old('sks',$mataKuliah->sks) }}"></div>
<div class="mb-3"><label>Dosen Pengampu</label>
<select name="dosen_id" class="form-select">
<option value="">-- Pilih Dosen --</option>
@foreach($dosens as $dosen)
<option value="{{ $dosen->id }}" {{ $mataKuliah->dosen_id==$dosen->id?'selected':'' }}>{{ $dosen->nama }}</option>
@endforeach
</select></div>
<button type="submit" class="btn btn-primary">Update</button>
<a href="{{ route('mata_kuliahs.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
