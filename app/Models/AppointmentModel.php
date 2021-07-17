<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "appointment";
    protected $fillable = ['id','app_id','id_advisor','bootcamp_batch', 'profile_strength','aimz_remarks','internal_comments','contract_signed','fellow_status','advisor_remarks','accepted','reason_for_rejection'];
}


