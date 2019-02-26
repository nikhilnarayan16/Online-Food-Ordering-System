<?php
session_start();
include('db.php');

      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo 'wrong';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($conn, $_POST["username"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           
           $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($conn, $query);  
               $row = mysqli_fetch_array($result);

           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
    $_SESSION['id']=$row['customer_id'];

      header("Location: home.php");
           }  
           else  
           {  
                    echo "<script>alert('Incorrect username and password')</script>";
   

           }  
      }  
    header("Location: login.php");
?>