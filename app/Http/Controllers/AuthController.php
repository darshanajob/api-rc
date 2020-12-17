<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\User as UserResource;
use App\Models\Student;

class AuthController extends Controller
{
    // register method
    public function register(UserRegisterRequest $request){
     
          
          $user = User::create([
              'email' => $request->email,
              'name' => $request->name,
              'password' => bcrypt($request->password),
              'group' => $request->group,
          ]);
          
      
      
        
        if(!$token = auth()->attempt($request->only(['email','password']))){
         return abort(401);   
        }
        
        return  (new UserResource($request->user()))->additional([
            'meta' => [
              'token' => $token,  
            ],
        ]);
    }

    public function teacherreg(Request $request){
        $user = Teacher::create([
            'name' =>$request->name,
            'subject' =>$request->subject,
            'medium' =>$request->medium,
            'grade' =>$request->grade,
            'type' =>$request->type,
        ]); 
        
        $user->user()->create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'group' => $request->group,
        ]);

       // $puser =  User::pluck('id')->last();

       // $puser->user()->create

        if(!$token = auth()->attempt($request->only(['email','password']))){
            return abort(401);   
           }
        
           return  (new UserResource($request->user()))->additional([
            'meta' => [
              'token' => $token,  
            ],
        ]);
    }

    public function studentreg(Request $request){

        $Student = Student::create([
            'name' =>$request->name,
            'school' =>$request->school,
            'grade' =>$request->grade,
            'subject' =>$request->subject,
        ]);
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'group' => $request->group,
        ]);

        if(!$token = auth()->attempt($request->only(['email','password']))){
            return abort(401);   
           }
        
           return  (new UserResource($request->user()))->additional([
            'meta' => [
              'token' => $token,  
            ],
        ]);
    }
    
    // login method
    public function login(UserLoginRequest $request){
        if(!$token = auth()->attempt($request->only(['email','password']))){
            return response()->json([
                'errors' => [
                    'email' => ['Sorry we cant find the details '],
                ],
            ], 422);  
           };
           
           return  (new UserResource($request->user()))->additional([
               'meta' => [
                 'token' => $token,  
               ],
           ]);   
                

    }

    public function logout(Request $request){
       auth()->logout();
    } 

    public function user(Request $request){
        return new UserResource($request->user());
    }      
    

}
