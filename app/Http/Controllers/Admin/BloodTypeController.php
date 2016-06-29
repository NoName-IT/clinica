<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\BloodType;
use App\Http\Requests\StoreBloodTypeRequest;
use App\Http\Requests\UpdateBloodTypeRequest;

class BloodTypeController extends Controller
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
        $blood_types = BloodType::orderBy('id','ASC')->paginate(10);

        return view('admin.blood_types.index')->with('blood_types', $blood_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blood_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBloodTypeRequest $request)
    {
        //
        $blood_type = new BloodType($request->all());

        $blood_type->save();

        Flash::success(trans('general.blood_type_created'));

        return redirect()->route('admin.blood_types.index');
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
        $blood_type = BloodType::findOrFail($id);
        return view('admin.blood_types.edit')->with('blood_type', $blood_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBloodTypeRequest $request, $id)
    {
        //
        $blood_type = BloodType::findOrFail($id);

        $blood_type_new = $request->all();

        $blood_type->fill($blood_type_new);

        $blood_type->save();

        Flash::success(trans('general.blood_type_edited'));

        return redirect()->route('admin.blood_types.index');
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
