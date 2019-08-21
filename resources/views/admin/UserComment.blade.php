@extends('admin.layout.main')


@section('Name')
   Comment/CommentList
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
               
                  <div class="col-lg-12">
                       <h1 class="text-center">Comment Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>User Name</b></td>
                              <td><b>Place id</b></td>
                              <td><b>User Comment</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                          
                          @foreach($user as $d)
                             @if($d['comment'])
                            <tr>
                              <td>{{$d['name']}}</td> 
                              <td>{{$d['placeid']}}</td>
                              <td>{{$d['comment']}}</td>
                              <td><a href="{{route('admin.deletecomment', $d['id'])}}" style="color: red;">Delete</a></td>
                            </tr>

                            @endif
                            @endforeach 
                            </tbody>
                  </table>

                  </div>  
@endsection
