<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Validator;
use Laracasts\Flash\Flash;
use Auth;

class UserController extends Controller
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
        $users = User::orderBy('id','ASC')->paginate(10);

        return view('admin.users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(10);
        $user->save();

        Flash::success(trans('general.user_created'));

        return redirect()->route('admin.users.index');

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
        return redirect()->route('admin.users.index');
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
        $user = User::findOrFail($id);
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Flash::success(trans('general.user_edited'));

        return redirect()->route('admin.users.index');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        
        if(Auth::user()->id == $id){
            
            Flash::error(trans('general.user_self_deleted'));

        }else{

            $user = User::findOrFail($id);
            $user->delete();

            //Flash::error(trans('general.user_deleted'));

        }

        //return response()->json(view('admin.users.users'))->render();

        if ($request->ajax()){
            //$users = User::orderBy('id','ASC')->paginate(5);
            //return ($id);
            //$users = User::orderBy('id','ASC')->paginate(5);

            //return response()->json(view('admin.users.users',compact('users'))->render());

            return trans('general.user_deleted');
        }else{
            return redirect()->route('admin.users.index');    
        }
        
        
        
        

    }

    //return $id;

}
