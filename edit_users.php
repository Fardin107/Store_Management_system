<?php
require('connection.php');

if (isset($_GET['id'])) {
    $getid = $_GET['id'];

    $sql = "SELECT * FROM users WHERE user_id=$getid";

    $query = $conn->query($sql);

    $data = mysqli_fetch_assoc($query);

    $user_id = $data['user_id'];
    $user_first_name = $data['user_first_name'];
    $user_last_name = $data['user_last_name'];
    $user_email = $data['user_email'];
    $user_password = $data['user_password'];
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['user_id'])) {
    $delete_user_id = $_GET['user_id'];

    $sql_delete = "DELETE FROM users WHERE user_id=$delete_user_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo 'User deleted successfully';
        // You may redirect the user or perform any other action after deletion
    } else {
        echo 'Error deleting user';
    }
}

if (isset($_GET['user_first_name'])) {
    $new_user_first_name = $_GET['user_first_name'];
    $new_user_last_name = $_GET['user_last_name'];
    $new_user_email = $_GET['user_email'];
    $new_user_password = $_GET['user_password'];
    $new_user_id = $_GET['user_id'];

    $sql_update = "UPDATE users SET 
                       user_first_name='$new_user_first_name',
                       user_last_name='$new_user_last_name',
                       user_email='$new_user_email',
                       user_password='$new_user_password'
                  WHERE user_id=$new_user_id";

    if ($conn->query($sql_update) === TRUE) {
        echo 'Update successful';
    } else {
        echo 'Error updating record: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Users</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <br>

        User's First Name: <br>
        <input type="text" name="user_first_name" value="<?php echo $user_first_name ?>"><br><br><hr>
        User's Last Name: <br>
        <input type="text" name="user_last_name" value="<?php echo $user_last_name ?>"><br><br><hr>
        User's Email: <br>
        <input type="email" name="user_email" value="<?php echo $user_email ?>"><br><br><hr>
        User's Password: <br>
        <input type="password" name="user_password" value="<?php echo $user_password ?>"><br><br><hr>
        <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden>
        <input type="submit" name="submit" value="Update">
    </form>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <br>
        <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden>
        <input type="hidden" name="action" value="delete">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
