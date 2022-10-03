<?php
if(isset($_POST['signup'])){
    $showalert = false;
    $showerror = false;
    require 'partials/_dbconnect.php';
    //echo "true";
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $conpassword = $_POST['confirmpassword'];
    $exists = false;
    $flag=0;

    if(($password == $conpassword) && $exists==false){
            $flag=1;
            $sql1 = "SELECT * FROM `users` WHERE username = '$username'";
            $result = mysqli_query($conn,$sql1);
            $numExists = mysqli_num_rows($result);
            $hash = password_hash($password,PASSWORD_DEFAULT);
            if($numExists==0){
              $exists = false;
            $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
            $res = mysqli_query($conn,$sql);
            if($res){
                $showalert = true; //shows green dismissable alert indicating signed up sucessfully
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Signedup Sucessfully</strong> .
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
            else{
                $showerror = "passwords do not match";
            }
          }
          else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Account already exist</strong> .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
    }
    else{
      echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Passwords do not match .Confirm Password must be same as Password....</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    // if($showalert){
    //     echo '
    //     <div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Signedup Sucessfully</strong> .
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //     </div>';
    //     }
    // if($flag==0){
    //     echo '
    //     <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //     <strong>Passwords do not match .Confirm Password must be same as Password....</strong> 
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //     </div>';
    // }
    // if($exists){
    //   //echo $exists;
    //   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    //          <strong>Account already exist</strong> .
    //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //          </div>';
    // }
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
    <h1 class="text-center">Signup to our website</h1>
   </div>
   <form action="/Login system/signup.php" method="post">
    <div style="margin-left:18%;margin-right:18%";>
  <div class="mb-3 mx-3">
    <label for="uname" class="form-label">Username</label>
    <input type="text" maxlength="12" class="form-control" id="username" name="uname" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 mx-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 mx-3">
    <label for="InputPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmpassword">
    <div id="emailHelp" class="form-text">Please enter same password as above....</div>
  </div>
  <div class="mx-3">
  <button type="submit" class="btn btn-primary" name="signup">Signup</button>
   </div>
</div>
</form>
</body>

</html>