<?php
    require('connection.php');
    
     

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>List of Category</title>
</head>
<body>
    <hr>
<a href="index2.php"><button>Back</button></a><hr>
<br>
	<?php
         $sql= "SELECT * FROM category";
         $query= $conn->query($sql);
         echo "<table border='1'><tr><th>Category</td><th>Date</th><th>Action</th> </tr>";
        while ( $data= mysqli_fetch_assoc($query)){
        	$category_id      = $data ['category_id'];
        	$category_name      = $data ['category_name'];
        	$category_entrydate = $data ['category_entrydate'];
                  
            echo "<tr>
                      <td>$category_name</td>
                      <td>$category_entrydate</td>
                      <td><a href= 'edit_category.php?id=$category_id'>Edit</td>
                   </tr>";

        }
          echo "</table>";
	?>
                  <br><hr>
                   <a href="add_category.php"><button>Add Category</button></a>
                   <br><hr>

</body>
</html>
