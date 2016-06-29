<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\MedicType;
use App\Http\Requests\StoreMedicTypeRequest;
use App\Http\Requests\UpdateMedicTypeRequest;


class MedicTypeController extends Controller
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
        $medic_types = MedicType::orderBy('id','ASC')->paginate(10);

        return view('admin.medic_types.index')->with('medic_types', $medic_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.medic_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicTypeRequest $request)
    {
        //
        $medic_type = new MedicType($request->all());

        $medic_type->save();

        Flash::success(trans('general.medic_type_created'));

        return redirect()->route('admin.medic_types.index');
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
        $medic_type = MedicType::findOrFail($id);
        return view('admin.medic_types.edit')->with('medic_type', $medic_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicTypeRequest $request, $id)
    {
        //
        $medic_type = MedicType::findOrFail($id);

        $medic_type_new = $request->all();

        $medic_type->fill($medic_type_new);

        $medic_type->save();

        Flash::success(trans('general.medic_type_edited'));

        return redirect()->route('admin.medic_types.index');
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
