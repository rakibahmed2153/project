@extends('admin.layout.main')


@section('Name')
   PlaceRequest/EditRequestPlace
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <form method="post" enctype="multipart/form-data">
                        @csrf
                        <h2  class="text-center">Update Place Information</h2>
                        <hr>
                        
                        <label>Place Name</label>
   								<p>{{$user['name']}}</p>  
                          
   							<br>		
                        
                        <label>Country Name</label>
             						  <input type="text" class="form-control" name="country" placeholder="Enter The Country Name" value="{{$user['country']}}">  
                                              <br>
   						          <label>Short History</label>
                          <textarea class="form-control" rows="6" cols="500" name="history" placeholder="Enter Short History">{{$user['history']}}</textarea>
                                   <br>
                        <label>Cost</label>
                          <input type="text" class="form-control" name="cost" placeholder="Enter Total Cost" value="{{$user['cost']}}">  
                                              <br>
                        
                        <label>Travel Medium</label>
                          <input type="text" class="form-control" name="medium" placeholder="Enter Travel Medium" value="{{$user['medium']}}">  
                                              <br>
                           
                         <input type="submit" class="btn btn-primary" name="submit" value="Publish">
   						 						    <a href="{{route('admin.placereqlist')}}">
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