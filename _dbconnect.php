<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="users";
  $conn = mysqli_connect($servername,$username,$password,$dbname);
  //echo "sucessfully connected";
  echo "<br>";
  //echo $conn;
  if(!$conn){
    die("sorry we failed to connect: ".mysqli_connect_error());
  }
   //now this file can be included in any other file where we want a data base connection 
   // we can include it using include statement or require statement . 
   //include statement includes it in the file if the file exists else it shows that file doesnt exist and moves on
   //while require statement shows fatal eroor if the file doesnt exist.

   //include '_dbconnect.php';
   //require '_dbconnect.php';
  ?>

 