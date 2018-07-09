<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTujuanAPIRequest;
use App\Http\Requests\API\UpdateTujuanAPIRequest;
use App\Models\Tujuan;
use App\Repositories\TujuanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TujuanController
 * @package App\Http\Controllers\API
 */

class TujuanAPIController extends AppBaseController
{
    /** @var  TujuanRepository */
    private $tujuanRepository;

    public function __construct(TujuanRepository $tujuanRepo)
    {
        $this->tujuanRepository = $tujuanRepo;
    }

    /**
     * Display a listing of the Tujuan.
     * GET|HEAD /tujuans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tujuanRepository->pushCriteria(new RequestCriteria($request));
        $this->tujuanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tujuans = $this->tujuanRepository->all();

        return $this->sendResponse($tujuans->toArray(), 'Tujuans retrieved successfully');
    }

    /**
     * Store a newly created Tujuan in storage.
     * POST /tujuans
     *
     * @param CreateTujuanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTujuanAPIRequest $request)
    {
        $input = $request->all();

        $tujuans = $this->tujuanRepository->create($input);

        return $this->sendResponse($tujuans->toArray(), 'Tujuan saved successfully');
    }

    /**
     * Display the specified Tujuan.
     * GET|HEAD /tujuans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tujuan $tujuan */
        $tujuan = $this->tujuanRepository->findWithoutFail($id);

        if (empty($tujuan)) {
            return $this->sendError('Tujuan not found');
        }

        return $this->sendResponse($tujuan->toArray(), 'Tujuan retrieved successfully');
    }

    /**
     * Update the specified Tujuan in storage.
     * PUT/PATCH /tujuans/{id}
     *
     * @param  int $id
     * @param UpdateTujuanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTujuanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tujuan $tujuan */
        $tujuan = $this->tujuanRepository->findWithoutFail($id);

        if (empty($tujuan)) {
            return $this->sendError('Tujuan not found');
        }

        $tujuan = $this->tujuanRepository->update($input, $id);

        return $this->sendResponse($tujuan->toArray(), 'Tujuan updated successfully');
    }

    /**
     * Remove the specified Tujuan from storage.
     * DELETE /tujuans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tujuan $tujuan */
        $tujuan = $this->tujuanRepository->findWithoutFail($id);

        if (empty($tujuan)) {
            return $this->sendError('Tujuan not found');
        }

        $tujuan->delete();

        return $this->sendResponse($id, 'Tujuan deleted successfully');
    }
}
