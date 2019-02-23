<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance_Emp extends Model
{
  protected $table = 'attendance_emp';
  protected $fillable = ['id','user_id','clock_in','clock_out','created_at','updated_at'];
}
