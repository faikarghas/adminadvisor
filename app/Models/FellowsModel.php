<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FellowsModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "appointment";
    protected $fillable = ['id','idAdvisor','remarks', 'fellowEmail','strength','batch'];
}


