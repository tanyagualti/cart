<?php
$conn=mysqli_connect("localhost","root","","zonywillss");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
$sql="select * from item";
$result=mysqli_query($conn,$sql);

 
 if(mysqli_num_rows($result)>0){

while($rows=mysqli_fetch_assoc($result)){
 	?>
 	<form action="cart.php" method="post">
<h1><?php echo $rows['i_name'];?></h1>
<p>Rs.<?php echo $rows['i_rupee'];?></p>
<input type="submit" name="add_to_cart" value="Add to Cart">
<input type="hidden" name="id" value="<?php echo $rows['i_id'];?>">
<input type="hidden" name="name" value="<?php echo $rows['i_name'];?>">
<input type="hidden" name="price" value="<?php echo $rows['i_rupee'];?>">
<input type="number" name="quantity" value="0">
</form>
 	<?php

 }
}
	?>


</body>
</html>