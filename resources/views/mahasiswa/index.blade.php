@extends('layout')
@section('content')
<h2>Data Mahasiswa</h2>

@if(session('pesan'))
<div class="alert alert-success">{{ session('pesan') }}</div>
@endif

<a href="{{ route('mahasiswas.create') }}" class="btn btn-primary mb-2">Tambah Mahasiswa</a>
<a href="{{ route('mahasiswas.trash') }}" class="btn btn-secondary mb-2">Lihat Data Terhapus</a>

<table class="table table-striped">
<thead><tr><th>No</th><th>NIM</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($mahasiswas as $mhs)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $mhs->nim }}</td>
<td>{{ $mhs->nama }}</td>
<td>{{ $mhs->jurusan }}</td>
<td>
<a href="{{ route('mahasiswas.show',$mhs->id) }}" class="btn btn-info btn-sm">Detail</a>
<a href="{{ route('mahasiswas.edit',$mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('mahasiswas.destroy',$mhs->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Hapus</button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
