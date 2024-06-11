<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\VerificationService;
use App\Http\Responses\ResponseService;
use Throwable;


class VerificationControllers extends Controller
{
    private VerificationService $verificationService;
    public function __construct(VerificationService $verificationService)
    {
      $this->verificationService = $verificationService;
    }
  
    public function verification(RegisterRequest $request)
    {
        try {
          $data = $this->verificationService->verification($request->validated());
          return ResponseService::success($data['massage'] , $data['data']);
        }
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   } 
}
