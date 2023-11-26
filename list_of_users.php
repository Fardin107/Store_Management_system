<?php
    require('connection.php');

    session_start();

   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];

   if(!empty($user_first_name) && !empty($user_last_name)){

   
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>List of Users</title>
</head>
<body><hr>
<a href="index2.php"><button>Back</button></a><hr>
<br>
	<?php
         $sql= "SELECT * FROM users";
         
         $query= $conn->query($sql);
         echo "<table border='1'><tr><th>First Name</td><th>Last Name</th><th>Email</th><th>Action</th></tr>";
        while ( $data= mysqli_fetch_assoc($query)){

          $user_id          = $data ['user_id'];
        	$user_first_name  = $data ['user_first_name'];
        	$user_last_name   = $data ['user_last_name'];
        	$user_email       = $data ['user_email'];
                  
            echo "<tr>
                      <td>$user_first_name</td>
                      <td>$user_last_name</td>
                      <td>$user_email</td>

                      <td><a href= 'edit_users.php?id=$user_id'>Edit</td> 
                   </tr>";
        }
          echo "</table>";
          
	?>
   <br><hr>
                      <a href="add_users.php"><button>Add users</button></a> <br><hr>


</body>
</html>
<?php
   }else{

    header('location:login.php');
   }
   
?>