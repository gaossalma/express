<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePengirimanAPIRequest;
use App\Http\Requests\API\UpdatePengirimanAPIRequest;
use App\Models\Pengiriman;
use App\Repositories\PengirimanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PengirimanController
 * @package App\Http\Controllers\API
 */

class PengirimanAPIController extends AppBaseController
{
    /** @var  PengirimanRepository */
    private $pengirimanRepository;

    public function __construct(PengirimanRepository $pengirimanRepo)
    {
        $this->pengirimanRepository = $pengirimanRepo;
    }

    /**
     * Display a listing of the Pengiriman.
     * GET|HEAD /pengirimen
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pengirimanRepository->pushCriteria(new RequestCriteria($request));
        $this->pengirimanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pengirimen = $this->pengirimanRepository->all();

        return $this->sendResponse($pengirimen->toArray(), 'Pengirimen retrieved successfully');
    }

    /**
     * Store a newly created Pengiriman in storage.
     * POST /pengirimen
     *
     * @param CreatePengirimanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePengirimanAPIRequest $request)
    {
        $input = $request->all();

        $pengirimen = $this->pengirimanRepository->create($input);

        return $this->sendResponse($pengirimen->toArray(), 'Pengiriman saved successfully');
    }

    /**
     * Display the specified Pengiriman.
     * GET|HEAD /pengirimen/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pengiriman $pengiriman */
        $pengiriman = $this->pengirimanRepository->findWithoutFail($id);

        if (empty($pengiriman)) {
            return $this->sendError('Pengiriman not found');
        }

        return $this->sendResponse($pengiriman->toArray(), 'Pengiriman retrieved successfully');
    }

    /**
     * Update the specified Pengiriman in storage.
     * PUT/PATCH /pengirimen/{id}
     *
     * @param  int $id
     * @param UpdatePengirimanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengirimanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pengiriman $pengiriman */
        $pengiriman = $this->pengirimanRepository->findWithoutFail($id);

        if (empty($pengiriman)) {
            return $this->sendError('Pengiriman not found');
        }

        $pengiriman = $this->pengirimanRepository->update($input, $id);

        return $this->sendResponse($pengiriman->toArray(), 'Pengiriman updated successfully');
    }

    /**
     * Remove the specified Pengiriman from storage.
     * DELETE /pengirimen/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pengiriman $pengiriman */
        $pengiriman = $this->pengirimanRepository->findWithoutFail($id);

        if (empty($pengiriman)) {
            return $this->sendError('Pengiriman not found');
        }

        $pengiriman->delete();

        return $this->sendResponse($id, 'Pengiriman deleted successfully');
    }
}
