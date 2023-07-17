<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pemesanan;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function homepage(){
        return view('home');
    }
}
