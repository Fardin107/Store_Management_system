<?php
    require('connection.php');
    require('myfunction.php');

       

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Store Product</title>
</head>
<body>
	<?php
         if (isset($_GET ['store_product_name'])){
         	$store_product_name         =$_GET['store_product_name'];
         	$store_product_quentity     =$_GET ['store_product_quentity'];
         	$store_product_entrydate         =$_GET['store_product_entrydate'];

         	$sql= "INSERT INTO store_product (store_product_name, store_product_quentity, store_product_entrydate) 
         	       VALUES ('$store_product_name', '$store_product_quentity', '$store_product_entrydate')";

         	if ($conn->query($sql) == TRUE){
         		 echo 'Data Inserted!';
         	}else{
         	    echo 'Data not Inserted!';
                
         	}
         	      
         }
         
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="GET">
		
		Product: <br>
		<select name= "store_product_name">
			<?php

               data_list('product', 'product_id', 'product_name'); 

			?>
			
		</select><br><br>

		Product Quentity: <br>
		<input type="text" name="store_product_quentity"><br><br>
		Store Entrydate : <br>
		<input type="date" name="store_product_entrydate"><br><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>