<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::with('dosen')->get();
        return view('mata_kuliah.index', compact('mataKuliahs'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('mata_kuliah.create', compact('dosens'));
    }

   public function store(Request $request)
{
    $data = $request->validate([
        'kode_mk' => 'required|min:3|max:10|unique:mata_kuliahs',
        'nama_mk' => 'required|min:3|max:50',
        'sks' => 'required|integer|min:1|max:6',
        'dosen_id' => 'nullable|exists:dosens,id',
    ], [
        'kode_mk.required' => 'Kode MK wajib diisi.',
        'kode_mk.unique' => 'Kode MK sudah ada.',
        'nama_mk.required' => 'Nama MK wajib diisi.',
        'sks.required' => 'Jumlah SKS wajib diisi.',
        'sks.integer' => 'SKS harus berupa angka.',
        'dosen_id.exists' => 'Dosen tidak valid.',
    ]);

    try {
            MataKuliah::create($data);
            return redirect()->route('mata_kuliahs.index')
                ->with('pesan', 'Mata kuliah berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['db_error' => 'Terjadi kesalahan saat menyimpan data. Periksa format atau panjang field.'])
                ->withInput();
        }
    }

    public function show(MataKuliah $mataKuliah)
    {
        return view('mata_kuliah.show', compact('mataKuliah'));
    }

    public function edit(MataKuliah $mataKuliah)
    {
        $dosens = Dosen::all();
        return view('mata_kuliah.edit', compact('mataKuliah', 'dosens'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $data = $request->validate([
            'kode_mk' => "required|unique:mata_kuliahs,kode_mk,{$mataKuliah->id}",
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
            'dosen_id' => 'nullable|exists:dosens,id',
        ]);

        $mataKuliah->update($data);
        return redirect()->route('mata_kuliahs.show', $mataKuliah)->with('pesan', 'Mata kuliah berhasil diupdate');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect()->route('mata_kuliahs.index')->with('pesan', 'Mata kuliah berhasil dihapus (soft delete)');
    }

    public function trash()
{
    $mataKuliahs = \App\Models\MataKuliah::onlyTrashed()->get();
    return view('mata_kuliah.trash', compact('mataKuliahs'));
}

public function restore($id)
{
    $mataKuliah = \App\Models\MataKuliah::withTrashed()->findOrFail($id);
    $mataKuliah->restore();
    return redirect()->route('mata_kuliahs.trash')->with('pesan', 'Mata kuliah berhasil dipulihkan');
}

public function forceDelete($id)
{
    $mataKuliah = \App\Models\MataKuliah::withTrashed()->findOrFail($id);
    $mataKuliah->forceDelete();
    return redirect()->route('mata_kuliahs.trash')->with('pesan', 'Mata kuliah berhasil dihapus permanen');
}

}
