<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'mobile number',
        'website',
        'description',
        'address',
        'job_idustry_id'
    ];
    public function user()
    {  // telling phone model that he's related to user table
        return $this->belongsTo(User::class);
    }

    public function JobIndustry()
    {
        return $this->belongsTo(JobIndustry::class);
    }

    public function JobOppertunity()
    {
        return $this->hasMany(JobOppertunity::class);
    }
}