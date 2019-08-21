<!DOCTYPE html>
<html>
<head>
  <title>Registration Panal</title>
  <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
</head>
<body>
       
<div class="home">
    <div class="home_slider_container">
      <div class="home_content" style="margin-top: 150px;">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="col-lg-6">
                <h1>Registration</h1>
                <hr>
                <br>
                <form method="post" enctype="multipart/form-data">
                @csrf
                <label>Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter You Name">
                  <br>
                  <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter You Email Address">
                   <br>
                  <label>Phone Number</label>
                    <input type="text" class="form-control" name="number" placeholder="Enter You Phone Number">
                  <br>
                           <label>Address</label>
                               <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
                           <br>
                  <label>User Type</label>
                  <br>
                           
                      <select name="type" class="custom-select"  style="width: 100%;">
                      <option value="admin">Admin</option>

                      <option value="scout">Scout</option>

                      <option value="user">General User</option>
                                   
                    </select>
                   <label>Profile Picture</label>
                            <input type="file" class="form-control" name="picture"> 
                              
                          
                  <br>
                    <label>Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter A Unique Username">
                  <br>
                  <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter A Password">
                  <br>
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Enter The Password Again">
                                 <br>
                      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input style="background-color: red;" type="reset" class="btn btn-primary" name="reset" value="Reset">
                        
                </form>
                <a href="{{route('login.index')}}"><p>Login</p></a>
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
            </div>
          </div>
        </div>
        </div>
      </div>
  </div>
  

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>


</html>
