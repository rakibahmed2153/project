@extends('admin.layout.main')


@section('Name')
    Request List
@endsection
@section('Search')
    <!-- <form id="sidebar-search">
            <div class="input-group">
              <input type="text" id="search" name="search" placeholder="Search..">
              <button><i class="fa fa-search"></i></button>
            </div>
    </form> -->
@endsection
@section('Iteams')
               

                  <div class="col-lg-12">
                       <h1 class="text-center">Requested Place Lists</h1>
                       <hr>
                          <br>

                           <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                              <td><b>ID</b></td>
                              <td><b>Name</b></td>
                              <td><b>Type</b></td>
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
                              <td>{{$d['type']}}</td>
                              <td>{{$d['email']}}</td>
                              <td>{{$d['number']}}</td>
                              <td>{{$d['address']}}</td>
                              <td>
                                <a href="{{route('admin.reqvalid', $d['id'])}}" style="color: blue;">Valid</a> | 
                                <a href="{{route('admin.deletereq', $d['id'])}}" style="color: blue;">Delete</a>
                              </td>
                            </tr>

                            
                            @endforeach 
                         
                            
                            </tbody>
                  </table>

                  </div>  

                  <!-- <script>
                    $(document).ready(function(){

                     fetch_customer_data();

                     function fetch_customer_data(query = '')
                     {
                      $.ajax({
                       url:"",
                       method:'GET',
                       data:{query:query},
                       dataType:'json',
                       success:function(data)
                       {
                        $('tbody').html(data.table_data);
                        //$('#total_records').text(data.total_data);
                       }
                      })
                     }

                     $(document).on('keyup', '#search', function(){
                      var query = $(this).val();
                      fetch_customer_data(query);
                     });
                    });
                    </script>
 -->
@endsection
