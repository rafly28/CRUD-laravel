<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = Karyawan::where('nip', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('divisi', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Karyawan::orderBy('nip', 'desc')->paginate(5);
        }
        return view('karyawan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama', $request->nama);
        Session::flash('divisi', $request->divisi);
        Session::flash('role', $request->role);

        $request->validate([
            'nip' => 'required|numeric|digits_between:1,10|unique:karyawan,nip',
            'nama' => 'required',
            'divisi' => 'required',
            'role' => 'required|in:Manager,Team Lead,Staff',
        ], [
            'nip.required' => 'NIP WAJIB DIISI',
            'nip.numeric' => 'NIP WAJIB DALAM ANGKA',
            'nip.digits_between' => 'NIP MAKSIMAL 10 KARAKTER',
            'nip.unique' => 'NIP SUDAH ADA DIDALAM DATABASE',
            'nama.required' => 'NAMA WAJIB DIISI',
            'divisi.required' => 'DIVISI WAJIB DIISI',
            'role.required' => 'ROLE WAJIB DIISI',
            'role.in' => 'ROLE TIDAK VALID',
        ]);

        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'role' => $request->role,
        ];
        Karyawan::create($data);
        return redirect()->to('karyawan')->with('success', 'BERHASIL MENAMBAHKAN DATA');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Karyawan::where('nip', $id)->first();
        return view('karyawan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'divisi' => 'required',
            'role' => 'required|in:Manager,Team Lead,Staff',
        ], [
            'nama.required' => 'NAMA WAJIB DIISI',
            'divisi.required' => 'DIVISI WAJIB DIISI',
            'role.required' => 'ROLE WAJIB DIISI',
            'role.in' => 'ROLE TIDAK VALID',
        ]);

        $data = [
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'role' => $request->role,
        ];
        Karyawan::where('nip', $id)->update($data);
        return redirect()->to('karyawan')->with('success', 'BERHASIL MELAKUKAN PERUBAHAN DATA');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan::where('nip', $id)->delete();
        return redirect()->to('karyawan')->with('success', 'BERHASIL MELAKUKAN DELETE DATA');
    }
}
