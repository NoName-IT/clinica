<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\DischargeType;
use App\Http\Requests\StoreDischargeTypeRequest;
use App\Http\Requests\UpdateDischargeTypeRequest;

class DischargeTypeController extends Controller
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
        $discharge_types = DischargeType::orderBy('id','ASC')->paginate(10);

        return view('admin.discharge_types.index')->with('discharge_types', $discharge_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.discharge_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDischargeTypeRequest $request)
    {
        //
        $discharge_type = new DischargeType($request->all());

        $discharge_type->save();

        Flash::success(trans('general.discharge_type_created'));

        return redirect()->route('admin.discharge_types.index');
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
        $discharge_type = DischargeType::findOrFail($id);
        return view('admin.discharge_types.edit')->with('discharge_type', $discharge_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDischargeTypeRequest $request, $id)
    {
        //
        $discharge_type = DischargeType::findOrFail($id);

        $discharge_type_new = $request->all();

        $discharge_type->fill($discharge_type_new);

        $discharge_type->save();

        Flash::success(trans('general.discharge_type_edited'));

        return redirect()->route('admin.discharge_types.index');
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
    }}
