@extends('admin.layout.main')


@section('Name')
   User/UserList
@endsection
@section('Search')
  <!--  <form id="sidebar-search" action="page_search_results.html" method="post">
            <div class="input-group">
              <input type="text" id="search" name="search" placeholder="Search..">
              <button><i class="fa fa-search"></i></button>
            </div>
    </form> -->
@endsection
@section('Iteams')
               


<!-- Add Department -->
                  <div class="col-lg-12">
                       <h1 class="text-center">User Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>User Name</b></td>
                              <td><b>Email</b></td>
                              <td><b>Phone Number</b></td>
                              <td><b>Address</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($user as $d)

                            <tr>
                              <td>{{$d['id']}}</td>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['email']}}</td>
                              <td>{{$d['number']}}</td>
                              <td>{{$d['address']}}</td>
                              <td>
                                <a href="{{route('admin.edituser', $d['id'])}}" style="color: blue;">Edit</a> | 
                                <a href="{{route('admin.deleteuser', $d['id'])}}" style="color: blue;">Delete</a>
                              </td>
                            </tr>

                            
                            @endforeach 
                            </tbody>
                  </table>

                  </div>  
@endsection
