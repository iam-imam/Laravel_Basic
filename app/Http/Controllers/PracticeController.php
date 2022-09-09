<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PracticeController extends Controller
{
    public function test(){
        return view('practice.test');
    }

    public function store(Request $req){
        $name = $req->name;
        $email= $req->email;
        $birth_date = $req->birth_date;
        $salary = $req->salary;
        if($req->gender == 'Male'){
            $gender = 'Male';
        }
        else if($req->gender == 'Female'){
            $gender = 'Female';
        }
        $department = $req->department;
        $bio = $req->bio;
        $password = $req->password;
        $repeat = $req->repeat;
        if($req->teacher == '1'){
            $role = 'Teacher';
        }
        else if($req->student == '1'){
            $role = 'Student';
        }

        if($password != $repeat){
            return redirect()->back()->with('err', 'Password Mismatch');
        }
        else{
            DB::table('demos')->insert([
                'name' => $name,
                'email' => $email,
                'birth_date' => $birth_date,
                'salary' => $salary,
                'gender' => $gender,
                'department' => $department,
                'bio' => $bio,
                'password' => md5($password),
                'role' => $role
            ]);
            return redirect()->back()->with('success', 'Registration successful, wait for approval');
        }
    }

    public function all()
    {
        $data = DB::table('demos')->get(); // returns an array
        return view('practice.all', ['users' => $data]);
    }

    public function edit($id){
        $user = DB::table('demos')->where('id', '=', $id)->first();
        return view('practice.edit', ['user'=>$user]);
    }

    public function update(Request $req, $pid)
    {
        $name = $req->name;
        $birth_date = $req->birth_date;
        $salary = $req->salary;
        if($req->gender == 'Male'){
            $gender = 'Male';
        }
        else if($req->gender == 'Female'){
            $gender = 'Female';
        }
        $department = $req->department;
        $bio = $req->bio;

        DB::table('demos')->where('id', '=', $pid)->update([
            'name' => $name,
            'birth_date' => $birth_date,
            'salary' => $salary,
            'gender' => $gender,
            'department' => $department,
            'bio' => $bio
        ]);
        return redirect('edit-user/'.$pid);
    }

    public function delete($id){
        $deleted = DB::table('demos')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->back()->with('del', 'User has been deleted');
    }
}