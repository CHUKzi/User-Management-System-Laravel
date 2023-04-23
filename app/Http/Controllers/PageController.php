<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Session;

class PageController extends Controller
{

    //Main interface

    public function indexhome() {


        $data=Task::all();
        //return view('home')-> with('udatas',$data);

        
        if(Session::has('loginId')){
            $loginInfo = array();
            $loginInfo = Task::where('id', '=', Session::get('loginId'))->first();
            
            //return view('home', compact('loginInfo'));
            return view('home', compact('loginInfo'))-> with('udatas',$data);
        } else {
            return view('home')-> with('udatas',$data);
        }
        

    }

    //users login page

    public function indexlogin() {

        if(Session::has('loginId')){

            return redirect('/');

        } else {
            
            return view('login');
        }

    }

    //users register

    public function indexregister() {

        if(Session::has('loginId')){

            return redirect('/');

        } else {

            return view('register');
        }

    }


}
