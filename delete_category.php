<?php
    require('connection.php');

    // Check if the delete button is clicked and a category ID is provided
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];

        // Prepare and execute the delete query
        $sql = "DELETE FROM category WHERE category_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $delete_id);

        if ($stmt->execute()) {
            echo 'Category deleted successfully';
        } else {
            echo 'Failed to delete category';
        }
    }

    // Rest of your existing code for displaying and editing categories
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Category</title>
</head>
<body>
    <!-- Display a form or a link to trigger category deletion -->
    <form action="edit_category.php" method="GET">
        <!-- Assuming $category_id is available from your existing code -->
        <input type="hidden" name="delete_id" value="<?php echo $category_id ?>">
        <input type="submit" value="Delete Category">
    </form>
</body>
</html>
