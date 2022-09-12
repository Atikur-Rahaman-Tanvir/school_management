<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    //index
    public function index()
    {
        $exames = Exam::all();
        return view('exam.index', compact('exames'));
    }

    //store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
        ]);

        if (!$validator->fails()) {
            $exam = new Exam();
            $exam->exam_name = $request->exam_name;
            $exam->save();
            return response()->json(['success' => 'Exam Added Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    //show
    public function show(Request $request)
    {
        $exam = Exam::find($request->id);
        return response()->json(['exam' => $exam]);
    }

    //update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
        ]);
        if (!$validator->fails()) {
            $exam = Exam::find($request->edit_id);
            $exam->exam_name = $request->exam_name;
            $exam->save();
            return response()->json(['success' => 'Updated Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    // delete
    public function delete(Request $request)
    {
        Exam::find($request->id)->delete();
        return response()->json(['success' => 'Delete Successfully!']);
    }
}
