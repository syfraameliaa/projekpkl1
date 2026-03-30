<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class JRController extends Controller
{
    public function datapasien()
{
    $data = Pasien::with('faskes')->get();
    return view('haljr.haldatapasienjr', compact('data'));
}
public function create()
        {
            return view('haljr.formkontrol');
            

    return redirect('/haljr/datapasien');
}
}
