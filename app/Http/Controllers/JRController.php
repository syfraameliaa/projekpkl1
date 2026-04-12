<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class JRController extends Controller
{
    public function datapasien()
    {
        $data = Pasien::with('faskes');

        if (request()->has('search')) {
            $data = $data->where('nama_pasien', 'like', '%' . request('search') . '%');
        }
        
        $data = $data->get();
        
        return view('haljr.haldatapasienjr', compact('data'));
    }
public function create()
        {
            return view('haljr.formkontrol');
            

    return redirect('/haljr/datapasien');
}



}
