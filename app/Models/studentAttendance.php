<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentAttendance extends Model
{
    use HasFactory;

    protected $fillable = ["attendance_id", "student", "attendance" ];
}
