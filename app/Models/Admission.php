<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    public function student_personal_infos(){
        return $this->hasOne(student_personal_info::class, 'admission_id');
    }
    public function class_model(){
        return $this->belongsTo(ClassModel::class, 'class_model_id');
    }
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }
}
