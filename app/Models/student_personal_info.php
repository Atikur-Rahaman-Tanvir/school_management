<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_personal_info extends Model
{
    use HasFactory;
    public function admission(){
        return $this->belongsTo(Admission::class, 'admission_id');
    }
}
