<?php

namespace App\Http\Controllers;
use App\Models\company;
use App\Models\employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class TestingControllers extends Controller
{
    public function test(Request $request){
        $request->validate([
            'first_name'=>'required',
            'city_id'=>'required' , 
        ]);

        $user = employee::create([
            'first_name' => $request->first_name,
            'city_id' => $request->city_id,
        ]);
        
        return $user;
    }


    public function employeeInCity(Request $city_Id){
        $user=employee::query()->where('city_id',$city_Id['id'])->get();
         return $user;
     }


     public function verification( $request )
        {  
            $data = ([ 
                'email'=>$request['email'],
                'password'=>$request['password'],
                'role'=>$request['role']
            ]);

            $verificationCode = rand(10000,99999);
            $email = $request['email'] ;
            // notify(new EmailVerification());   
            // Mail::to($request['email'])->send(new EmailVerification()); // Send email

            Mail::raw($verificationCode, function ($data) use ($email) {
            $data->from('mhd654mhd653@gmail.com', 'Your Name');
            $data->to($email)->subject('Your Verification Code');
    });
            // return [ 'massage'=>'check your email ' , 'data'=>$data];

            return $data ;
    }


    
    public function resetPassword (Request $request){

        $validatePassword = Validator::make($request->all(),[
            'password' => 'required| regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            ]);
        
        $user=User::where('email',$request->email)->first();
            if(!$user) 
             return response()->json(['message'=>'wrong email' , 'data' =>[] ] ,400);

            $user->update([
                'password' => Hash::make($request->password),
            ]);

        return response()->json([
        'message'=>'The pssword updated successfully' , 
        'data' =>$user , 
        ] ,201);
        
    }

    public function add(Request $request){
        $validatePassword = Validator::make($request->all(),[
            'first' => 'required',
            'last' => 'required',
            ]);
    
    $user = User::create([ 
        'first'=>$request['first'],
        'last'=>$request['last']  //employee and company only
      ]);

      return $user ;
}

}
