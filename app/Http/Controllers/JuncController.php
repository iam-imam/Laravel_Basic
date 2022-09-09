<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Junc;

class JuncController extends Controller
{
    public function create(){
        return view('junc.create');
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
        $skill = $req->skill;
        $bio = $req->bio;
        $password = $req->password;
        $repeat = $req->repeat;

        if($password != $repeat){
            return redirect()->back()->with('err', 'Password Mismatch');
        }
        else{
            $obj = new Junc();
            $obj->name = $name;
            $obj->email = $email;
            $obj->birth_date = $birth_date;
            $obj->salary = $salary;
            $obj->gender = $gender;
            $obj->department = $department;
            $obj->skill = json_encode($skill);
            $obj->bio = $bio;
            $obj->password = md5($password);
            $obj->role = 'Student';
            $obj->save();
            //return redirect()->back()->with('success', 'Registration successful, wait for approval');
            return redirect('juncs');
        }
    }

    public function all(){
        $juncs = Junc::all();
        return view('junc.all', compact('juncs'));
    }

    public function edit($id){
        $junc = Junc::where('id', $id)->first();
        return view('junc.edit', compact('junc'));
    }

    public function update(Request $req, $id){
        $juncs = Junc::find($id);
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
        $skill = $req->skill;
        $bio = $req->bio;

        $juncs->name = $name;
        $juncs->birth_date = $birth_date;
        $juncs->salary = $salary;
        $juncs->gender = $gender;
        $juncs->department = $department;
        $juncs->skill = json_encode($skill);
        $juncs->bio = $bio;
        $juncs->save();
        return redirect('edit-junc/'.$id);
    }

    public function delete($id){
        $juncs = Junc::find($id);
        $juncs->delete();
        return redirect()->back()->with('del', 'User has been deleted');
    }
}