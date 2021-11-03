<?php
session_start();
include("connect.php");

if(isset($_POST["login"])){
//
  $email= $_POST["email"];
  $password = md5($_POST["password"]);
  //Nếu tồn tại click remember
  if(isset($_POST["remember"])){
    setcookie("email",$email);
    setcookie("password",$_POST["password"]);
  }

//LỆNH SQL
$sql_login = "SELECT * FROM users WHERE email='$email' AND password = '$password' ";

  $result = mysqli_query($conn,$sql_login);
  $row = mysqli_fetch_row($result);
  if(count($row))
  {
    $_SESSION["login"] = $row;
  }
}

//ád
$email="";
$password="";
$check = false;
if(isset($_COOKIE["email"]) && isset($_COOKIE["password"])){
  $email=$_COOKIE["email"];
  $password=$_COOKIE["password"];
  $check = true;

}
if($email == 'email' && $password =='pass'){
  $_SESSION["email"] = $email;
  header('location:..');
}else{
  
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <section class="vh-200 gradient-custom">
      <div class="container py-5 h-200">
        <div class="row d-flex justify-content-center align-items-center h-200">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                <form method="post">
                <div class="mb-md-5 mt-md-4 pb-5">
    
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your email and password!</p>
    
                  <div class="form-outline form-white mb-4">
                    <input type="email" id="email" class="form-control form-control-lg" 
                    value = <?php 
                                  echo $password
                              ?>/>/>
                    <label class="form-label" for="email">Email</label>
                  </div>
    
                  <div class="form-outline form-white mb-4">
                    <input type="password" id="password" class="form-control form-control-lg" 
                    value = <?php 
                                  echo $password
                              ?>/>
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="form-group">
                  <label class = "custom-control custom-checkbox">
                    <input <?php echo ($check)?"checked":""?>class="custom-control-input" type="checkbox" name="remember" value="1">
                    <span class="custom-control-label">Remember Me</span>
                  </label>
                
                </div>
    
                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="http://127.0.0.1:5500/btl2/register.html#!">Register Here</a></p>
    
                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>
                </form>
                  <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                    <a href="#!" class="text-white"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                    <a href="#!" class="text-white"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                  </div>
    
                </div>
    
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>