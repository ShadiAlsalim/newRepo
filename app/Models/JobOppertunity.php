<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOppertunity extends Model
{
    use HasFactory;

    public function company (){
        return $this->belongsTo(company::class);
    }

    public function city (){
        return $this->belongsTo(city::class);
    }

    public function EducationLevel (){
        return $this->belongsTo(EducationLevel::class);
    }

    public function JobLevel (){
        return $this->belongsTo(JobLevel::class);
    }

    public function JobTitle (){
        return $this->belongsTo(JobTitle::class);
    }

    public function JobTimeType (){
        return $this->belongsTo(JobTimeType::class);
    }

    public function JobIndustry (){
        return $this->belongsTo(JobIndustry::class);
    }


}
