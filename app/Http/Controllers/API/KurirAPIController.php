<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKurirAPIRequest;
use App\Http\Requests\API\UpdateKurirAPIRequest;
use App\Models\Kurir;
use App\Repositories\KurirRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KurirController
 * @package App\Http\Controllers\API
 */

class KurirAPIController extends AppBaseController
{
    /** @var  KurirRepository */
    private $kurirRepository;

    public function __construct(KurirRepository $kurirRepo)
    {
        $this->kurirRepository = $kurirRepo;
    }

    /**
     * Display a listing of the Kurir.
     * GET|HEAD /kurirs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kurirRepository->pushCriteria(new RequestCriteria($request));
        $this->kurirRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kurirs = $this->kurirRepository->all();

        return $this->sendResponse($kurirs->toArray(), 'Kurirs retrieved successfully');
    }

    /**
     * Store a newly created Kurir in storage.
     * POST /kurirs
     *
     * @param CreateKurirAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKurirAPIRequest $request)
    {
        $input = $request->all();

        $kurirs = $this->kurirRepository->create($input);

        return $this->sendResponse($kurirs->toArray(), 'Kurir saved successfully');
    }

    /**
     * Display the specified Kurir.
     * GET|HEAD /kurirs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kurir $kurir */
        $kurir = $this->kurirRepository->findWithoutFail($id);

        if (empty($kurir)) {
            return $this->sendError('Kurir not found');
        }

        return $this->sendResponse($kurir->toArray(), 'Kurir retrieved successfully');
    }

    /**
     * Update the specified Kurir in storage.
     * PUT/PATCH /kurirs/{id}
     *
     * @param  int $id
     * @param UpdateKurirAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKurirAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kurir $kurir */
        $kurir = $this->kurirRepository->findWithoutFail($id);

        if (empty($kurir)) {
            return $this->sendError('Kurir not found');
        }

        $kurir = $this->kurirRepository->update($input, $id);

        return $this->sendResponse($kurir->toArray(), 'Kurir updated successfully');
    }

    /**
     * Remove the specified Kurir from storage.
     * DELETE /kurirs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kurir $kurir */
        $kurir = $this->kurirRepository->findWithoutFail($id);

        if (empty($kurir)) {
            return $this->sendError('Kurir not found');
        }

        $kurir->delete();

        return $this->sendResponse($id, 'Kurir deleted successfully');
    }
}
