@extends('layout')
@section('content')
<h2>Data Dosen</h2>
@if(session('pesan'))
<div class="alert alert-success">{{ session('pesan') }}</div>
@endif

<a href="{{ route('dosens.create') }}" class="btn btn-primary mb-2">Tambah Dosen</a>
<a href="{{ route('dosens.trash') }}" class="btn btn-secondary mb-2">Lihat Data Terhapus</a>
<table class="table table-striped">
<thead><tr><th>No</th><th>NIDN</th><th>Nama</th><th>Bidang</th><th>Email</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($dosens as $dosen)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $dosen->nidn }}</td>
<td>{{ $dosen->nama }}</td>
<td>{{ $dosen->bidang_keahlian }}</td>
<td>{{ $dosen->email }}</td>
<td>
<a href="{{ route('dosens.show',$dosen->id) }}" class="btn btn-info btn-sm">Detail</a>
<a href="{{ route('dosens.edit',$dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('dosens.destroy',$dosen->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Hapus</button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
