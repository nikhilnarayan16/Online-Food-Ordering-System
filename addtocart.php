<?php
session_start();


if (isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    include('db.php');

    $item=$_POST['item'];
    $qty=$_POST['qty'];
if(!empty($item )&& !empty($qty))

{

    $query = "SELECT * FROM menu WHERE item_name = '$item'";  
    $result = mysqli_query($conn, $query);  
    $row = mysqli_fetch_array($result);
    $price=$row['price'];

$item_price=$price*$qty;

        $query = "REPLACE INTO  cart values ('$id','$item','$item_price')";  
    $result = mysqli_query($conn, $query);  
  $query = "REPLACE INTO  tempcart values ('$id','$item','$item_price')";  
    $result = mysqli_query($conn, $query);
}
header('Location:cart.php');
}
else {
  header('Location: login.php');
  die();
}

?>