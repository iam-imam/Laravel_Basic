<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class PersonController extends Controller
{
    public function register(){
        return view('person.register');
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
            DB::table('persons')->insert([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'role' => 'person'
            ]);
            return redirect()->back()->with('success', 'Registration successful, wait for approval');
        }
    }

    public function login(){
        return view('person.login');
    }

    public function loginstore(Request $req){
        $email = $req->email;
        $password = $req->password;

        $person = DB::table('persons')
            ->where('email', '=', $email)
            ->where('password', '=', md5($password))
            ->first();

        if(!$person){
            return redirect()->back()->with('wrong', 'Incorrect Email or Password!!!');
        }
        else{
            if($person->is_approved==0){
                return redirect()->back()->with('err', 'Not approved yet!!!');
            }
            else{
                $req->session()->put('username', $person->name);
                $req->session()->put('userrole', $person->role);
                return redirect('person-dashboard');
            }
        }
    }

    public function dashboard(){
        if(Session::has('userrole') && Session::get('userrole')=='admin'){
            return view('person.dashboard');
        }
        else{
            return view('person.home');
        }
    }

    public function persons($status){
        if($status == 'all'){
            $persons = DB::table('persons')
                ->get();
        }
        else if($status == 'pending'){
            $persons = DB::table('persons')
                ->where('is_approved', '=', 0)
                ->get();
        }
        return view('person.persons', ['persons' => $persons]);
    }

    public function approve($id){
        $approved = DB::table('persons')
            ->where('id', '=', $id)
            ->update(['is_approved' => 1]);
        return redirect()->back()->with('msg', 'Person has been aproved');
    }

    public function delete($id){
        $deleted = DB::table('persons')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->back()->with('del', 'Person has been deleted');
    }
}