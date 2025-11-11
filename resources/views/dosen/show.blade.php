@extends('layout')
@section('content')
<h2>Detail Dosen</h2>
@if(session('pesan'))<div class="alert alert-success">{{ session('pesan') }}</div>@endif
<ul class="list-group mb-3">
<li class="list-group-item"><strong>NIDN:</strong> {{ $dosen->nidn }}</li>
<li class="list-group-item"><strong>Nama:</strong> {{ $dosen->nama }}</li>
<li class="list-group-item"><strong>Bidang:</strong> {{ $dosen->bidang_keahlian }}</li>
<li class="list-group-item"><strong>Email:</strong> {{ $dosen->email }}</li>
</ul>
<a href="{{ route('dosens.edit',$dosen->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('dosens.destroy',$dosen->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
<button class="btn btn-danger">Hapus</button></form>
<a href="{{ route('dosens.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
