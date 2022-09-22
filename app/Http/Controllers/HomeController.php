<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pemesanan;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $anggota = Anggota::all();
        $team = Team::all();
        $pemesanan = Pemesanan::all();

        return view('dashboard',compact('anggota','team','pemesanan'));
    }
}
