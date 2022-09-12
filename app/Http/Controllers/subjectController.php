<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class subjectController extends Controller
{
    //index
    public function index()
    {
        $subjects = Subject::orderBy('ClassModel_id' , 'ASC')->get();
        return view('subject.index', compact('subjects'));
    }

    //store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject_name' => 'required',
            'subject_mark' => 'required',
            'ClassModel_id' => 'required',
        ]);

        if (!$validator->fails()) {
            $subject = new subject();
            $subject->subject_name = $request->subject_name;
            $subject->subject_mark = $request->subject_mark;
            $subject->ClassModel_id = $request->ClassModel_id;
            $subject->save();
            return response()->json(['success' => 'subject Added Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    //show
    public function show(Request $request)
    {
        $subject = subject::find($request->id);
        return response()->json(['subject' => $subject]);
    }

    //update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject_name' => 'required',
            'subject_mark' => 'required',
            'ClassModel_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $subject = subject::find($request->edit_id);
            $subject->subject_name = $request->subject_name;
            $subject->subject_mark = $request->subject_mark;
            $subject->ClassModel_id = $request->ClassModel_id;
            $subject->save();
            return response()->json(['success' => 'Updated Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    // delete
    public function delete(Request $request)
    {
        subject::find($request->id)->delete();
        return response()->json(['success' => 'Delete Successfully!']);
    }

    //search
    public function search(Request $request){
        $subjects = Subject::where('ClassModel_id', $request->id)->orderBy('subject_name', 'ASC')->get();
        if($subjects->count() >= 1){
            return view('subject.search', compact('subjects'));
        }
        elseif($request->id == "view_all"){
            $subjects = Subject::orderBy('ClassModel_id', 'ASC')->get();
            return view('subject.search', compact('subjects'));
        }
        else{
            return response()->json(['not_found' => 'No Found']);
        }
    }
}
