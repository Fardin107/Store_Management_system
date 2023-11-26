<?php
   session_start();

   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];

   if(!empty($user_first_name) && !empty($user_last_name)){


?>
<!DOCTYPE html>
<html>
  <head>
	
	<title>Store Management System</title>
  <hr>
  </head>
    <body>
	 <i><h1>Store Management System</h1></i>
   <hr>
   <h2>Home</h2>
	 <h3><a href="list_of_category.php">Category</a></h3>
   <h3><a href="list_of_product.php">Product</a></h3>
   <h3><a href="list_of_entry_product.php">Available Product</a></h3>
   <h3><a href="list_of_spend_product.php">Sold Product</a></h3>
   <b><h2><a href="logout.php">Logout</a></h2></b>
   
    </body>
</html>
<?php
   }else{

   	header('location:login.php');
   }
   
?>