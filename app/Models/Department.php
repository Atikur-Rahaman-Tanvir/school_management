<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public function classes()
    {
        return $this->belongsToMany(ClassModel::class)->withTimestamps();
    }
}
