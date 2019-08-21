@extends('admin.layout.main')


@section('Name')
   User/EditUser
@endsection

@section('Iteams')
               


                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update User Information</h2>
                        <hr>
                        
                        <label>User Name</label>
   								<input type="text" class="form-control" name="name" value="{{$user['name']}}">  
                          
   							<br>		
                        
                        <label>Email</label>
             						  <input type="text" class="form-control" name="email" placeholder="Enter The Department Name" value="{{$user['email']}}">  
                                              <br>
   						          <label>Phone Number</label>
                          <input type="text" class="form-control" name="number" placeholder="Enter The Department Name" value="{{$user['number']}}">  
                                              <br>
                        <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter The Department Name" value="{{$user['address']}}">  
                                              <br>
    
                           
                         <input type="submit" class="btn btn-primary" name="submit" value="Submit">
   						 						    <a href="{{route('admin.userlist')}}">
                           <input type="button" value="Cancel">
                            </a>
   							      
   							    
                      </form>

                      <br>
								<br>
                         <div style="color: green;">
                           {{session('msg')}}
                         </div>
                        
                          <div style="color: red;">
                           {{session('msg2')}}
                         </div>
                  
								<div style="color: red;">

                                   @foreach($errors->all() as $err)
									{{$err}} <br>
								   @endforeach
                                </div>

                  </div>  
@endsection