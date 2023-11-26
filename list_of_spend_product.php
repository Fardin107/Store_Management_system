<?php
    require('connection.php');
    $sql1= "SELECT * FROM product";
    $query1= $conn->query($sql1);

    $data_list= array();

    while($data1= mysqli_fetch_assoc($query1)){
          $product_id= $data1['product_id'];
          $product_name= $data1['product_name'];
          
          $data_list[$product_id] = $product_name;
  }

  session_start();

   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];

   if(!empty($user_first_name) && !empty($user_last_name)){


?>

<!DOCTYPE html>
<html>
<head>
	
	<title>List of Spend Product</title>
</head>
<body>
	<?php
         $sql= "SELECT * FROM spend_product";
         
         $query= $conn->query($sql);
         echo "<table border='1'><tr><th>Product Name</td><th>Quentity</th><th>Entrydate</th><th>Action</th> </tr>";
        while ( $data= mysqli_fetch_assoc($query)){
        	$spend_product_id        = $data ['spend_product_id'];
        	$spend_product_name      = $data ['spend_product_name'];
        	$spend_product_quentity  = $data ['spend_product_quentity'];
          $spend_product_entrydate = $data ['spend_product_entrydate'];

                  
            echo "<tr>
                      <td>$data_list[$spend_product_name]</td>
                      <td>$spend_product_quentity</td>
                      <td>$spend_product_entrydate</td>

                      <td><a href= 'edit_spend_product.php?id=$spend_product_id'>Edit</td> 
                   </tr>";
        }
          echo "</table>";
	?>

</body>
</html>
<?php
   }else{

    header('location:login.php');
   }
   
?>