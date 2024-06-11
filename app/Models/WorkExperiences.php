<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperiences extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'end_date',
        'start_date',
    ];
    
    public function employee (){
        return $this->belongsTo(employee::class);
    }

    public function JobIndustry (){
        return $this->belongsTo(JobIndustry::class);
    }

    public function JobTitle (){
        return $this->belongsTo(JobTitle::class);
    }
}
