<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Repositories\GenreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GenreController extends AppBaseController
{
    /** @var GenreRepository $genreRepository*/
    private $genreRepository;

    public function __construct(GenreRepository $genreRepo)
    {
        $this->genreRepository = $genreRepo;
    }

    /**
     * Display a listing of the Genre.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $genres = $this->genreRepository->all();

        return view('genres.index')
            ->with('genres', $genres);
    }

    /**
     * Show the form for creating a new Genre.
     *
     * @return Response
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created Genre in storage.
     *
     * @param CreateGenreRequest $request
     *
     * @return Response
     */
    public function store(CreateGenreRequest $request)
    {
        $input = $request->all();

        $genre = $this->genreRepository->create($input);

        Flash::success('Genre saved successfully.');

        return redirect(route('genres.index'));
    }

    /**
     * Display the specified Genre.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $genre = $this->genreRepository->find($id);

        if (empty($genre)) {
            Flash::error('Genre not found');

            return redirect(route('genres.index'));
        }

        return view('genres.show')->with('genre', $genre);
    }

    /**
     * Show the form for editing the specified Genre.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $genre = $this->genreRepository->find($id);

        if (empty($genre)) {
            Flash::error('Genre not found');

            return redirect(route('genres.index'));
        }

        return view('genres.edit')->with('genre', $genre);
    }

    /**
     * Update the specified Genre in storage.
     *
     * @param int $id
     * @param UpdateGenreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGenreRequest $request)
    {
        $genre = $this->genreRepository->find($id);

        if (empty($genre)) {
            Flash::error('Genre not found');

            return redirect(route('genres.index'));
        }

        $genre = $this->genreRepository->update($request->all(), $id);

        Flash::success('Genre updated successfully.');

        return redirect(route('genres.index'));
    }

    /**
     * Remove the specified Genre from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $genre = $this->genreRepository->find($id);

        if (empty($genre)) {
            Flash::error('Genre not found');

            return redirect(route('genres.index'));
        }

        $this->genreRepository->delete($id);

        Flash::success('Genre deleted successfully.');

        return redirect(route('genres.index'));
    }
    function getInfoTeam($idTeam){
        $genre = $this->genreRepository->find($id);

        if ($genre->biaya == null) {
            return "Belum Diatur Biaya Pemesananya!";
        }else{
            return "Rp. " .  number_format($genre->biaya, 0, ",", ".");
        }
    }
}
