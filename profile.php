<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $username = $_SESSION['username'];
        
        require_once('controllers/profile-controller.php');
        $profileController = new ProfileController();
        $profileController->getOneUser($username);
    ?>
</body>
</html>