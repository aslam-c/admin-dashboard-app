<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLogin(){
        $roles=Role::all();
        return view('login',['roles'=>$roles]);
    }

    public function login(UserLoginRequest $request){
        $loginData=$request->validated();
        $userRole=$loginData['role'];
        $username=$loginData['email'];
        $password=$loginData['password'];

        $intendedUrl=$request->query('next');

        $isUserExist=User::whereHas('roles',function($q)use($userRole){return $q->where('name',$userRole);})->where('email',$username)->first();

        if($isUserExist){
            $userPasswordHash=$isUserExist->password;
            if(Hash::check($password, $userPasswordHash)){
                $userDetails=['userData'=>$isUserExist,'role'=>$userRole];

                $redirectUrl=str_replace('_','-',$userRole);
                $redirectUrl=strtolower($redirectUrl."-dashboard");
                $request->session()->put('user',$userDetails);
                session()->flash('message','Login success');
                if(!$intendedUrl){
                    return redirect($redirectUrl);
                }
                return redirect($intendedUrl);
            }
            else{
                session()->flash('warning','Invalid password provided');
                return redirect()->back();
            }
        }
        else{
            $request->session()->flash('warning','User not found');
            return redirect('login');
        }
    }

    public function adminDashboard(){
        $users=User::whereHas('roles',function($q){return $q->where('name','USER');})->get();
        return view('admin-dashboard',['users'=>$users]);
    }


    public function superAdminDashboard(){
        $users=User::with('roles')->get();
        return view('super-admin-dashboard',['users'=>$users]);
    }

    public function userDashboard(){
        $user=session()->get('user');
        $iuser=$user['userData'];
        return view('user-dashboard',['user'=>$iuser]);
    }

}
