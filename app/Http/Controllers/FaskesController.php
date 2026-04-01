<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faskes;

class FaskesController extends Controller
{
    public function index (){
        return view('addfaskes');
    }
    public function store(Request $request)
{
    $request->validate([
        'jenis' => 'required',
        'nama_faskes' => 'required|unique:faskes,nama_faskes',
    ], [
        'nama_faskes.unique' => 'Nama faskes sudah ada!',
    ]);

    Faskes::create([
        'jenis' => $request->jenis,
        'nama_faskes' => $request->nama_faskes,
    ]);

    return redirect()->route('faskes.index')->with('success', 'Data berhasil ditambahkan');
}

}