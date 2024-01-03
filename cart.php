<?php

session_start();


if(isset($_POST['add_to_cart'])){
	$id=$_POST['id'];
$name=$_POST['name'];
$rupee=$_POST['price'];
$quantity=$_POST['quantity'];

	if(isset($_SESSION['carr'])){
		
    $item=array_column($_SESSION['carr'], 'name');

if(in_array($_POST['name'],$item)){
	?>

    <script type="text/javascript">
    	alert("already exist");
    	window.location.href="index.php";
    </script>

	<?php
}


else{

$count=count($_SESSION['carr']);
	$_SESSION['carr'][$count]=array('name'=>$_POST['name'],'rupee'=>$_POST['price'],'quantity'=>$_POST['quantity']);
	?>

<script type="text/javascript">
	alert("item added");
	window.location.href="mycart.php";
</script>
	<?php
	}}
	else{
		$_SESSION['carr'][0]=array('name'=>$_POST['name'],'rupee'=>$_POST['price'],'quantity'=>$_POST['quantity']);
		print_r($_SESSION['carr']);
	}
}

if(isset($_POST['remove'])){
	foreach ($_SESSION['carr'] as $key=>$value) {
		if($value['name']==$_POST['item_name']){
		unset($_SESSION['carr'][$key]);
		$_SESSION['carr']=array_values($_SESSION['carr']);

		?>
<script type="text/javascript">
	alert("item remove");
	window.location.href="mycart.php";
</script>
		<?php
	}
}}

?>