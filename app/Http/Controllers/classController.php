<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class classController extends Controller
{
    //index
    public function index()
    {
        return view('class.index');
    }

    //store
    public function store(Request $request)
    {
        // return response()->json(['test' => $request->all()]);
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|unique:class_models,class_name',
            'total_seat' => 'required',
        ]);

        if (!$validator->fails()) {
            $class = new ClassModel();
            $class->class_name = $request->class_name;
            $class->total_seat = $request->total_seat;
            if($request->is_admission == 1){
                $class->is_admission = '1';
            }
            $class->save();
            $class->departments()->attach($request->departments);
            return response()->json(['success' => 'Class Added Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    //show
    public function show(Request $request)
    {
         $class = ClassModel::find($request->id);
        $departments = [];
        foreach($class->departments as $department){
        $departments[] = $department->id;

        }
        return response()->json(['class' => $class, 'departments' => $departments]);

    }

    //update
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'total_seat' => 'required',
        ]);
        if (!$validator->fails()) {
            $class = ClassModel::find($request->edit_id);
            $class->class_name = $request->class_name;
            $class->total_seat = $request->total_seat;
            if ($request->is_admission == 1) {
                $class->is_admission = '1';
            }else{
                $class->is_admission = '0';
            }
            $class->save();
            $class->departments()->sync($request->departments);
            return response()->json(['success' => 'Updated Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
        return response()->json(['test' => $request->class_name]);
    }

    // delete
    public function delete(Request $request){
        ClassModel::find($request->id)->delete();
        return response()->json(['success' => 'Delete Successfully!']);

    }
}
