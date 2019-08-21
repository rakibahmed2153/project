@extends('user.layout.main')


@section('Name')
   Place/PlaceList
@endsection
@section('Search')
    <form id="sidebar-search">
            <div class="input-group">
              <input type="text" id="search" name="search" placeholder="Search..">
              <button><i class="fa fa-search"></i></button>
            </div>
    </form>
@endsection
@section('Iteams')
               
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                  
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
                              <td><b>Action</b></td>
                            </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                  </table>

                  </div>

                     <script>
                    $(document).ready(function(){

                     fetch_data();

                     function fetch_data(query = '')
                     {
                      $.ajax({
                       url:"{{ route('user.search') }}",
                       method:'GET',
                       data:{query:query},
                       dataType:'json',
                       success:function(data)
                       {
                        $('tbody').html(data.table_data);
                        }
                      })
                     }

                     $(document).on('keyup', '#search', function(){
                      var query = $(this).val();
                      fetch_data(query);
                     });
                    });
                    </script>

  
@endsection
