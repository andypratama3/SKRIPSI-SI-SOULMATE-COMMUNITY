<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Repositories\PemesananRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Team;
use Illuminate\Http\Request;
use Flash;
use Response;

class PemesananController extends AppBaseController
{
    /** @var PemesananRepository $pemesananRepository*/
    private $pemesananRepository;

    public function __construct(PemesananRepository $pemesananRepo)
    {
        $this->pemesananRepository = $pemesananRepo;
    }

    /**
     * Display a listing of the Pemesanan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pemesanans = $this->pemesananRepository->all();

        return view('pemesanans.index')
            ->with('pemesanans', $pemesanans);
    }

    /**
     * Show the form for creating a new Pemesanan.
     *
     * @return Response
     */
    public function create()
    {
        $team = Team::pluck('nama_tim','id');
        return view('pemesanans.create',compact('team'));
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

        return view('pemesanans.show')->with('pemesanan', $pemesanan);
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
        return view('pemesanans.edit',compact('team'))->with('pemesanan', $pemesanan);
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

            return redirect(route('pemesanans.index'));
        }

        $this->pemesananRepository->delete($id);

        Flash::success('Pemesanan deleted successfully.');

        return redirect(route('pemesanans.index'));
    }
}
