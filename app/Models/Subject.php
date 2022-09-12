<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function class_model(){
    return $this->belongsTo(ClassModel::class, 'ClassModel_id');
    }
}
