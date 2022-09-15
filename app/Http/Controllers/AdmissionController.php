<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\ClassModel;
use App\Models\guardian;
use App\Models\student_address;
use App\Models\student_personal_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;;
use Illuminate\Support\Str;

class AdmissionController extends Controller
{
    //index
    public function index()
    {
        return view('admission.index');
    }

    //store
    public function store(Request $request)
    {
        // return response()->json(['test' => $request->all()]);
        $validator = Validator::make($request->all(), [


            'student_id' => 'required|unique:admissions,student_id',
            'student_roll' => 'required',
            'student_name' => 'required',
            'student_f_name' => 'required',
            'student_m_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'guardian_name' => 'required',
            'guardian_phone_number' => 'required',
        ]);

        if (!$validator->fails()) {
            $admission = new admission();
            $admission->class_model_id = $request->class_id;
            $admission->department_id = $request->department;
            $admission->admission_year = Carbon::now()->format('Y');
            $admission->student_id = $request->student_id;
            $admission->student_roll = $request->student_roll;
            $admission->admitted_by = $request->admitted_by;
            $admission->save();

            $personal_info = new student_personal_info();
            $personal_info->admission_id = $admission->id;
            $personal_info->student_name = $request->student_name;
            $personal_info->student_f_name = $request->student_f_name;
            $personal_info->student_m_name = $request->student_m_name;
            $personal_info->date_of_birth = $request->date_of_birth;
            $personal_info->date_of_birth = Carbon::now();
            $personal_info->phone_number = $request->phone_number;
            $personal_info->gender = $request->gender;
            $personal_info->save();

            $address = new student_address();
            $address->admission_id = $admission->id;
            $address->country = $request->country;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->address = $request->address;
            $address->save();

            $guardian = new guardian();
            $guardian->admission_id = $admission->id;
            $guardian->guardian_name = $request->guardian_name;
            $guardian->guardian_phone_number = $request->guardian_phone_number;
            $guardian->save();

            return response()->json(['success' => 'Admission Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }


















    //show
    public function show(Request $request)
    {
        $admission = Admission::find($request->id);
        return response()->json(['admission' => $admission]);
    }

    //update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admission_name' => 'required',
            'admission_mark' => 'required',
            'ClassModel_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $admission = admission::find($request->edit_id);
            $admission->admission_name = $request->admission_name;
            $admission->admission_mark = $request->admission_mark;
            $admission->ClassModel_id = $request->ClassModel_id;
            $admission->save();
            return response()->json(['success' => 'Updated Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }

    // delete
    public function delete(Request $request)
    {
        admission::find($request->id)->delete();
        return response()->json(['success' => 'Delete Successfully!']);
    }

    //search
    public function search(Request $request)
    {
        $admissions = admission::where('ClassModel_id', $request->id)->orderBy('admission_name', 'ASC')->get();
        if ($admissions->count() >= 1) {
            return view('admission.search', compact('admissions'));
        } elseif ($request->id == "view_all") {
            $admissions = admission::orderBy('ClassModel_id', 'ASC')->get();
            return view('admission.search', compact('admissions'));
        } else {
            return response()->json(['not_found' => 'No Found']);
        }
    }

    //show_department
    public function show_department(Request $request){
        $class = ClassModel::find($request->data);
        if($class->departments->count()!= 0){
            return response()->json(['show_department' => 'show department']);
        }else{
            return response()->json(['hide_department' => 'hide department']);
        }
    }
}
