<?php
    require('connection.php');
    require('myfunction.php');

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Spend Product</title>
</head>
<body>
	<?php
         if (isset($_GET ['spend_product_name'])){

         	$spend_product_name         =$_GET['spend_product_name'];
         	$spend_product_quentity     =$_GET['spend_product_quentity'];
         	$spend_product_entrydate    =$_GET['spend_product_entrydate'];

         	$sql= "INSERT INTO spend_product (spend_product_name, spend_product_quentity, spend_product_entrydate) 
         	       VALUES ('$spend_product_name', '$spend_product_quentity', '$spend_product_entrydate')";

         	if ($conn->query($sql) == TRUE){
         		 echo 'Data Inserted!';
         	}else{
         	    echo 'Data not Inserted!';
                
         	}
         	      
         }
         
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="GET">
		
		Product: <br>
		<select name= "spend_product_name">
			<?php

               data_list('product', 'product_id', 'product_name'); 

			?>
			
		</select><br><br>

		Product Quentity: <br>
		<input type="text" name="spend_product_quentity"><br><br>
		Spepnd Entrydate : <br>
		<input type="date" name="spend_product_entrydate"><br><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>
