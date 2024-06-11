<?php
namespace App\Services;

use App\Models\User;
use App\Models\company;
use App\Models\employee;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class CreateCompanyService
{
    public function Create($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        $company = Company::where('user_id', $user->id)->first();
        try {
            $company::update([
                'name' => $request['name'],
                'mobile number' => $request['mobile number'],
                'website' => $request['website'],
                'description' => $request['description'],
                'address' => $request['address'],
                'job_idustry_id' => $request['job_industry_id']
            ]);
            return [
                'message' => 'created',
                'company' => $company
            ];
        } catch (Throwable $error) {
            return [
                'message' => $error->getMessage(),
                'company' => []
            ];
        }
    }
}