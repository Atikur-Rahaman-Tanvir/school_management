<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public function student_personal_info(){
        return $this->belongsTo(student_personal_info::class, 'student_id');
    }
}
