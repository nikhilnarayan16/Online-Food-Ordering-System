<?php
session_start();


if (isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    include('db.php');
    $query = "SELECT * FROM customer WHERE customer_id = '$id'";  
    $result = mysqli_query($conn, $query);  
   
    $row = mysqli_fetch_array($result);
    $name=$row['name'];
$phone = $row['phone'];
$address=$row['address'];

}
else {
  header('Location: login.php');
  die();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer Login</title>
   
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="hackstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://www.gstatic.com/firebasejs/5.4.0/firebase.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
  
  table, th, td{
    color: white;
  }
  td{
    font-weight: bold;
    font-size: 15px;
    text-align: center;
  }
  table {
    margin-left: 240px;
    text-align: center;
  }
 
</style>

</head>

<body style="background-image: url(13.png)">
<div class = 'row'>
<div class = 'block'><h2 style="color: white; font-family: Times New Roman;"><strong>ANGEETHI FAMILY RESTAURANT</strong></h2></div>
</div>

<div id="menu-nav" style="background-color: transparent; box-shadow: 1px 1px 1px 1px #ffffff;">
  <div id="navigation-bar">
    <ul>
      <li class="active"><a href="home.php" style="color: #ffffff;"><i class="fa fa-home"></i><span><strong>Home</strong></span></a></li>
      <li><a href="profile.php" style="color: #ffffff;"><i class="fa fa-user"></i><span><strong>Profile</strong></span></a></li>
      <li><a href="menu.php" style="text-decoration: none; color: #ffffff;"><i class="fa fa-list"></i><span style="color: #ffffff;"><strong>Menu</strong></span></a></li>
      <li><a href="cart.php" style="color: #ffffff;"><i class="fa fa-shopping-cart"></i><span onclick="myfun();" style="color: #ffffff;" ><strong>Cart</strong></span></a></li>
      <li><a href="order.php"><i class="fa fa-edit" style="color: #ffffff;"></i><span style="color: #ffffff;"><strong>My Order</strong></span></a></li>
      <li><a href="logout.php" style="color: #ffffff;"><i class="fa fa-sign-out"></i><span style="color: #ffffff;"><strong><?php echo $name; ?></strong></span></a></li>

      </ul>
  </div>
</div>
       <!--<div>
         <img src="logo.png" style="height: 150px; width: 150px; margin-top: 30px;margin-left: 35px;">
       </div>-->   
      <div id="home_content" style="background-color: transparent; width: 60%; margin: 10px auto; box-shadow: 1px 2px 13px 2px #212529;">
  <?php
$query = "SELECT * FROM cart"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

echo "<table>"; // start a table tag in the HTML
$total=0;
while($row = mysqli_fetch_array($result)){ 
 
 $total+=$row['item_cost'];

  //Creates a loop to loop through results
echo "<tr><td>" . $row['item_name'] . "</td><td>" . $row['item_cost'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
?>
<h4 style="text-align: center; color: #ffffff">Total Bill: <?php echo $total; ?></h4>
 <form action='placeorder.php' method="POST">
 
<center><input type="submit" name="submit" id="submit" value="Place Order" style="width: 100px; margin-top: 1em; margin-bottom: 1em;"></center>

 </form>

 <form action="menu.php" method="POST">
  <center><input type="submit" name="submit" id="submit" value="Add More Items" style="width: 100px; margin-top: 1em; margin-bottom: 1em;"></center>
</form>

    </div>

</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>

