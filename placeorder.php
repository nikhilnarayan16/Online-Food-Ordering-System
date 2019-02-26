<?php
session_start();


if (isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    include('db.php');
$query = "SELECT * FROM cart"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

$query = "SELECT SUM(item_cost) as totalcost from cart";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$total=$row['totalcost'];
//while($row = mysqli_fetch_array($result)){ 
 
 //$total+=$row['item_cost'];
//}

    $orderid="AR".rand(100,999);
    $query = "SELECT d.del_man_id FROM delivery_man d  INNER JOIN customer c on d.area_assign=c.address and c.customer_id='$id'";  
    $result = mysqli_query($conn, $query);  
   
    $row = mysqli_fetch_array($result);
    $did=$row['del_man_id'];


        $query = "INSERT INTO  order_table values ('$orderid','$id','$total','$did','PENDING')";  
    $result = mysqli_query($conn, $query);  
  $query = "TRUNCATE TABLE cart";  
    $result = mysqli_query($conn, $query);

header('Location:order.php');
}
else {
  header('Location: login.php');
  die();
}




?>