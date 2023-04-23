<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Hash;
use Session;

class TaskController extends Controller
{
    public function store(Request $request){

        //dd($request->all());

        $task=new Task;

        $this->validate($request,[

            'fname'=>'required|max:40',
            'lname'=>'required|max:40',
            'email'=>'required|string|email|max:50',
            'password'=>'required|max:40',
            'cpassword'=>'required|max:40',

        ]);

        $task->first_name=$request->fname;
        $task->last_name=$request->lname;
        $task->email=$request->email;
        if($request->password==$request->cpassword) {

            $task->password=Hash::make($request->password);
            $checkEmail = Task::where('email', '=', $request->email)->first();

            if($checkEmail) {

                $this->validate(
                    $request, 
                    ['thing' => 'required'],
                    ['thing.required' => 'Email address is already exists']
                );

            } else {

                $task->save(); 
                return redirect('/login')->with('message', 'Registered Successfully!');
                //return view('/login');

            }

        } else {

            $request->validate([
                "password" => 'required|confirmed' 
            ]);
            //return view('/register');
        }

    }

    public function login(Request $request){


        $this->validate($request,[

            'email'=>'required|string|email|max:50',
            'password'=>'required|max:40',


        ]);

        $user = Task::where('email', '=', $request->email)->first();

        if($user){

            if(Hash::check($request->password, $user->password)){

                $request->session()->put('loginId', $user->id);
                return redirect('/');

            } else {

                $this->validate(
                    $request, 
                    ['thing' => 'required'],
                    ['thing.required' => 'invalied Email OR Password']
                );

            }


        } else {
            $this->validate(
                $request, 
                ['thing' => 'required'],
                ['thing.required' => 'invalied Email OR Password']
            );
        }

    }

    public function logout(){

        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/login')->with('message', 'You have logout Successfully!');
        }

    }

    public function update(Request $request,$id){


        $this->validate($request,[

            'firstname'=>'required|max:40',
            'lastname'=>'required|max:40',
            'email'=>'required|string|email|max:50',

        ]);

        $users = Task::find($id);
        $users->first_name = $request->firstname;
        $users->last_name = $request->lastname;
        $loginemail = Task::where('id', '=', Session::get('loginId'))->first();

        if(!($loginemail->email==$request->email)) {

            $user = Task::where('email', '=', $request->email)->first();

            if($user) {

                $this->validate(
                    $request, 
                    ['thing' => 'required'],
                    ['thing.required' => 'Email address is already exists']
                );

            } else {

                $users->email = $request->email;
            }
        }

        if($request->ccpassword){

            $this->validate($request,[

                'newpassword'=>'required|max:40',
    
            ]);

            if(Hash::check($request->ccpassword, $loginemail->password)){

                $users->password = Hash::make($request->newpassword);

            } else {

                $this->validate(
                    $request, 
                    ['thing' => 'required'],
                    ['thing.required' => 'Current Password is Invalied']

                    //The email field is required.
                );
            }
        }

        
        $users->update();
        return redirect('/')->with('message', 'Update Successfully!');

    }

    public function deleteMyAccount($id) {

        $user = Task::find($id);
        $user->delete();

        if(Session::has('loginId')){

            Session::pull('loginId');
            return redirect('/login')->with('message', 'Your Account is Permanently Deleted');

        }
    }
    
}
