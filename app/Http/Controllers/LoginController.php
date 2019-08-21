<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function valid(Request $req){

      $result	= DB::table('users')->where('username', $req->username)
				 ->where('password', $req->password)
				 ->get();
      
      if(count($result) > 0)
      {
        if($result[0]->type == 'admin')
        { 
        	if($result[0]->validation == 'valid')
	    	{
            
  		//if(count($result) > 0){
			 $req->session()->put('id', $result[0]->id);
			$req->session()->put('username', $req->username);
			$req->session()->put('type', $result[0]->type);
			return redirect()->route('admin.index');
			}
				else
				{
				$req->session()->flash('msg', "Please Wait For Admin Validation");
				
				return redirect()->route('login.index');
		        }
		}
			
      
	    else if( $result[0]->type == 'scout')
	    {
	    	if($result[0]->validation == 'valid')
	    	{
                //if(count($result) > 0){
				 $req->session()->put('id', $result[0]->id);
				$req->session()->put('username', $req->username);
				$req->session()->put('type', $result[0]->type);
				$req->session()->put('name', $result[0]->name);
				return redirect()->route('scout.index');
				}
				else
				{
				$req->session()->flash('msg', "Please Wait For Admin Validation");
				
				return redirect()->route('login.index');
		        }
	    }
	    	
	    

	    else if( $result[0]->type == 'user')
	    {
	    	if($result[0]->validation == 'valid')
	    	{
               // if(count($result) > 0){
				 $req->session()->put('id', $result[0]->id);
				$req->session()->put('username', $req->username);
				$req->session()->put('type', $result[0]->type);
				$req->session()->put('name', $result[0]->name);
				return redirect()->route('user.index');
			}
			else
				{
				$req->session()->flash('msg', "Please Wait For Admin Validation");
				
				return redirect()->route('login.index');
		        }
	    	
	    }

	 } 

	 else
	 	{
				$req->session()->flash('msg', "Invalid UserName Or Password");
				
				return redirect()->route('login.index');
		        }
	}  

	public function registration()
	{

    	return view('registration.index');
	}

	public function create(Request $req){

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
            $user->validation = 'invalid';
            $user->type = $req->type;
            $user->name = $req->name;
            $user->number = $req->number;
            $user->email = $req->email;
            $user->address = $req->address;
             $file->move('upload/users', $req->username.'.jpeg');
            $user->save();
        
            $req->session()->flash('msg', "Request Successfully Send.
                                        Wait For Admin Approval");
            
            return redirect()->route('registration.index');


           
        }
           else{
           $req->session()->flash('msg2', "Please Upload jpeg File");
            
            return redirect()->route('registration.index');
           }
        }
       else{
           $req->session()->flash('msg2', "Picture Not Found");
            
         return redirect()->route('registration.index');

        }
    }



}
