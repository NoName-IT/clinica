<?php

namespace App\Http\Controllers\Medic;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicRequest;
use App\Http\Requests\UpdateMedicRequest;
use Laracasts\Flash\Flash;
use App\Medic;
use App\BloodType;
use App\MedicType;

class MedicController extends Controller
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
        $medics = Medic::orderBy('id','ASC')->paginate(10);

        return view('medics.index')->with('medics', $medics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blood_types = BloodType::get();
        $medic_types = MedicType::get();
        
        
        return view('medics.create')->with('blood_types', $blood_types)
                ->with('medic_types', $medic_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicRequest $request)
    {
        //
        //dd($request->blood_type);
        $medic = new Medic($request->all());

        //dd($medic);
        $blood_type = BloodType::findOrFail($request->blood_type);
        $medic_type = MedicType::findOrFail($request->medic_type);

        $medic->blood_type()->associate($blood_type);
        $medic->medic_type()->associate($medic_type);

        $medic->save();

        Flash::success(trans('medic.medic_created'));

        return redirect()->route('medics.index');
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
        return redirect()->route('medics.index');
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
        $medic = Medic::findOrFail($id);
        $blood_types = BloodType::get();
        $medic_types = MedicType::get();
        

        return view('medics.edit')->with('medic', $medic)
                    ->with('blood_types', $blood_types)
                    ->with('medic_types', $medic_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicRequest $request, $id)
    {
        //
        //dd($request->all());
        $medic = Medic::findOrFail($id);

        $medic_new = $request->all();

        $medic->fill($medic_new);

        $blood_type = BloodType::findOrFail($request->blood_type);
        $medic_type = MedicType::findOrFail($request->medic_type);

        $medic->blood_type()->associate($blood_type);
        $medic->medic_type()->associate($medic_type);

        $medic->save();

        Flash::success(trans('general.medic_edited'));

        return redirect()->route('medics.index');
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
        $medic = Medic::findOrFail($id);
        $medic->delete();

        return trans('medic.medic_deleted');
    }
}
