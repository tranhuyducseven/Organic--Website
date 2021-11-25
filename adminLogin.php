<?php
    session_start();
    if (isset($_SESSION['usernameAdmin']))
        header("Location: admin.php");
    if (isset($_POST['login-btn-admin']))
    {
        if ($_POST['Account'] == "admin" && $_POST['Password'] == "admin")
        {
            $_SESSION['usernameAdmin'] = 1;
            header("Location: admin.php");
        }
        else
        {
            echo '<script>
                    alert("Your account is incorrect!");
                  </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link type="text/css" rel="stylesheet" href="assets/css/login.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/admin.css" />    
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script> 
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <title>Admin Login</title>
  </head>

  <body>
        <div class="admin">
            <nav class="navbar navbar-expand admin-nav"> 
                <div class="admin-logo">
                    <a href="#"><img src="./assets/img/logo.png" /></a>
                </div>
            </nav>

            <div class="main">
                <div class="grid wide-m">
                    <div class="row container-fluid ">
                        <div class="col-md-0 col-lg-4 company__info">
                            <h1 class="company__name">Organic Food</h1>
                            <div class="company__logo" style="background-image:url('assets/img/logo.png')">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 login_form ">
                            <div class="container-fluid">
                                <div class="row">
                                    <h2 class="login_form__name">Log in Admin!</h2>
                                </div>
                                <div class="row">
                                    <form method="post" action="">
                                        <div class="row">
                                            <input name="Account" type="text" placeholder="Account" class="form__input">
                                        </div>
                                        <div class="row">
                                            <input name="Password" type="password" placeholder="Password" class="form__input">
                                        </div>
                                        <div class="row">
                                            <button class="btn btn-danger login-btn" name="login-btn-admin">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <style>
        nav.row {height: 40px; line-height: 40px }
        div.noidung { min-height: 500px}
        div.noidung >main  { } 

        .main {
            background-color: #444c54;
            padding: 200px 0;
            height: calc(100vh - 53.83px - 1rem);
        }
        .company__logo{
            background-size: 60%;
            background-position: 20px center;
            margin-top: 20px; 
            padding-top: 80px; 
            background-repeat: no-repeat;
        }

        .company__name {
            color: #8ca9c6;
        }

        .login_form__name {
            color: #ff0000;
            font-weight: 700;
        }

        .login_form {
            background-color: #e6ccb3;
        }

        .login-btn:hover,
        .login-btn:focus {
            background-color: #a12632;
        }
    </style>
  </body>
</html>