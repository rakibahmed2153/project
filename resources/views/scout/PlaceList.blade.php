@extends('scout.layout.main')


@section('Name')
   Place/PlaceList
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
                       <h1 class="text-center">Place Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>Place Name</b></td>
                              <td><b>Country Name</b></td>
                              <td><b>Short History</b></td>
                              <td><b>Total Cost</b></td>
                              <td><b>Travel Medium</b></td>
                              <td><b>Status</b></td>
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                              
                            
                          @foreach($place as $d)

                            <tr>
                              <td>{{$d['name']}}</td>
                              <td>{{$d['country']}}</td>
                              <td>{{$d['history']}}</td>
                              <td>{{$d['cost']}}</td>
                              <td>{{$d['medium']}}</td>
                              <td>{{$d['validation']}}</td>
                              <td>
                                <a href="{{route('scout.editplace', $d['id'])}}" style="color: blue;">Edit</a>
                              </td>
                            </tr>

                            
                            @endforeach 
                            </tbody>
                  </table>

                  </div>  
@endsection
