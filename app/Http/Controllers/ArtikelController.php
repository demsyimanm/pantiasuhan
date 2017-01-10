<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Auth;
use Request;
use Input;
use Session;
use App\Post;
use App\User;

class ArtikelController extends Controller
{
    public function index()
    {
    	if (Request::isMethod('get')) {
            if (Auth::check()) {
            	$posts = Post::get();
                return view('admin.artikel.manage',compact('posts'));
            }
            return redirect('/');
        }
    }

    public function create()
    {
    	if (Request::isMethod('post')) {
            if (Auth::check()) {
            	date_default_timezone_set('Asia/Jakarta');
                $data = Input::all();
                $date = date("Y-m-d H:i:s");
                $uploadOk = 1;
                $target_dir = "poster/";
                $target_file = $target_dir . basename($_FILES["poster"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			    $check = getimagesize($_FILES["poster"]["tmp_name"]);
			    if($check !== false) 
			    {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } 
			    else 
			    {
			    	$uploadOk = 0;
			        Session::flash('status','not-image');
                	return redirect('artikel');
			    }
			    if ($_FILES["poster"]["size"] > 1000000) {
				    $uploadOk = 0;
				    Session::flash('status','too-large');
                	return redirect('artikel');
				}
			    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
			    {
			    	$uploadOk = 0;
				    Session::flash('status','wrong-format');
                	return redirect('artikel');
				}
			    $id = Post::insertGetId(array(
					'name' 			=> $data['name'], 
					'date' 			=> $date, 
					'description' 	=> $data['description'],

				));
				$target_dir = "poster/";
				$temp = explode(".", $_FILES["poster"]["name"]);
				$_FILES["poster"]["name"] =  $temp[0].'_'.$id.'.' . end($temp);
				$target_file = $target_dir . basename($_FILES["poster"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			    $check = getimagesize($_FILES["poster"]["tmp_name"]);
			    if($check !== false) 
			    {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } 
			    else 
			    {
			    	$uploadOk = 0;
			        Session::flash('status','not-image');
                	return redirect('artikel');
			    }
			    if ($_FILES["poster"]["size"] > 1000000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				    Session::flash('status','too-large');
                	return redirect('artikel');
				}
			    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
			    {
			    	$uploadOk = 0;
				    Session::flash('status','wrong-format');
                	return redirect('artikel');
				}
				if ($uploadOk == 0) 
				{
				   	Session::flash('status','failed-upload');
                	return redirect('artikel');
				} 
				else 
				{
				    if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) 
				    {
				        echo "The file ". basename( $_FILES["poster"]["name"]). " has been uploaded.";
				    } 
				    else 
				    {
				        Session::flash('status','failed-upload');
                		return redirect('artikel');
				    }
				}

				$update = Post::where('id',$id)->update(array(
					'poster' 		=> 'poster/'. $_FILES["poster"]["name"],

				));
				if($id > 0 and $update != 0 && $uploadOk != 0)
				{
					Session::flash('status','success');
	                return redirect('artikel');
				}
				else
				{
					Session::flash('status','failed');
	                return redirect('artikel');
				}
            }
        }
        else if (Request::isMethod('get')) {
            if (Auth::check()) {
                return view('admin.artikel.create');
            }
            return redirect('/');
        }
    }

    public function update($id)
    {
    	if (Request::isMethod('post')) {
    		date_default_timezone_set('Asia/Jakarta');
            if (Auth::check()) {
                $data = Input::all();
                $date = date("Y-m-d H:i:s");
                if(!isset($data['poster']))
                {
                	$id = Post::where('id',$id)->update(array(
						'name' 			=> $data['name'], 
						'description' 	=> $data['description'],
					));
                	Session::flash('status','update-success');
	                return redirect('artikel');

                }
                $post = Post::find($id);
				$filename = $post->poster;
				if (file_exists($filename)) {
				  unlink($filename);
				  echo 'File '.$filename.' has been deleted';
				} 
				else 
				{
				  echo 'Could not delete '.$filename.', file does not exist';
				}
				$target_dir = "poster/";
				$temp = explode(".", $_FILES["poster"]["name"]);
				$_FILES["poster"]["name"] =  $temp[0].'_'.$id.'.' . end($temp);
				$target_file = $target_dir . basename($_FILES["poster"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			    $check = getimagesize($_FILES["poster"]["tmp_name"]);
			    if($check !== false) 
			    {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } 
			    else 
			    {
			    	$uploadOk = 0;
			        Session::flash('status','not-image');
                	return redirect('artikel');
			    }
			    if ($_FILES["poster"]["size"] > 1000000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				    Session::flash('status','too-large');
                	return redirect('artikel');
				}
			    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
			    {
			    	$uploadOk = 0;
				    Session::flash('status','wrong-format');
                	return redirect('artikel');
				}
				if ($uploadOk == 0) 
				{
				   	Session::flash('status','failed-upload');
                	return redirect('artikel');
				} 
				else 
				{
				    if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) 
				    {
				        echo "The file ". basename( $_FILES["poster"]["name"]). " has been uploaded.";
				    } 
				    else 
				    {
				        Session::flash('status','failed-upload');
                		return redirect('artikel');
				    }
				}

				$update = Post::where('id',$id)->update(array(
					'name' 			=> $data['name'], 
					'description' 	=> $data['description'],
					'poster' 		=> 'poster/'. $_FILES["poster"]["name"],

				));
				if($update != 0 && $uploadOk != 0)
				{
					Session::flash('status','update-success');
	                return redirect('artikel');
				}
				else
				{
					Session::flash('status','upadate-failed');
	                return redirect('artikel');
				}
            }
        }
        else if (Request::isMethod('get')) {
            if (Auth::check()) {
            	$post = Post::find($id);
                return view('admin.artikel.update', compact('post'));
            }
            return redirect('/');
        }
    }

    public function destroy($id) {
		if(Auth::check()) {
			$post = Post::find($id);
			$filename = $post->poster;
			if (file_exists($filename)) {
			  unlink($filename);
			  echo 'File '.$filename.' has been deleted';
			} 
			else 
			{
			  echo 'Could not delete '.$filename.', file does not exist';
			}
			Post::where('id', $id)->delete();
			Session::flash('status','deleted');
			return redirect('artikel');
		} 
		else {
			return redirect('/');
		}
	}
}
