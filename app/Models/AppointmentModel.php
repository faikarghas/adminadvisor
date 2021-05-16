<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "appointments";
    protected $fillable = ['id','service', 'advisor_name','date','mentee_name','status','cvLink'];
}


