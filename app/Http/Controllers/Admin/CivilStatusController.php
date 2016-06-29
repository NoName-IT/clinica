<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\CivilStatus;
use App\Http\Requests\StoreCivilStatusRequest;
use App\Http\Requests\UpdateCivilStatusRequest;

class CivilStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $civil_statuses = CivilStatus::orderBy('id','ASC')->paginate(10);

        return view('admin.civil_statuses.index')->with('civil_statuses', $civil_statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.civil_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCivilStatusRequest $request)
    {
        //
        $civil_status = new CivilStatus($request->all());

        $civil_status->save();

        Flash::success(trans('general.civil_status_created'));

        return redirect()->route('admin.civil_statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $civil_status = CivilStatus::findOrFail($id);
        return view('admin.civil_statuses.edit')->with('civil_status', $civil_status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCivilStatusRequest $request, $id)
    {
        //
        $civil_status = CivilStatus::findOrFail($id);

        $civil_status_new = $request->all();

        $civil_status->fill($civil_status_new);

        $civil_status->save();

        Flash::success(trans('general.civil_status_edited'));

        return redirect()->route('admin.civil_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
