<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'nidn' => 'required|min:5|max:10|unique:dosens',
        'nama' => 'required|min:3|max:50',
        'bidang_keahlian' => 'required',
        'email' => 'required|email|unique:dosens',
    ], [
        'nidn.required' => 'NIDN wajib diisi.',
        'nidn.min' => 'NIDN minimal 5 digit.',
        'nidn.max' => 'NIDN maksimal 10 digit.',
        'nidn.unique' => 'NIDN sudah digunakan.',
        'nama.required' => 'Nama wajib diisi.',
        'bidang_keahlian.required' => 'Bidang keahlian wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
    ]);

    try {
        \App\Models\Dosen::create($data);
        return redirect()->route('dosens.index')
            ->with('pesan', 'Dosenberhasil ditambahkan');
    } catch (\Exception $e) {
        // Tangkap error SQL (misal NIM terlalu panjang)
        return back()->withErrors(['db_error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()])
                     ->withInput();
    }
}


    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $data = $request->validate([
            'nidn' => "required|size:10|unique:dosens,nidn,{$dosen->id}",
            'nama' => 'required|min:3|max:50',
            'bidang_keahlian' => 'required',
            'email' => "required|email|unique:dosens,email,{$dosen->id}",
        ]);

        $dosen->update($data);
        return redirect()->route('dosens.show', $dosen)->with('pesan', 'Data dosen berhasil diupdate');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosens.index')->with('pesan', 'Data dosen berhasil dihapus (soft delete)');
    }

    public function trash()
{
    $dosens = \App\Models\Dosen::onlyTrashed()->get();
    return view('dosen.trash', compact('dosens'));
}

public function restore($id)
{
    $dosen = \App\Models\Dosen::withTrashed()->findOrFail($id);
    $dosen->restore();
    return redirect()->route('dosens.trash')->with('pesan', 'Data dosen berhasil dipulihkan');
}

public function forceDelete($id)
{
    $dosen = \App\Models\Dosen::withTrashed()->findOrFail($id);
    $dosen->forceDelete();
    return redirect()->route('dosens.trash')->with('pesan', 'Data dosen berhasil dihapus permanen');
}

}
