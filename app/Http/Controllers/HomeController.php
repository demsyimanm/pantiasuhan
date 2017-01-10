<?php

namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
use Session;
use App\User;
use App\Video;
use App\Post;
use App\Schedule;
class HomeController extends Controller
{
    public function index() {   
         
        $this->data['videos'] = Video::orderBy('id','DESC')->take(3)->get();
        $this->data['posts']   = Post::orderBy('id','DESC')->take(3)->get();
        $this->data['username'] = "";
        $this->data['password'] = "";
        if(Auth::check()) {
            $this->data['username'] = Auth::user()->username;
            $this->data['password'] = Auth::user()->password;
            return view('admin.homeAdmin',$this->data);
        }
        return view('user.home',$this->data);
    }

    public function login() {
        if (Request::isMethod('post')) {
            $credentials = Input::only('username','password');
            $this->data['username'] = Input::get('username');
            $cek = User::where('username',$this->data['username'] )->count();

            if ($cek > 0)
            {
                if (Auth::attempt($credentials,true)){
    				return redirect('admin');

                }
                Session::flash('status','failed-login');
                return redirect('/');
            }
            else
            {
                Session::flash('status','not-exist');
                return redirect('/');
            }
        }
    }

    public function video() {    
        $this->data['videos'] = Video::orderBy('id','DESC')->get();
        return view('user.video',$this->data);
    }

    public function artikel() {    
        $this->data['posts']   = Post::orderBy('id','DESC')->get();
        return view('user.post',$this->data);
    }

    public function artikelRead($id) {    
        $this->data['post']   = Post::find($id);
        return view('user.detailPost',$this->data);
    }

    public function calendar() {    
        $this->data['scheds']   = Schedule::get();
        return view('user.calendar',$this->data);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
