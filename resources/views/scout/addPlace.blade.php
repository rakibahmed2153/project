@extends('scout.layout.main')


@section('Name')
   Place/AddPlace
@endsection

@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-6" style="margin-left: 260px;">
                      <h1 class="text-center">Add New Place</h1>
                      <hr>
                      <form method="post" enctype="multipart/form-data">
                @csrf
                <label>Place Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter You Name">
                  <br>
                  <label>Country Name</label>
                    <input type="text" class="form-control" name="country" placeholder="Enter The Country Name">
                   <br>
                  <label>Short History</label>
                     <textarea class="form-control" rows="6" cols="500" name="history" placeholder="Enter Short History"></textarea>
               
                  <br>
                           <label>Travel Medium</label>
                               <input type="text" class="form-control" name="medium" placeholder="Enter Travel Medium">
                           <br>
                           <label>Total Cost</label>
                    <input type="text" class="form-control" name="cost" placeholder="Enter Total Cost">
                   <br>
                  
                  
                  <br>
                     <label>Picture</label>
                     <input type="file" class="form-control" name="picture"> 
                    
                                 <br>
                      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input style="background-color: red;" type="reset" class="btn btn-primary" name="reset" value="Reset">
                        
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