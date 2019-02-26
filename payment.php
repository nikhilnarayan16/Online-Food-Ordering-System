<?php
session_start();


if (isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    include('db.php');
$query="UPDATE order_table set status='CONFIRMED' where customer_id='$id'";
    $result = mysqli_query($conn, $query);  

        //$query = "TRUNCATE TABLE tempcart;";  
    //$result = mysqli_query($conn, $query);  


header('Location:order.php');
}
else {
  header('Location: login.php');
  die();
}




?>