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
        $classes = ClassModel::all();
        return view('class.index', compact('classes'));
    }

    //store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|unique:class_models,class_name',
            'total_seat' => 'required',
        ]);

        if (!$validator->fails()) {
            $class = new ClassModel();
            $class->class_name = $request->class_name;
            $class->total_seat = $request->total_seat;
            $class->save();
            return response()->json(['success' => 'Class Added Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    //show
    public function show(Request $request)
    {
        $class = ClassModel::find($request->id);
        return response()->json(['class' => $class]);
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
            $class->save();
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
