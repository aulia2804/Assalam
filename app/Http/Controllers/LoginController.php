<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function login(Request $request){
        Session::flush();
        $user = Pengguna::where('username', $request->username)->first();
        if($user!=NULL){
            $role = $user->rule;
            $data = array(
                'username' => $request->username,
                'password' => $request->password,
                'rule' => $role,
                'status' => 'Active'
            );
            if($role == 'Pemilik'){
                $this->middleware('guest:pemilik', ['except'=>['logout']]);
                if(Auth::guard('pemilik')->attempt($data)){
                    return redirect()->intended('/beranda');
                }else{
                    return Redirect()->back()->withInput($request->only('username'));
                }
            }elseif($role == 'Admin'){
                $this->middleware('guest:admin', ['except'=>['logout']]);
                if(Auth::guard('admin')->attempt($data)){
                    return redirect()->intended('/beranda');
                }else{
                    return Redirect()->back()->withInput($request->only('username'));
                }
            }
        }else{
            return redirect('/');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
    
}
