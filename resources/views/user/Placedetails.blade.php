@extends('user.layout.main')


@section('Name')
   Place Details/Place Details
@endsection


@section('Iteams')
    <div class="col-lg-6" style="margin-left: 260px;">   
    <h1 class="text-center">Place Details Information</h1>
    <hr>        
<table class="table table-striped table-bordered">
    <tr>
      <td>Picture</td>
      <td><img style="height: 200px; width: 300px;" src="{{asset('upload')}}/places/{{$d['name']}}.jpeg" alt="Profile Pic"></td>
    </tr>
   
    <tr>
      <td>Place Name  </td>
      <td>{{$d['name']}}</td>
    </tr>
    
    <tr>
      <td>Country Name </td>
      <td>{{$d['country']}}</td>
    </tr>
    
    
    <tr>
      <td>Total Cost  </td>
      <td>{{$d['cost']}}</td>
    </tr>
    
    <tr>
      <td>Travel Medium</td>
      <td>{{$d['medium']}}</td>
    </tr>
   <tr>
      <td>Short History  </td>
      <td>{{$d['history']}}</td>
    </tr>
   
    
  </table>
  
  <form method="post">
    @csrf
    <h5>Comments</h5>
    <input type="hidden" name="sid" value="{{$d['name']}}">
    <textarea class="form-control" rows="6" cols="500" name="comment" placeholder="Enter Your Comment"></textarea>
<br>
    <a href="{{route('user.showpublishedplace')}}">
      <input type="button" value="Cancel">
    </a>
    <input type="submit" name="delete" value="Comment">
  </form>
  <div style="color: green;">
                           {{session('msg')}}
                         </div>
                        
  </div>
@endsection