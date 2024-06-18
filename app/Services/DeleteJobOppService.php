<?php
namespace App\Services;

use App\Models\User;
use App\Models\company;
use App\Models\employee;
use App\Models\JobOppertunity;
use Laravel\Sanctum\PersonalAccessToken;


class DeleteJobOppService
{
    public function delete($request, $id)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        $job_opp = JobOppertunity::find($id);
        $company = Company::find($job_opp['company_id']);
        if ($user['role'] == 'employee' || $user['id'] != $company['user_id']) {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        } else {
            JobOppertunity::destroy($id);
            return [
                'message' => 'deleted',
                'data' => []
            ];
        }
    }

}