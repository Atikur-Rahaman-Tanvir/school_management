<?php

namespace App\Http\Controllers;


use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

class departmentController extends Controller
{
    //index
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    //store
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'department_name' => 'required|unique:department_models,department_name',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()]);
        // }
        //  else {
            $department = new Department();
            $department->department_name = $request->department_name;
            $department->save();
            return response()->json(['success' => 'New Department Added Successfully!']);
        // }
    
    }

    //show
    public function show(Request $request)
    {
        $department = Department::find($request->id);
        return response()->json(['department' => $department]);
    }

    //update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
        ]);
        if (!$validator->fails()) {
            $department = Department::find($request->edit_id);
            $department->department_name = $request->department_name;
            $department->save();
            return response()->json(['success' => 'Updated Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
        return response()->json(['test' => $request->department_name]);
    }

    // delete
    public function delete(Request $request)
    {
        Department::find($request->id)->delete();
        return response()->json(['success' => 'Delete Successfully!']);
    }
}
