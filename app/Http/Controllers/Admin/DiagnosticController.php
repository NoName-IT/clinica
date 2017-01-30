<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Relationship;
use App\Http\Requests\StoreRelationshipRequest;
use App\Http\Requests\UpdateRelationshipRequest;

class RelationshipController extends Controller
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
        $relationships = Relationship::orderBy('id','ASC')->paginate(10);

        return view('admin.relationships.index')->with('relationships', $relationships);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.relationships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRelationshipRequest $request)
    {
        //
        $relationship = new Relationship($request->all());

        $relationship->save();

        Flash::success(trans('general.relationship_created'));

        return redirect()->route('admin.relationships.index');
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
        $relationship = Relationship::findOrFail($id);
        return view('admin.relationships.edit')->with('relationship', $relationship);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRelationshipRequest $request, $id)
    {
        //
        $relationship = Relationship::findOrFail($id);

        $relationship_new = $request->all();

        $relationship->fill($relationship_new);

        $relationship->save();

        Flash::success(trans('general.relationship_edited'));

        return redirect()->route('admin.relationships.index');
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
