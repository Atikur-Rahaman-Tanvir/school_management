<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class attendanceController extends Controller
{
    //index
    public function index(){
        return view('attendance.index');
    }
    //take attendance
    public function take_attendance(Request $request){
        $validator = Validator::make($request->all(), [
            'attendance_date' => 'required',
            'class' => 'required',

        ]);
        // return response()->json(['test' => $request->all()]);

        if (!$validator->fails()) {
            $attendance = Attendance::where('class_model_id', $request->class)->where('date', $request->attendance_date)->get();
            if($attendance->count() > 0){
                $attendances = Attendance::where('class_model_id', $request->class)->where('date', $request->attendance_date)->get();
                $date = $request->attendance_date;

                return view('attendance.re_attendance_data_table', compact('attendances','date'));

            }else{

                $admissions = Admission::where('class_model_id', $request->class)->get();
                $date = $request->attendance_date;
                return view('attendance.attendance_data_table', compact('admissions','date'));
            }
            return response()->json(['success' => 'subject Added Successfully!']);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
    }


    //attendance store
    public function store(Request $request){
        // return response()->json(['test' => $request->all()]);
        $attendances = Attendance::where('class_model_id', $request->class[0])->where('date', $request->date[0])->get();
        if($attendances->count() > 0){
            // return response()->json(['test' =>'update']);
            $class = $request->class;
            $date = $request->date;
            $student = $request->student;
            $attendance = $request->attendance;
            $data = [];
            for ($i = 0; $i < count($student); $i++) {
                $data = [
                    'class_model_id' => $class[$i],
                    'student_id' => $student[$i],
                    'date' => $date[$i],
                    'attendance' => $attendance[$i],
                    'created_at' => Carbon::now()
                ];
                DB::table('attendances')->where('class_model_id', $class[$i])->where('date', $date[$i])->where('student_id', $student[$i])->update($data);
            }
            return response()->json(['success' => 'Attendance Updated']);
        }else{
            $class = $request->class;
            $date = $request->date;
            $student =$request->student;
            $attendance = $request->attendance;
            $data = [];
            for($i=0; $i<count($student); $i++){
                $data = [
                    'class_model_id' => $class[$i],
                    'student_id' => $student[$i],
                    'date' => $date[$i],
                    'attendance' => $attendance[$i],
                    'created_at' => Carbon::now()
                ];
                DB::table('attendances')->insert($data);
            }
            return response()->json(['success' => 'Attendance Complete']);
        }
    }
}




