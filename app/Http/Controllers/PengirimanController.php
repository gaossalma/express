<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePengirimanRequest;
use App\Http\Requests\UpdatePengirimanRequest;
use App\Repositories\PengirimanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PengirimanController extends AppBaseController
{
    /** @var  PengirimanRepository */
    private $pengirimanRepository;

    public function __construct(PengirimanRepository $pengirimanRepo)
    {
        $this->pengirimanRepository = $pengirimanRepo;
    }

    /**
     * Display a listing of the Pengiriman.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pengirimanRepository->pushCriteria(new RequestCriteria($request));
        $pengirimen = $this->pengirimanRepository->all();

        return view('pengirimen.index')
            ->with('pengirimen', $pengirimen);
    }

    /**
     * Show the form for creating a new Pengiriman.
     *
     * @return Response
     */
    public function create()
    {
        return view('pengirimen.create');
    }

    /**
     * Store a newly created Pengiriman in storage.
     *
     * @param CreatePengirimanRequest $request
     *
     * @return Response
     */
    public function store(CreatePengirimanRequest $request)
    {
        $input = $request->all();

        $pengiriman = $this->pengirimanRepository->create($input);

        Flash::success('Pengiriman saved successfully.');

        return redirect(route('pengirimen.index'));
    }

    /**
     * Display the specified Pengiriman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pengiriman = $this->pengirimanRepository->findWithoutFail($id);

        if (empty($pengiriman)) {
            Flash::error('Pengiriman not found');

            return redirect(route('pengirimen.index'));
        }

        return view('pengirimen.show')->with('pengiriman', $pengiriman);
    }

    /**
     * Show the form for editing the specified Pengiriman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pengiriman = $this->pengirimanRepository->findWithoutFail($id);

        if (empty($pengiriman)) {
            Flash::error('Pengiriman not found');

            return redirect(route('pengirimen.index'));
        }

        return view('pengirimen.edit')->with('pengiriman', $pengiriman);
    }

    /**
     * Update the specified Pengiriman in storage.
     *
     * @param  int              $id
     * @param UpdatePengirimanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengirimanRequest $request)
    {
        $pengiriman = $this->pengirimanRepository->findWithoutFail($id);

        if (empty($pengiriman)) {
            Flash::error('Pengiriman not found');

            return redirect(route('pengirimen.index'));
        }

        $pengiriman = $this->pengirimanRepository->update($request->all(), $id);

        Flash::success('Pengiriman updated successfully.');

        return redirect(route('pengirimen.index'));
    }

    /**
     * Remove the specified Pengiriman from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pengiriman = $this->pengirimanRepository->findWithoutFail($id);

        if (empty($pengiriman)) {
            Flash::error('Pengiriman not found');

            return redirect(route('pengirimen.index'));
        }

        $this->pengirimanRepository->delete($id);

        Flash::success('Pengiriman deleted successfully.');

        return redirect(route('pengirimen.index'));
    }
}
