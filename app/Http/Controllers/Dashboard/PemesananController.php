<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Repositories\PemesananRepository;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
     /** @var PemesananRepository $pemesananRepository*/
     private $pemesananRepository;

     public function __construct(PemesananRepository $pemesananRepo)
     {
         $this->pemesananRepository = $pemesananRepo;
     }

    public function index()
    {
        $pemesanans = $this->pemesananRepository->all();
        return view('pemesanans.index', compact('pemesanans'));
    }
    public function show($id)
    {
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('pemesanans.index'));
        }
        $team = Team::pluck('nama_tim','id');
        return view('pemesanans.show',compact('team'))->with('pemesanan', $pemesanan);
    }
    

}
