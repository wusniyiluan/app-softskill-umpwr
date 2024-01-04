<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controller\mysqli;
use App\Models\Fasilitator;
use App\Models\Peserta;
use App\Models\NilaiPeserta;

class DashboradController extends Controller
{
    public function index()
    {
        $totalFasilitator    = Fasilitator::count();
        $totalPeserta        = Peserta::count();
        $totalNilai          = NilaiPeserta::count();

        return view('dashboard', [
            'totalFasilitator'   => $totalFasilitator,
            'totalPeserta'       => $totalPeserta,
            'totalNilai'           => $totalNilai,
            
        ]);
    }
}