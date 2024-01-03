<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


<div>
	<table>
		<thead>
			<th>serial no</th>
			<th>name</th>
			<th>price</th>
			<th>quantity</th>
			
		</thead>
		<?php
		$total=0;

         if(isset($_SESSION['carr'])){

         	foreach ($_SESSION['carr'] as $key => $value) {
         		$quan=$value['quantity'];
         		$money= $value['rupee'] * $quan;
         		$total=$total  + $money;
         		
         		?>

		<tbody>
			<td><?php echo $key+1;?></td>
			<td><?php echo $value['name'];?></td>
			<td><?php echo $money;?></td>
			<td><?php echo $quan;?></td>
			<td>
				<form method="post" action="cart.php">
					<button name="remove">Remove</button>
					<input type="hidden" name="item_name" value="<?php echo $value['name'];?>">
				</form>

			</td>
	<?php
         	}
         }

		?>
		</tbody>
	</table>
</div>

<div>
	<h1>total:<?php echo $total;?></h1>
</div>
</body>
</html>