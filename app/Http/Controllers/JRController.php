<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Faskes;

class JRController extends Controller
{
    public function datapasien(Request $request)
    {
        $data = Pasien::with('faskes');

        if ($request->faskes_id) {
            $data->where('faskes_id', $request->faskes_id);
        }
        if (request()->has('search')) {
            $data = $data->where('nama_pasien', 'like', '%' . request('search') . '%');
        }
        
        $data = $data->get();
        $faskes = Faskes::all();
        return view('haljr.haldatapasienjr', compact('data','faskes'));
        
    }
    public function create()
        {
            return view('haljr.formkontrol');
            

    return redirect('/haljr/datapasien');
}



}
