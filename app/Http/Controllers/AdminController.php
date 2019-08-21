<?php

namespace App\Http\Controllers;

use App\Review;
use App\Place;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
    public function index(Request $req)
    {
    	    $scout = User::all()
    	                ->where('type','scout')
    	                ->where('validation','valid');
            $totalSco = $scout->count();
        
            $guser = User::all()
                        ->where('type','guser')
    	                ->where('validation','valid');

            $totalUser = $guser->count();
            
            $req = User::all()->where('validation','invalid');
            $totalReq = $req->count();
            
            $place = Place::all()->where('validation','unpublished');
            $totalPlace = $place->count();
            
            /*$department = Department::all();
            $totalDept = $department->count();
            
            $service = Service::all();
            $totalSer = $service->count();

            $notice = Notice::all();
            $totalnote = $notice->count();*/
            
            return view('admin.index',['scout' => $totalSco, 'user' => $totalUser, 'reqest' => $totalReq, 'place' => $totalPlace]);

       
    
    }

     public function addscout()
    {
    	return view('admin.addScout');
    }

    public function createscout(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'username'=>'required|unique:users',
            'password'=>'required|min:4',
            'name'=>'required',
            'number'=>'required|numeric',
            'email'=> 'required|regex:/^.+@.+$/i',
            'address'=>'required',
            'confirmPassword'=>'required|same:password',
            'picture' => 'required',
        ])->validate();

        if($req->hasFile('picture')){
          
           $file = $req->file('picture');
           echo "<br>File Mime Type: ".$file->getMimeType();

        if($file->getMimeType() == 'image/jpeg'){
           
            $user  = new User();
            $user->username = $req->username; 
            $user->password = $req->password;
            $user->validation = 'valid';
            $user->type = 'scout';
            $user->name = $req->name;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Scout Successfully Added");
            
            return redirect()->route('admin.addscout');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('admin.addscout');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('admin.addscout');

        }
    }

     public function scoutlist(Request $req)
    {
             $scout = User::all()
                      ->where('type','scout')
                      ->where('validation','valid');

             return view('admin.ScoutList',['scout'=>$scout]);        
    }

    public function editscout($sid)
    {
    	       $user = User::Find($sid);
	           return view('admin.editScout', ['user' => $user]);
    }

	public function editSco(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required'

        ])->validate();

	            $user = User::find($sid);
	            $user->name = $req->name; 
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            $user->save();
	            
		        return redirect()->route('admin.scoutlist');

}


     public function deletescout($sid){
    	
    	$s = User::find($sid);
    	return view('admin.deleteScout', ['d'=> $s]);
    	
    }


    public function destroydoct($sid){
       
        User::destroy($sid);
        return redirect()->route('admin.scoutlist');
      
    }
   
   //General User

     public function adduser()
    {
    	return view('admin.addUser');
    }

    public function createuser(Request  $req)
    {
    	$validation = Validator::make($req->all(), [

            'username'=>'required|unique:users',
            'password'=>'required|min:4',
            'name'=>'required',
            'number'=>'required|numeric',
            'email'=> 'required|regex:/^.+@.+$/i',
            'address'=>'required',
            'confirmPassword'=>'required|same:password',
            'picture' => 'required',
        ])->validate();

        if($req->hasFile('picture')){
          
           $file = $req->file('picture');
           echo "<br>File Mime Type: ".$file->getMimeType();

        if($file->getMimeType() == 'image/jpeg'){
           
            $user  = new User();
            $user->username = $req->username; 
            $user->password = $req->password;
            $user->validation = 'valid';
            $user->type = 'user';
            $user->name = $req->name;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "User Successfully Added");
            
            return redirect()->route('admin.adduser');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('admin.adduser');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('admin.adduser');

        }
    }

     public function userlist(Request $req)
    {
             $user = User::all()
                      ->where('type','guser')
                      ->where('validation','valid');

             return view('admin.UserList',['user'=>$user]);        
    }

    public function edituser($sid)
    {
    	       $user = User::Find($sid);
	           return view('admin.editUser', ['user' => $user]);
    }

	public function editUse(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required'

        ])->validate();

	            $user = User::find($sid);
	            $user->name = $req->name; 
	            $user->number = $req->number;
	            $user->email = $req->email;
	            $user->address = $req->address;
	            $user->save();
	            
		        return redirect()->route('admin.userlist');

}


     public function deleteuser($sid){
    	
    	$s = User::find($sid);
    	return view('admin.deleteUser', ['d'=> $s]);
    	
    }


    public function destroyuser($sid){
       
        User::destroy($sid);
        return redirect()->route('admin.userlist');
      
    }
    
    //Request 

    public function requestlist()
    {
       $request = User::all()->where('validation','invalid');
	   return view('admin.RequestList',['user'=>$request]);
    	
    }
    public function reqvalid(Request $req, $sid)
    {
       $user = User::find($sid);

       $user->validation = 'valid';
	   $user->save();
	   
	   return redirect()->route('admin.requestlist');	
    }

    public function deletereq($sid)
    {
    	User::destroy($sid);
        return redirect()->route('admin.requestlist');
      
    }

    //Profile Part Starts

    public function profile(Request $req)
    {

       $uname = $req->session()->get('id');
      
       $profile = User::Find($uname);
     
       return view('admin.editProfile', ['profile' => $profile]);
       
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
	            
		        return redirect()->route('admin.profile');
 
    }

    //Profile  Part Ends

    //Change Password

    public function cngpassword()
    {
        return view('admin.CngPassword');
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
	            
		        return redirect()->route('admin.cngpassword');
 
        }

        else
        {
        	 $req->session()->flash('msg2', "Previous Password Doesn't Matched");
	         return redirect()->route('admin.cngpassword');    
        } 
       
    }

    //Place Request 
    public function placereqlist()
    {
       $request = Place::all()->where('validation','unpublished');
	   return view('admin.PlaceRequestList',['place'=>$request]);
    	
    }
    public function placereqvalid(Request $req, $sid)
    {
       $user = Place::find($sid);

       $user->validation = 'published';
	   $user->save();
	   
	   return redirect()->route('admin.placereqlist');	
    }

    public function deleteplacereq($sid)
    {
    	Place::destroy($sid);
        return redirect()->route('admin.placereqlist');
      
    }

    public function editreqplace($sid)
    {
    	       $place = Place::Find($sid);
	           return view('admin.editReqPlace', ['user' => $place]);
    }

	public function editreqPla(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'cost'=>'required|numeric',
            'country'=> 'required',
            'history'=>'required',
            'medium'=>'required',

        ])->validate();

	            $user = Place::find($sid);
	            $user->validation = 'published'; 
	            $user->cost = $req->cost;
	            $user->country = $req->country;
	            $user->history = $req->history;
	            $user->medium = $req->medium;
	            $user->save();
	            
		        return redirect()->route('admin.placereqlist');

}
//Place List 
    public function showplacelist()
    {
       $request = Place::all()->where('validation','published');
	   return view('admin.PlaceList',['place'=>$request]);
    	
    }

    public function admindeleteplace($sid)
    {
    	Place::destroy($sid);
        return redirect()->route('admin.showplacelist');
      
    }

    public function admineditplace($sid)
    {
    	       $place = Place::Find($sid);
	           return view('admin.editPlace', ['user' => $place]);
    }

	public function admineditPla(Request $req, $sid)
    {
	
	  $validation = Validator::make($req->all(), [

            'cost'=>'required|numeric',
            'country'=> 'required',
            'history'=>'required',
            'medium'=>'required',

        ])->validate();

	            $user = Place::find($sid);
	            $user->validation = 'published'; 
	            $user->cost = $req->cost;
	            $user->country = $req->country;
	            $user->history = $req->history;
	            $user->medium = $req->medium;
	            $user->save();
	            
		        return redirect()->route('admin.showplacelist');

}

public function usercomment(Request $req)
    {
             $user = User::all()->where('type','user'); 
             return view('admin.UserComment',['user'=>$user]);        
    }

    public function deletecomment($sid)
    {
    	$user = User::find($sid);
	            
	            $user->comment = null; 
	            $user->placeid = null;
	            
	            $user->save();
	            
        return redirect()->route('admin.usercomment');
      
    }

}
