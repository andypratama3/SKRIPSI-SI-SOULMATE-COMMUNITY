<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Pemesanan;
use App\Models\Team;

class DashboardController extends Controller
{
    function index(){
        $anggota = Anggota::all();
        $team = Team::all();
        $pemesanan = Pemesanan::all();
        return view('dashboard',compact('anggota','team','pemesanan'));
    }
}
