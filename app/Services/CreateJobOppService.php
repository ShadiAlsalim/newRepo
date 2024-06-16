<?php
namespace App\Services;

use App\Models\User;
use App\Models\company;
use App\Models\employee;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\JobOppertunity;
use App\Models\city;
use App\Models\EducationLevel;
use App\Models\JobIndustry;
use App\Models\JobLevel;
use App\Models\JobTimeType;
use App\Models\JobTitle;
use Throwable;

class CreateJobOppService
{
    public function Create($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if ($user['role'] == 'employee') {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        }
        $company = Company::find($request['company_id']);
        if (!$company) {
            return [
                'message' => 'company not found',
                'data' => []
            ];
        }
        $city = city::find($request['city_id']);
        if (!$city) {
            return [
                'message' => 'city not found',
                'data' => []
            ];
        }
        $job_level_id = JobLevel::find($request['job_level_id']);
        if (!$job_level_id) {
            return [
                'message' => 'job level not found',
                'data' => []
            ];
        }
        $job_title_id = JobTitle::find($request['job_title_id']);
        if (!$job_title_id) {
            return [
                'message' => 'job title not found',
                'data' => []
            ];
        }
        $job_idustry_id = JobIndustry::find($request['job_idustry_id']);
        if (!$job_idustry_id) {
            return [
                'message' => 'job industry not found',
                'data' => []
            ];
        }
        $education_level_id = EducationLevel::find($request['education_level_id']);
        if (!$education_level_id) {
            return [
                'message' => 'education level not found',
                'data' => []
            ];
        }
        $job_type_id = JobTimeType::find($request['job_type']);
        if (!$job_type_id) {
            return [
                'message' => 'job type not found',
                'data' => []
            ];
        }
        JobOppertunity::create([
            'job_description' => $request['job_description'],
            'job_requirements' => $request['job_requirements'],
            'responsibility' => $request['responsibility'],
            'number_of_vacancies' => $request['number_of_vacancies'],
            'years_of_experiences' => $request['years_of_experiences'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'job_type' => $request['job_type'],
            'portfolio_check' => $request['portfolio_check'],
            'company_id' => $company['id'],
            'city_id' => $city['id'],
            'job_level_id' => $job_level_id['id'],
            'job_title_id' => $job_title_id['id'],
            'job_industry_id' => $job_idustry_id['id'],
            'education_level_id' => $education_level_id['id'],
            'job_type_id' => $job_type_id['id']
        ]);
    }
}