<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FellowsListModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "fellows";
    protected $fillable = ['id','app_id','date','first_name','last_name','email_address','phone','gender','university','gpa','question_1','question_2','question_3','question_4','question_5','question_6','question_7','question_8','question_9','reason_to_join','resume','referee_name','referee_wa','referee_email','bootcamp_batch','profile_strength','id_advisor','aimz_remarks','internal_comments','contract_signed','fellow_status','advisor_remarks','accepted','reason_for_rejection','profile_strength','id_advisor','appointment_id'];
}