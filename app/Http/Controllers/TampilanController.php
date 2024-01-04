<?php

namespace App\Http\Controllers;

use App\Models\Fasilitator;
use Illuminate\Support\Facades\Auth;
use App\Models\pengguna;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Attribute\AsController;

class TampilanController extends Controller
{
    
    function menuutama(){
        return view("/menu/menuutama");
    }

   
    function superadmin(){
        return view("halaman/superadmin");
    }

    function tahun(){
        return view("halaman/tahun");
    }

    function level(){
        return view("halaman/level");
}

    
}
?>