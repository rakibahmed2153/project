<?php

namespace App\Http\Controllers;

use App\Place;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoutController extends Controller
{
    public function index(Request $req)
    {
    	    $place = Place::all();
    	    $totalplace = $place->count();
            return view('scout.index', ['place' => $totalplace]);

       
    
    }

     public function addplace()
    {
    	return view('scout.addPlace');
    }

    public function createplace(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'name'=>'required|unique:places',
            'cost'=>'required|numeric',
            'country'=> 'required',
            'history'=>'required',
            'medium'=>'required',
            'picture' => 'required',
        ])->validate();

        if($req->hasFile('picture')){
          
           $file = $req->file('picture');
           echo "<br>File Mime Type: ".$file->getMimeType();

        if($file->getMimeType() == 'image/jpeg'){
           
            $user  = new Place();
            $user->validation = 'unpublished';
            $user->name = $req->name;
            $user->cost = $req->cost;
            $user->country = $req->country;
            $user->history = $req->history;
            $user->medium = $req->medium;
             $file->move('upload/places', $req->name.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Place Successfully Added");
            
            return redirect()->route('scout.addplace');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('scout.addplace');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('scout.addplace');

        }
    }

     public function placelist(Request $req)
    {
             $place = Place::all();
                   
             return view('scout.PlaceList',['place'=>$place]);        
    }

    public function editplace($sid)
    {
    	       $place = Place::Find($sid);
	           return view('scout.editPlace', ['user' => $place]);
    }

	public function editPla(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'cost'=>'required|numeric',
            'country'=> 'required',
            'history'=>'required',
            'medium'=>'required',

        ])->validate();

	            $user = Place::find($sid);
	            $user->validation = 'unpublished'; 
	            $user->cost = $req->cost;
	            $user->country = $req->country;
	            $user->history = $req->history;
	            $user->medium = $req->medium;
	            $user->save();
	            
		        return redirect()->route('scout.placelist');

}

//Profile Part Starts

    public function profile(Request $req)
    {

       $uname = $req->session()->get('id');
      
       $profile = User::Find($uname);
     
       return view('scout.editProfile', ['profile' => $profile]);
       
    }

    public function editProfile(Request $req)
    {
        $validation = Validator::make($req->all(), [

            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required'

        ])->validate();
            
                $sid = $req->session()->get('id');

	            $user = User::find($sid);
	            
	            $user->name = $req->name; 
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            
	            $user->save();
	            
	            $req->session()->flash('msg', "Profile Successfully Updated");
	            
		        return redirect()->route('scout.profile');
 
    }

    //Profile  Part Ends

    //Change Password

    public function cngpassword()
    {
        return view('scout.CngPassword');
    }

    public function Password(Request $req)
    {
        $validation = Validator::make($req->all(), [

            'old'=>'required',
            'new'=>'required',
            'confirm'=>'required|same:new'

        ])->validate();

        $sid = $req->session()->get('id');

        $user = User::all()->where('id', $sid)
                           ->where('password', $req->old);
        
        if(count($user) > 0)
        {

        	    $sid1 = $req->session()->get('id'); 
        	    $user1 = User::find($sid1);
                
                $user1->password = $req->new;
	            
	            $user1->save();
	            
	            $req->session()->flash('msg', "Password Successfully Changed");
	            
		        return redirect()->route('scout.cngpassword');
 
        }

        else
        {
        	 $req->session()->flash('msg2', "Previous Password Doesn't Matched");
	         return redirect()->route('scout.cngpassword');    
        } 
       
    }



}
