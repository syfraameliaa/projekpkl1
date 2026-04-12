<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Faskes;

class PuskesController extends Controller
{
    public function index()
    {
        return view('halpuskes.halPS');
    }   

    public function datapasien()
    {
        $faskes_id = auth()->user()->faskes_id;
        $datafaskes = Faskes::find($faskes_id);
        
        $data = Pasien::with('faskes')
            ->where('faskes_id', $faskes_id)
            ->get();
            
        return view('halpuskes.haldatapasienps', compact('data', 'datafaskes'));
    }
}
