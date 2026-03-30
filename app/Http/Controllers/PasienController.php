<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Faskes;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::with('faskes')->get();
        return view('halrs.haldatapasien', compact('data'));
    }
        
    public function create()
    {
        $faskes = Faskes::all(); // ambil semua data faskes
        return view('halrs.formpasien', compact('faskes'));
    }

    public function store(Request $request)
    {
        Pasien::create([
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tempat_kejadian' => $request->tempat_kejadian,
            'faskes_id' => $request->faskes_id,
            'tanggal_kontrol' => $request->tanggal_kontrol,
            'diagnosa' => $request->diagnosa,
            'tanggal_keluar' => $request->tanggal_keluar,
            'biaya' => $request->biaya,
            'keterangan' => $request->keterangan,
            'kontrol_ke' => $request->kontrol_ke,
            'uang_keluar' => $request->uang_keluar,
            'obat' => $request->obat,
            'sisa_asuransi' => $request->sisa_asuransi,
            'dokter' => $request->dokter
        ]);

        return redirect('/halrs/haldatapasien');
    }

   public function update(Request $request)
{
    $pasien = Pasien::find($request->id);

    $pasien->update([
        'tanggal_kontrol'=>$request->tanggal_kontrol,
        'kontrol_ke'=>$request->kontrol_ke,
        'uang_keluar'=>$request->uang_keluar,
        'obat'=>$request->obat,
        'sisa_asuransi'=>$request->sisa_asuransi,
        'dokter'=>$request->dokter
    ]);

    return redirect('/halrs.haldatapasien');
}

public function edit()
{
    $data = Pasien::with('faskes')->get();

    return view('halrs.edithalpasien', compact('data'));
}
}