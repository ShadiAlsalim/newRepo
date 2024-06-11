<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ResendCodeService
{
    public function resendCode($request){

    $user=User::where('email',$request->email)->first(); 
    if(!$user) {
        return response()->json(['message'=>'wrong email' , 'data' =>[] ] ,400);
        }
        $verificationCode = rand(10000,99999);
        $data['verificationCode'] = "{$verificationCode}";
        Mail::raw("Your verification code is: {$verificationCode}", function ($message) use ($request) {
         $message->from('mhd654mhd653@gmail.com', 'BlaWasta')
                 ->to($request['email'])
                 ->subject(' Verification Code ');
     });

    $data=[];
    $user['verificationCode'] = "{$verificationCode}";
    unset($user->email_verified_at  , $user->name , $user->id , $user->updated_at , $user->created_at); // to except roles and permission from json return 

     return [ 'massage'=>'check your email ' , 'data'=>$user];



}

}