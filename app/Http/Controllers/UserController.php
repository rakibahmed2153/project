<?php

namespace App\Http\Controllers;

use App\Review;
use App\Place;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function index(Request $req)
    {
    	    $place = Place::all();
    	    $totalplace = $place->count();

    	   /* $wish = Place::all()->where('wishlist','wish');
    	    $totalwish = $wish->count();*/
            return view('user.index', ['place' => $totalplace]);

       
    
    }

    //Profile Part Starts

    public function profile(Request $req)
    {

       $uname = $req->session()->get('id');
      
       $profile = User::Find($uname);
     
       return view('user.editProfile', ['profile' => $profile]);
       
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
	            
		        return redirect()->route('user.profile');
 
    }

    //Profile  Part Ends

    //Change Password

    public function cngpassword()
    {
        return view('user.CngPassword');
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
	            
		        return redirect()->route('user.cngpassword');
 
        }

        else
        {
        	 $req->session()->flash('msg2', "Previous Password Doesn't Matched");
	         return redirect()->route('user.cngpassword');    
        } 
       
    }

    public function showpublishedplace()
    {
       //$request = Place::all()->where('validation','unpublished');
	   return view('user.PlaceList');
    	
    }

    public function placedetails($sid)
    {
    	       $user = Place::Find($sid);
	           return view('user.Placedetails', ['d' => $user]);
    }
   public function usercomment(Request $req, $sid){
       
        //$place = Place::Find($sid);

         $id = $req->session()->get('id');

	            $user = User::find($id);
	            
	            $user->comment = $req->comment; 
	            $user->placeid = $req->sid;

	            $user->save();
	            
	            
		        return redirect()->route('user.showpublishedplace');
 
      
    }

    public function wish(Request $req, $sid)
    {
    	 $id = $req->session()->get('id');

	            $user = User::find($id);
	            
	            $user->wishlist = $sid;

	            $user->save();
	    
	   return redirect()->route('user.wishlist');
    	
    }

 public function wishlist(Request $req)
 {
 	 $sid = $req->session()->get('id');
 	 $result = DB::table('users')->where('id', $sid)->get();

 	 $pid = $result[0]->wishlist;

 	 $place = Place::all()->where('id', $pid);

 	  return view('user.WishList',['place'=>$place]);
 }

public function search(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('places')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('cost', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('places')->where('validation','published')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->name.'</td>
         <td>'.$row->country.'</td>
         <td>'.$row->history.'</td>
         <td>'.$row->cost.'</td>

         <td>'.$row->medium.'</td>
         <td>
            <a href="/user/PlaceDetails/'.$row->id.'" style="color: blue;">Details</a> <br>
            <a href="/user/Wish/'.$row->id.'" style="color: red;">Add Wishlist</a>
                              </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       //'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    
    
}
