<?php

namespace App\Http\Controllers\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Department;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getDepartments($id) 
        {
            $departments = Department::where('province_id', '=', $id)->get();
            $options = array();

            foreach ($departments as $department) {
                $options += array($department->id => $department->name);
            }

            return Response::json($options);
        }

}