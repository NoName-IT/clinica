<?php

namespace App\Http\Controllers\Coinsurance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coinsurance;
use App\Http\Requests\StoreCoinsuranceRequest;
use App\Http\Requests;
use Laracasts\Flash\Flash;


class CoinsuranceController extends Controller
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

        $coinsurances = Coinsurance::orderBy('id','ASC')->paginate(10);

        return view('coinsurances.index')->with('coinsurances', $coinsurances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $affiliate_types = array('Obligatorio', 'Voluntario', 'Prepago');
        $modules = array('Agudo', 'Crónico', 'Dual');

        return view('coinsurances.create')->with('affiliate_types', $affiliate_types)
                ->with('modules', $modules);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoinsuranceRequest $request)
    {
        //

        $coinsurance = new Coinsurance($request->all());

        $coinsurance->save();

        Flash::success(trans('coinsurance.coinsurance_created'));

        return redirect()->route('coinsurances.index');
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
        $coinsurance = Coinsurance::findOrFail($id);
        $affiliate_types = array('Obligatorio', 'Voluntario', 'Prepago');
        $modules = array('Agudo', 'Crónico', 'Dual');

        return view('coinsurances.edit')->with('coinsurance', $coinsurance)
                    ->with('affiliate_types', $affiliate_types)
                    ->with('modules', $modules);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCoinsuranceRequest $request, $id)
    {
        //
        $coinsurance = Coinsurance::findOrFail($id);

        $coinsurance_new = $request->all();

        $coinsurance->fill($coinsurance_new);

        $coinsurance->save();

        Flash::success(trans('general.coinsurance_edited'));

        return redirect()->route('coinsurances.index');

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
        $coinsurance = Coinsurance::findOrFail($id);
        $coinsurance->delete();

        return trans('coinsurance.coinsurance_deleted');
    }
}
