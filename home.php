<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
            echo '<a href="profile.php">Profile</a><br>';
            echo '<a href="logout.php">Logout</a>';
        }
        else {
            echo '<a href="login.php">Profile</a><br>';
            echo '<a href="login.php">Login</a>';
        }
    ?>
</body>
</html>