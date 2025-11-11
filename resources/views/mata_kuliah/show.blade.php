@extends('layout')
@section('content')
<h2>Detail Mata Kuliah</h2>
@if(session('pesan'))<div class="alert alert-success">{{ session('pesan') }}</div>@endif
<ul class="list-group mb-3">
<li class="list-group-item"><strong>Kode:</strong> {{ $mataKuliah->kode_mk }}</li>
<li class="list-group-item"><strong>Nama:</strong> {{ $mataKuliah->nama_mk }}</li>
<li class="list-group-item"><strong>SKS:</strong> {{ $mataKuliah->sks }}</li>
<li class="list-group-item"><strong>Dosen Pengampu:</strong> {{ $mataKuliah->dosen->nama ?? '-' }}</li>
</ul>
<a href="{{ route('mata_kuliahs.edit',$mataKuliah->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('mata_kuliahs.destroy',$mataKuliah->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
<button class="btn btn-danger">Hapus</button></form>
<a href="{{ route('mata_kuliahs.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
