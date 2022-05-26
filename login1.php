<?php 
 
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db_name ="sample";
 
 $conn = mysqli_connect($host, $user, $pass, $db_name);
 
 if(mysqli_connect_errno()){
     die("Failed to connect");
 }
 
 $username =$_POST['usern'];
 $password =$_POST['pass'];
 
 $sql ="select * from users where username='$username' AND password='$password'";
 
 $result =mysqli_query($conn, $sql);
 
 $count = mysqli_num_rows($result);
 
 if($count==1){
     echo "<h1>Login Successful</h1>";
     exit();}
 else{
     echo "<h1>Login Failed</h1>";
     exit();
 }
 
  
  ?>
 
 
 
 
 
 