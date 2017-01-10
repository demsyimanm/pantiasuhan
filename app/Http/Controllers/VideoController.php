<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
use Session;
use App\Video;
use App\User;

class VideoController extends Controller
{
    public function index()
    {
    	if (Request::isMethod('get')) {
            if (Auth::check()) {
            	$videos = Video::get();
                return view('admin.video.manage',compact('videos'));
            }
            return redirect('/');
        }
    }

    public function create()
    {
    	if (Request::isMethod('get')) {
            if (Auth::check()) {
                return view('admin.video.create');
            }
            return redirect('/');
        }
        else if (Request::isMethod('post'))
        {
        	if(Auth::check())
        	{
        		date_default_timezone_set('Asia/Jakarta');
        		$data = Input::all();
        		$date = date("Y-m-d H:i:s");
        		$link = str_replace("watch?v=","embed/",$data['link']);
        		$id = Video::insertGetId(array(
					'title' 		=> $data['title'],
					'link' 			=> $link, 
					'date' 			=> $date, 
				));
				Session::flash('status','success');
				return redirect('video');
        	}
        	return redirect('/');
        }
    }

    public function update($id)
    {
    	if (Request::isMethod('get')) {
            if (Auth::check()) {
            	$video = Video::find($id);
                return view('admin.video.update',compact('video'));
            }
            return redirect('/');
        }
        else if (Request::isMethod('post'))
        {
        	if(Auth::check())
        	{
        		date_default_timezone_set('Asia/Jakarta');
        		$data = Input::all();
        		$date = date("Y-m-d H:i:s");
        		$link = str_replace("watch?v=","embed/",$data['link']);
        		$id = Video::where('id',$id)->update(array(
					'title' 		=> $data['title'],
					'link' 			=> $link, 
					'date' 			=> $date, 
				));
				Session::flash('status','update-success');
				return redirect('video');
        	}
        	return redirect('/');
        }
    }


    public function destroy($id) {
		if(Auth::check()) {
			Video::where('id', $id)->delete();
			Session::flash('status','deleted');
			return redirect('video');
		} 
		else {
			return redirect('/');
		}
	}
}
