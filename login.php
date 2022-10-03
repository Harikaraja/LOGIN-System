<?php
if(isset($_POST['signup'])){
    $login = false;
    $showerror = false;
    require 'partials/_dbconnect.php';
    //echo "true";
    $username = $_POST['uname'];
    $password = $_POST['password'];
            $flag=0;
            $sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
            $sql = "SELECT * FROM `users` WHERE username = '$username'";
            $res = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($res);
            if($num==1){
                while($row=mysqli_fetch_assoc($res)){
                  //nenu enter chesina password ki select * chesinappudu vachhina anni records lo edaina password ki match 
                  //ayithey below code executes....
                  if(password_verify($password,$row['password'])){
                    $login = true;
                    $flag=1;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$username;
                    header("location: welcome.php");
                  }
                }  
            }
            else{
                $showerror = "passwords do not match";
                $flag=0;
            }
    //echo "error is: ".$showerror;
    if($login){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Login Sucessfull</strong> .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    if($flag==0){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed to Login.Recheck and try again..</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SignUp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php
     require "partials/_nav.php";
  ?>

  <div class="container">
    <h1 class="text-center">Login to our website</h1>
   </div>
   <form action="/Login system/login.php" method="post">
    <div style="margin-left:18%;margin-right:18%";>
  <div class="mb-3 mx-3">
    <label for="uname" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="uname" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 mx-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mx-3">
  <button type="submit" class="btn btn-primary" name="signup">LOGIN</button>
   </div>
</div>
</form>
</body>

</html>