<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "advisor";
    protected $fillable = ['id','full_name','first_name','last_name','primary_stream','secondary_stream','current_pod','class_size','last_position','last_company','email_address','enrollment_key','calendly_link','workshop_link','workshop_schedule','pod_connect_schedule','fee','advisor_type','class'];
}

