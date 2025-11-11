@extends('layout')
@section('content')
<h2>Data Mata Kuliah</h2>

@if(session('pesan'))
<div class="alert alert-success">{{ session('pesan') }}</div>
@endif

<a href="{{ route('mata_kuliahs.create') }}" class="btn btn-primary mb-2">Tambah Mata Kuliah</a>
<a href="{{ route('mata_kuliahs.trash') }}" class="btn btn-secondary mb-2">Lihat Data Terhapus</a>
<table class="table table-striped">
<thead><tr><th>No</th><th>Kode</th><th>Nama</th><th>SKS</th><th>Dosen Pengampu</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($mataKuliahs as $mk)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $mk->kode_mk }}</td>
<td>{{ $mk->nama_mk }}</td>
<td>{{ $mk->sks }}</td>
<td>{{ $mk->dosen->nama ?? '-' }}</td>
<td>
<a href="{{ route('mata_kuliahs.show',$mk->id) }}" class="btn btn-info btn-sm">Detail</a>
<a href="{{ route('mata_kuliahs.edit',$mk->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('mata_kuliahs.destroy',$mk->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
<button class="btn btn-danger btn-sm">Hapus</button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
