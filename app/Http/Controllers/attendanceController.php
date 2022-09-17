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

    //show attendance
    public function show_attendance(){
        $data = DB::table("attendances")->select(

            DB::raw('student_id as student'),
            DB::raw('group_concat(attendance ORDER BY date) as atten'),
            DB::raw('group_concat(date ORDER BY date) as date_att')
        )->whereYear('date', '2022')
        ->whereMonth('date', '09')
        ->where('class_model_id', '50')
        ->groupBy('student_id')
        ->orderBy('date', 'ASC')
        ->get();

        return view('attendance.show_attendance', compact('data'));

    //    return $orders = Attendance::select(
    //         DB::raw("student_id as student"),
    //         DB::raw('group_concat(attendance ORDER BY date) as atten'),
    //         DB::raw('group_concat(date ORDER BY date) as date'),

    //         // DB::raw('sum(product_quentity) as product_quentity'),
    //         // DB::raw('sum(purchasing_total) as purchasing_total'),
    //         // DB::raw('sum(grand_total ) as grand_total '),
    //     )->where('class_model_id', '50')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->orderBy('date', 'ASC')->groupBy('student')->get();



        // $empatts = EmpAttendance::where(function ($query) use ($request) {

        //         if (!empty($request->from_date)) {
        //             $query->whereBetween('att_date', [$request->from_date, $request->to_date]);
        //         }
        //     })->orderBy('created_at', 'asc')->get();


    }
}




