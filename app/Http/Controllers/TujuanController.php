<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTujuanRequest;
use App\Http\Requests\UpdateTujuanRequest;
use App\Repositories\TujuanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TujuanController extends AppBaseController
{
    /** @var  TujuanRepository */
    private $tujuanRepository;

    public function __construct(TujuanRepository $tujuanRepo)
    {
        $this->tujuanRepository = $tujuanRepo;
    }

    /**
     * Display a listing of the Tujuan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tujuanRepository->pushCriteria(new RequestCriteria($request));
        $tujuans = $this->tujuanRepository->all();

        return view('tujuans.index')
            ->with('tujuans', $tujuans);
    }

    /**
     * Show the form for creating a new Tujuan.
     *
     * @return Response
     */
    public function create()
    {
        return view('tujuans.create');
    }

    /**
     * Store a newly created Tujuan in storage.
     *
     * @param CreateTujuanRequest $request
     *
     * @return Response
     */
    public function store(CreateTujuanRequest $request)
    {
        $input = $request->all();

        $tujuan = $this->tujuanRepository->create($input);

        Flash::success('Tujuan saved successfully.');

        return redirect(route('tujuans.index'));
    }

    /**
     * Display the specified Tujuan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tujuan = $this->tujuanRepository->findWithoutFail($id);

        if (empty($tujuan)) {
            Flash::error('Tujuan not found');

            return redirect(route('tujuans.index'));
        }

        return view('tujuans.show')->with('tujuan', $tujuan);
    }

    /**
     * Show the form for editing the specified Tujuan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tujuan = $this->tujuanRepository->findWithoutFail($id);

        if (empty($tujuan)) {
            Flash::error('Tujuan not found');

            return redirect(route('tujuans.index'));
        }

        return view('tujuans.edit')->with('tujuan', $tujuan);
    }

    /**
     * Update the specified Tujuan in storage.
     *
     * @param  int              $id
     * @param UpdateTujuanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTujuanRequest $request)
    {
        $tujuan = $this->tujuanRepository->findWithoutFail($id);

        if (empty($tujuan)) {
            Flash::error('Tujuan not found');

            return redirect(route('tujuans.index'));
        }

        $tujuan = $this->tujuanRepository->update($request->all(), $id);

        Flash::success('Tujuan updated successfully.');

        return redirect(route('tujuans.index'));
    }

    /**
     * Remove the specified Tujuan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tujuan = $this->tujuanRepository->findWithoutFail($id);

        if (empty($tujuan)) {
            Flash::error('Tujuan not found');

            return redirect(route('tujuans.index'));
        }

        $this->tujuanRepository->delete($id);

        Flash::success('Tujuan deleted successfully.');

        return redirect(route('tujuans.index'));
    }
}
