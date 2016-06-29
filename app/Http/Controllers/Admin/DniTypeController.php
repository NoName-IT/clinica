<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\DniType;
use App\Http\Requests\StoreDniTypeRequest;
use App\Http\Requests\UpdateDniTypeRequest;

class DniTypeController extends Controller
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
        $dni_types = DniType::orderBy('id','ASC')->paginate(10);

        return view('admin.dni_types.index')->with('dni_types', $dni_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.dni_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDniTypeRequest $request)
    {
        //
        $dni_type = new DniType($request->all());

        $dni_type->save();

        Flash::success(trans('general.dni_type_created'));

        return redirect()->route('admin.dni_types.index');
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
        $dni_type = DniType::findOrFail($id);
        return view('admin.dni_types.edit')->with('dni_type', $dni_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDniTypeRequest $request, $id)
    {
        //
        $dni_type = DniType::findOrFail($id);

        $dni_type_new = $request->all();

        $dni_type->fill($dni_type_new);

        $dni_type->save();

        Flash::success(trans('general.dni_type_edited'));

        return redirect()->route('admin.dni_types.index');
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
