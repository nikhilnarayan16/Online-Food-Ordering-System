<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "orderonline") or die ("Failed to connect");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Restaurant</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	var password;
	var pass1 = "manager";
	password = prompt('Enter Password to View Page', '');
	if(password==pass1)
		alert('Correct password, click ok to enter.');
	else{
		alert('Incorrect Password');
		window.location.href = "login.php";
	}
</script>

<style type="text/css">
	table,th,td{
		border: 1px solid white;
		color: white;
	}
	td{
		padding: 10px 15px 15px 10px;
	}

</style>
</head>
<body style="background-image: url(13.png); background-size: cover;">
<h1 style="text-align: center; color: white;">ANGEETHI FAMILY RESTAURANT</h1>

<div id="home_content" style="background-color: transparent; width: 59%; margin: 10px auto; box-shadow: 1px 2px 13px 2px #212529;">
  <?php
$query = "SELECT * FROM restaurant"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

echo "<table>"; // start a table tag in the HTML
echo "<tr> <td>Order id</td> <td>Customer id</td> <td>Item name</td> <td>Item cost</td> <td>Bill Price</td> <td>Delivery Man ID</td> <td>Status</td>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr> <td>".$row['order_id']."</td> <td>" . $row['customer_id'] . "</td><td>".$row['item_name']."</td> <td>" . $row['item_cost'] . "</td> <td>" . $row['bill_price'] . "</td> <td>" . $row['del_man_id'] . "</td> <td>" . $row['status'] . "</td> </tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
?> 
    </div>
<center>
    <div style="margin-top: 3em;">
    	<?php
    	$query= "SELECT bill_price from restaurant where bill_price >= all (SELECT bill_price from restaurant)";
    	$result = mysqli_query($conn,$query);
    	$row = mysqli_fetch_array($result);
    	$maxbill = $row['bill_price'];
    	echo "<p style ='font-size: 20px; font-weight:bold; color: white;margin-right: 28em;'>Maximum Bill: " .$maxbill. "</p>";
    	?>
    </div>
</center>
<center>
<button name="admin" type="submit" style="border-radius: 2px; padding: 13px 30px; margin-top: 2em; background-color: black;">
								<a href="login.php" style="color: white;">Login</a>
							</button></center>	

</body>
</html>