<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Repositories\TeamRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Anggota;
use App\Models\Genre;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Flash;
use Response;

class TeamController extends AppBaseController
{
    /** @var TeamRepository $teamRepository*/
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Team.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teams = $this->teamRepository->all();

        return view('teams.index')
            ->with('teams', $teams);
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return Response
     */
    public function create()
    {
        $genre = Genre::pluck('nama_genre','id');
        $anggota = Anggota::all();
        return view('teams.create',compact('genre','anggota'));
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        $request->validate([
            'anggotaTim' => ['required'],
            'biaya' => ['required'],
            'nama_tim' => ['required'],
        ]);
        $input = $request->all();

        $team = $this->teamRepository->create($input);
        foreach ($request->anggotaTim as $value) {
            $anggota = new TeamMember;
            $anggota->id_team = $team->id;
            $anggota->id_member = $value;
            $anggota->save();
        }
        Flash::success('Team saved successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Display the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }
        $genre = Genre::pluck('nama_genre','id');
        $anggota = Anggota::all();

        return view('teams.edit',compact('genre','anggota'))->with('team', $team);
    }

    /**id_team = 
     * Update the specified Team in storage.
     *
     * @param int $id
     * @param UpdateTeamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamRequest $request)
    {
        $request->validate([
            'anggotaTim' => ['required'],
            'biaya' => ['required'],
            'nama_tim' => ['required'],
        ]);
        $team = $this->teamRepository->find($id);
        if (empty($team)) {
            Flash::error('Team not found');
            return redirect(route('teams.index'));
        }
        $team = $this->teamRepository->update($request->all(), $id);
        foreach ($team->teamMembers as $value) {
            $value->delete();
        }
        foreach ($request->anggotaTim as $value) {
            $anggota = new TeamMember;
            $anggota->id_team = $id;
            $anggota->id_member = $value;
            $anggota->save();
        }
        Flash::success('Team updated successfully.');

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route('teams.index'));
        }

        $this->teamRepository->delete($id);

        Flash::success('Team deleted successfully.');

        return redirect(route('teams.index'));
    }
   
}
