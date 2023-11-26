<?php
    require('connection.php'); 
	require('myfunction.php');
    

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Add Users</title>
</head>
<body>
	<?php
         if (isset($_GET ['user_first_name'])){

         	$user_first_name   =$_GET['user_first_name'];
         	$user_last_name    =$_GET ['user_last_name'];
         	$user_email        =$_GET['user_email'];
         	$user_password     =$_GET['user_password'];


         	$sql= "INSERT INTO users (user_first_name, user_last_name, user_email, user_password) 
         	       VALUES ('$user_first_name', '$user_last_name', '$user_email', '$user_password')";

         	if ($conn->query($sql) == TRUE){
         		 echo 'Data Inserted!';
         	}else{
         	    echo 'Data not Inserted!';
                
         	}
			 if(isset($_POST['add']))
			 {
				 $user_first_name=$_POST['user_first_name'];
				 $user_last_name=$_POST['user_last_name'];
				 $user_email=$_POST['user_email'];
				 $user_password=$_POST['user_password'];
				 if(empty(user_first_name))
				 {
					 echo " user_first_name is empty";
				 }
				 else{
					$sql= "INSERT INTO users (user_first_name, user_last_name, user_email, user_password) 
         	       VALUES ('$user_first_name', '$user_last_name', '$user_email', '$user_password')";
				 }
				 
			 }
         	      
         }
         
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="GET">

		User's First Name: <br>
		<input type="text" name="user_first_name"><br><br>
		User's Last Name: <br>
		<input type="text" name="user_last_name"><br><br>
		User's Email: <br>
		<input type="email" name="user_email"><br><br>
		User's Password: <br>
		<input type="password" name="user_password"><br><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>
