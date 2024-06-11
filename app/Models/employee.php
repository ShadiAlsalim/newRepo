<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'first_name',
        'last_name',
        'phone_number' ,
        'gender',
        'date_of_birth',
        'portfolio',
        'military_check',
        'skills',
        'city_id',
        'job_title_id' ,
        'job_idustry_id',
        'job_level_id',
        

    ];

    public function user(){  // telling phone model that he's related to user table
        return $this->belongsTo(User::class);
    }

    public function city (){
        return $this->belongsTo(city::class);
    }

    public function EducationLevel (){
        return $this->belongsTo(EducationLevel::class);
    }

    public function JobIndustry (){
        return $this->belongsTo(JobIndustry::class);
    }

    public function JobLevel (){
        return $this->belongsTo(JobLevel::class);
    }
    
    public function JobTitle (){
        return $this->belongsTo(JobTitle::class);
    }

    public function Interests(){
        return $this->belongsToMany(Interests::class,'employee_interests'); 
    }
    
  















    public function WorkExperiences (){
        return $this->hasMany(WorkExperiences::class);
    }
    
}
