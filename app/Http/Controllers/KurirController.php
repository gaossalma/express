<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKurirRequest;
use App\Http\Requests\UpdateKurirRequest;
use App\Repositories\KurirRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KurirController extends AppBaseController
{
    /** @var  KurirRepository */
    private $kurirRepository;

    public function __construct(KurirRepository $kurirRepo)
    {
        $this->kurirRepository = $kurirRepo;
    }

    /**
     * Display a listing of the Kurir.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kurirRepository->pushCriteria(new RequestCriteria($request));
        $kurirs = $this->kurirRepository->all();

        return view('kurirs.index')
            ->with('kurirs', $kurirs);
    }

    /**
     * Show the form for creating a new Kurir.
     *
     * @return Response
     */
    public function create()
    {
        return view('kurirs.create');
    }

    /**
     * Store a newly created Kurir in storage.
     *
     * @param CreateKurirRequest $request
     *
     * @return Response
     */
    public function store(CreateKurirRequest $request)
    {
        $input = $request->all();

        $kurir = $this->kurirRepository->create($input);

        Flash::success('Kurir saved successfully.');

        return redirect(route('kurirs.index'));
    }

    /**
     * Display the specified Kurir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kurir = $this->kurirRepository->findWithoutFail($id);

        if (empty($kurir)) {
            Flash::error('Kurir not found');

            return redirect(route('kurirs.index'));
        }

        return view('kurirs.show')->with('kurir', $kurir);
    }

    /**
     * Show the form for editing the specified Kurir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kurir = $this->kurirRepository->findWithoutFail($id);

        if (empty($kurir)) {
            Flash::error('Kurir not found');

            return redirect(route('kurirs.index'));
        }

        return view('kurirs.edit')->with('kurir', $kurir);
    }

    /**
     * Update the specified Kurir in storage.
     *
     * @param  int              $id
     * @param UpdateKurirRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKurirRequest $request)
    {
        $kurir = $this->kurirRepository->findWithoutFail($id);

        if (empty($kurir)) {
            Flash::error('Kurir not found');

            return redirect(route('kurirs.index'));
        }

        $kurir = $this->kurirRepository->update($request->all(), $id);

        Flash::success('Kurir updated successfully.');

        return redirect(route('kurirs.index'));
    }

    /**
     * Remove the specified Kurir from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kurir = $this->kurirRepository->findWithoutFail($id);

        if (empty($kurir)) {
            Flash::error('Kurir not found');

            return redirect(route('kurirs.index'));
        }

        $this->kurirRepository->delete($id);

        Flash::success('Kurir deleted successfully.');

        return redirect(route('kurirs.index'));
    }
}
