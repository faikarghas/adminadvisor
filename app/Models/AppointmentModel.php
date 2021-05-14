<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "appointments";
    protected $fillable = ['id','service', 'advisor','date','firstName','lastName','cvLink','email','phoneNumber','status'];
}


