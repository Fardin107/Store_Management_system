<?php
    require('connection.php');   
    session_start();

    
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Login</title>
</head>
<body>
	<?php
	  if (isset($_POST ['user_email'])){

         	$user_email     =$_POST['user_email'];
         	$user_password  =$_POST['user_password'];

            $sql= "SELECT * FROM users WHERE user_email='$user_email' AND 
                   user_password='$user_password'";

            $query= $conn->query($sql);
            if(mysqli_num_rows($query) > 0 ){

            	$data = mysqli_fetch_array($query);

            	$user_first_name = $data['user_first_name'];
            	$user_last_name  = $data['user_last_name'];

            	$_SESSION['user_first_name'] = $user_first_name;
            	$_SESSION['user_last_name'] = $user_last_name;


            	header('location:index2.php');
            }else{

             echo 'user name or password required';
             }
         	      
         }
      
        
	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
	<i><h1>Admin Login</h1></i>


		User's Email: <br>
		<input type="email" name="user_email"><br><br>
		User's Password: <br>
		<input type="password" name="user_password"><br><br>
		<input type="submit" name="login">
	</form>
	

</body>
</html>

