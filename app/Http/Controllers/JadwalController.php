<?php
namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
use Session;
use App\Schedule;
use App\User;
use DateTime;

class JadwalController extends Controller
{
    public function index()
    {
    	if (Request::isMethod('get')) {
            if (Auth::check()) {
            	$scheds = Schedule::get();
                return view('admin.jadwal.manage',compact('scheds'));
            }
            return redirect('/');
        }
    }

    public function create()
    {
    	if (Request::isMethod('get')) {
            if (Auth::check()) {
                return view('admin.jadwal.create');
            }
            return redirect('/');
        }
        else if (Request::isMethod('post'))
        {
        	if(Auth::check())
        	{
        		$data = Input::all();
        		$start = DateTime::createFromFormat('d/m/Y', $data['start']);
        		$start = $start->format('Y-m-d');
        		$end = DateTime::createFromFormat('d/m/Y', $data['end']);
        		$end = $end->format('Y-m-d');
        		$id = Schedule::insertGetId(array(
					'title' 		=> $data['title'],
					'start' 		=> $start, 
					'end' 			=> $end, 
					//'description' 	=> $data['description']
				));
				Session::flash('status','success');
				return redirect('jadwal');
        	}
        	return redirect('/');
        }
    }

    public function update($id)
    {
    	if (Request::isMethod('get')) {
            if (Auth::check()) {
            	$sched = Schedule::find($id);
                return view('admin.jadwal.update',compact('sched'));
            }
            return redirect('/');
        }
        else if (Request::isMethod('post'))
        {
        	if(Auth::check())
        	{
        		$data = Input::all();
        		$start = DateTime::createFromFormat('d/m/Y', $data['start']);
        		$start = $start->format('Y-m-d');
        		$end = DateTime::createFromFormat('d/m/Y', $data['end']);
        		$end = $end->format('Y-m-d');
        		Schedule::where('id',$id)->update(array(
					'title' 		=> $data['title'],
					'start' 		=> $start, 
					'end' 			=> $end, 
					//'description' 	=> $data['description']
				));
				Session::flash('status','update-success');
				return redirect('jadwal');
        	}
        	return redirect('/');
        }
    }


    public function destroy($id) {
		if(Auth::check()) {
			Schedule::where('id', $id)->delete();
			Session::flash('status','deleted');
			return redirect('jadwal');
		} 
		else {
			return redirect('/');
		}
	}
}
