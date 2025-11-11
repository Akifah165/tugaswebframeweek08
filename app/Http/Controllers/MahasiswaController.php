<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

  public function store(Request $request)
{
    $data = $request->validate([
        'nim' => 'required|min:5|max:8|unique:mahasiswas',
        'nama' => 'required|min:3|max:50',
        'jenis_kelamin' => 'required|in:P,L',
        'jurusan' => 'required',
        'alamat' => 'nullable',
    ], [
        'nim.required' => 'NIM wajib diisi.',
        'nim.min' => 'NIM minimal 5 karakter.',
        'nim.max' => 'NIM maksimal 8 karakter.',
        'nim.unique' => 'NIM sudah terdaftar.',
        'nama.required' => 'Nama wajib diisi.',
        'jenis_kelamin.required' => 'Pilih jenis kelamin.',
        'jurusan.required' => 'Jurusan wajib diisi.',
    ]);

    try {
        \App\Models\Mahasiswa::create($data);
        return redirect()->route('mahasiswas.index')
            ->with('pesan', 'Mahasiswa berhasil ditambahkan');
    } catch (\Exception $e) {
        // Tangkap error SQL (misal NIM terlalu panjang)
        return back()->withErrors(['db_error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()])
                     ->withInput();
    }
}



    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
            'nim' => "required|size:8|unique:mahasiswas,nim,{$mahasiswa->id}",
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);

        $mahasiswa->update($validateData);
        return redirect()->route('mahasiswas.show', $mahasiswa)->with('pesan', 'Data berhasil diupdate');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('pesan', 'Data berhasil dihapus (soft delete)');
    }

    // 🔹 Tampilkan data yang dihapus
public function trash()
{
    $mahasiswas = \App\Models\Mahasiswa::onlyTrashed()->get();
    return view('mahasiswa.trash', compact('mahasiswas'));
}

// 🔹 Pulihkan data
public function restore($id)
{
    $mahasiswa = \App\Models\Mahasiswa::withTrashed()->findOrFail($id);
    $mahasiswa->restore();
    return redirect()->route('mahasiswas.trash')->with('pesan', 'Data mahasiswa berhasil dipulihkan');
}

// 🔹 Hapus permanen
public function forceDelete($id)
{
    $mahasiswa = \App\Models\Mahasiswa::withTrashed()->findOrFail($id);
    $mahasiswa->forceDelete();
    return redirect()->route('mahasiswas.trash')->with('pesan', 'Data mahasiswa berhasil dihapus permanen');
}

}
