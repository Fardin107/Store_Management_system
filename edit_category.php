<?php
    require('connection.php');

    if(isset($_GET['id'])){
        $getid = $_GET['id'];

        $sql   = "SELECT * FROM category WHERE category_id=$getid";

        $query = $conn->query($sql);

        $data  = mysqli_fetch_assoc($query); 

        $category_id         = $data['category_id'];
        $category_name       = $data['category_name'];
        $category_entrydate  = $data['category_entrydate'];
    }

    if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['category_id'])){
        $delete_category_id = $_GET['category_id'];

        $sql_delete = "DELETE FROM category WHERE category_id=$delete_category_id";

        if($conn->query($sql_delete) === TRUE){
            echo 'Product of this Category  deleted successfully';
    
        } else {
            echo 'Error deleting category';
        }
    }

    if(isset($_GET['category_name'])){
        $new_category_name       = $_GET["category_name"];
        $new_category_entrydate  = $_GET["category_entrydate"];
        $new_category_id         = $_GET["category_id"];

        $sql_update = "UPDATE category SET
        category_name='$new_category_name',
        category_entrydate='$new_category_entrydate' WHERE category_id=$new_category_id";

        if($conn->query($sql_update) === TRUE){
            echo 'Update successful';
        } else {
            echo 'Not updated';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <form action="edit_category.php" method="GET">
        Category : <br>
        <input type="text" name="category_name" value="<?php echo $category_name ?>"><br><br>

        Category Entry Date : <br>
        <input type="date" name="category_entrydate" value="<?php echo $category_entrydate ?>"><br><br>
        <input type="text" name="category_id" value="<?php echo $category_id ?>" hidden>
        <input type="submit" value="Update">
        <br>
    </form><br>

    <form action="edit_category.php" method="GET">
        <input type="text" name="category_id" value="<?php echo $category_id ?>" hidden>
        <input type="hidden" name="action" value="delete">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
