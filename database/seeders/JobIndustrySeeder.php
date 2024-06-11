<?php

namespace Database\Seeders;

use App\Models\JobIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobIndustry::create([
            'name'=> 'Computer and technology',
          ]);   

        JobIndustry::create([
            'name'=> 'Education',
          ]);   

        JobIndustry::create([
            'name'=> 'Entertainment',
          ]);   

        JobIndustry::create([
            'name'=> 'Finance and economic',
          ]);   

        JobIndustry::create([
            'name'=> ' Health care',
          ]);   
    }
}
