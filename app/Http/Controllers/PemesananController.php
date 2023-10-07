<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Repositories\PemesananRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Genre;
use App\Models\Pemesanan;
use App\Models\Team;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class PemesananController extends AppBaseController
{

     /** @var PemesananRepository $pemesananRepository*/
     private $pemesananRepository;

     public function __construct(PemesananRepository $pemesananRepo)
     {
         $this->pemesananRepository = $pemesananRepo;
     }

    public function index(Request $request)
    {
        $genre = Genre::all();
        $pemesanans = Pemesanan::where('id_pelanggan',Auth::user()->id)->get();
        return view('user.index', compact('pemesanans', 'genre'));
    }

    /**
     * Show the form for creating a new Pemesanan.
     *
     * @return Response
     */
    public function create()
    {
        $team = Team::pluck('nama_tim','id');
        $genre = Genre::get();
        return view('user.create',compact('team','genre'));
    }
    /**
     * Store a newly created Pemesanan in storage.
     *
     * @param CreatePemesananRequest $request
     *
     * @return Response
     */
    public function store(CreatePemesananRequest $request)
    {
        $input = $request->all();
        $pemesanan = $this->pemesananRepository->create($input);
        $pemesanan->id_pelanggan = Auth::user()->id;
        $pemesanan->status = 0;
        $pemesanan->save();

        Flash::success('Pemesanan saved successfully.');

        return redirect(route('pemesanans.index'));
    }

    /**
     * Display the specified Pemesanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('pemesanans.index'));
        }
        $team = Team::pluck('nama_tim','id');
        return view('user.show',compact('team'))->with('pemesanan', $pemesanan);
    }

    /**
     * Show the form for editing the specified Pemesanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('pemesanans.index'));
        }
        $team = Team::pluck('nama_tim','id');
        $genre = Genre::pluck('nama_genre','id');
        return view('pemesanans.edit',compact('team','genre'))->with('pemesanan', $pemesanan);
    }

    /**
     * Update the specified Pemesanan in storage.
     *
     * @param int $id
     * @param UpdatePemesananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemesananRequest $request)
    {
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('pemesanans.index'));
        }

        $pemesanan = $this->pemesananRepository->update($request->all(), $id);

        Flash::success('Pemesanan updated successfully.');

        return redirect(route('pemesanans.index'));
    }

    /**
     * Remove the specified Pemesanan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('dashboard.pemesanans.index'));
        }
        $pemesanan->status = 4;
        $pemesanan->save();

        Flash::success('Pemesanan ditolak.');

        return redirect(route('pemesanans.index'));
    }
    public function terima($id)
    {
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('dashboard.pemesanan.index'));
        }
        $pemesanan->status = 2;
        $pemesanan->save();

        Flash::success('Pemesanan diterima.');

        return redirect(route('dashboard.pemesanan.index'));
    }
    public function tolak($id)
    {
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('pemesanans.index'));
        }
        $pemesanan->status = 4;
        $pemesanan->save();

        Flash::success('Pemesanan ditolak.');

        return redirect(route('pemesanans.index'));
    }
    function setTim(Request $request,$id){
        $pemesanan = $this->pemesananRepository->find($id);

        if (empty($pemesanan)) {
            Flash::error('Pemesanan not found');

            return redirect(route('dashboard.pemesanan.index'));
        }
        $pemesanan->status = 3;
        $pemesanan->id_team = $request->id_team;
        $pemesanan->save();

        Flash::success('Pemesanan ditolak.');

        return redirect(route('dashboard.pemesanan.index'));
    }
    function uploadBukti(Request $request, $id){
        $this->validate($request, [
            'bukti'          => 'required'
        ]);
        $file           = $request->file('bukti');
        $nama_file      = $file->getClientOriginalName();
        $file->move('bukti',$file->getClientOriginalName());

        $pemesanan = Pemesanan::find($id);
        $pemesanan->bukti = $nama_file;
        $pemesanan->status = 1;
        $pemesanan->tgl_bayar = NOW();
        $pemesanan->save();
        return redirect(route('pemesanans.show',$id));


    }
}
