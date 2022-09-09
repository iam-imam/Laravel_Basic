<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerstore(Request $req){
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $repeat = $req->repeat;

        if($password != $repeat){
            return redirect()->back()->with('err', 'Password Mismatch');
        }
        else{
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'role' => 'student'
            ]);
            return redirect()->back()->with('success', 'Registration complete, waiting for admin approval');
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function loginstore(Request $req){
        $email = $req->email;
        $password = $req->password;

        $user = DB::table('users')
            ->where('email', '=', $email)
            ->where('password', '=', md5($password))
            ->first();

            if($user){
                if($user->is_approved==0){
                    return redirect()->back()->with('err', 'Not approved yet');
                }
                else{
                    $req->session()->put('username', $user->name);
                    $req->session()->put('userrole', $user->role);
                    return redirect('dashboard');
                }
            }
            else{
                return redirect()->back()->with('wrong', 'Incorrect Email or Passoword');
            }

    }

    public function dashboard(){
        if(Session::has('userrole') && Session::get('userrole')=='admin'){
            return view('auth.dashboard');
        }
        else{
            return view('auth.home');
        }
    }

    public function users($status){
        if($status=='all'){
            $users=DB::table('users')
                ->get();
        }
        else if($status=='pending'){
            $users=DB::table('users')
                ->where('is_approved', '=', 0)
                ->get();
        }
        return view('auth.users', ['users' => $users]);
    }

    public function approve($id){
        $approved = DB::table('users')
            ->where('id', '=', $id)
            ->update(['is_approved' => 1]);
        return redirect()->back()->with('msg', 'User has been approved');
    }

    public function delete($id){
        $deleted = DB::table('users')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->back()->with('del', 'User has been rejected');
    }
}
