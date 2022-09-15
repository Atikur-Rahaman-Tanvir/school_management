<?php

namespace App\Http\Controllers;

use App\Models\TutionFees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tutionFeesh extends Controller
{
    //index
    public function index(){
        return view('tution_fees.index');
    }

    //store
    public function store(Request $request){


        $fees_name = $request->fees_name;
        $amount = $request->amount;
        $ClassModel_id = $request->class_id;
        $department_id = $request->department_id;
        if($department_id){
            $data = [];
            for ($i=0; $i<count($fees_name); $i++) {
                $data= [
                    'fees_name' => $fees_name[$i],
                    'amount' => $amount[$i],
                    'ClassModel_id' => $ClassModel_id[$i],
                    'department_id' => $department_id[$i],
                ];
                DB::table('tution_fees')->insert($data);

            }
            return response()->json(['success' => 'data insert_successfully!', 'class_id' => $ClassModel_id[0],'department_id'=>$department_id[0]]);
        }else{
            $data = [];
            for ($i = 0; $i < count($fees_name); $i++) {
                $data = [
                    'fees_name' => $fees_name[$i],
                    'amount' => $amount[$i],
                    'ClassModel_id' => $ClassModel_id[$i],
                ];
                DB::table('tution_fees')->insert($data);
            }
            return response()->json(['success' => 'data insert_successfully!', 'class_id' => $ClassModel_id[0]]);
        }

    }

    //remove
    public function remove(Request $request){
        TutionFees::find($request->id)->delete();
        return response()->json(['success' => 'Remove Successfully!']);
    }
}
