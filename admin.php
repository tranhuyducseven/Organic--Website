<?php
    session_start();
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
    <link type="text/css" rel="stylesheet" href="assets/css/admin.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/login.css" />

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

                <?php
                    $url = $_SERVER['REQUEST_URI'];
                    if (strpos($url,'mode=') == false)
                        echo '<ul class="navbar-nav admin-manage-list">

                            <li class="admin-manage-item nav-item dropdown">
                                <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Manage Customers</a>
                                <ul class="admin-manage-item_list dropdown-menu">
                                    <li><a href="admin.php?ctrl=user">View Customers</a></li>
                                </ul>
                            </li>

                            <li class="admin-manage-item nav-item dropdown">
                                <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Manage Products</a>
                                <ul class="admin-manage-item_list dropdown-menu">
                                    <li><a href="admin.php?ctrl=product">View Product</a></li>
                                    <li><a href="admin.php?ctrl=product&act=addnew">Add Product</a></li>
                                </ul>                              
                            </li>

                            <li class="admin-manage-item nav-item dropdown">
                                <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Manage Blogs</a>
                                <ul class="admin-manage-item_list dropdown-menu">
                                    <li><a href="admin.php?ctrl=blog">View Blog</a><//li>
                                    <li><a href="admin.php?ctrl=blog&act=addnew">Add Blog</a></li>
                                </ul>
                            </li>

                            <li class="admin-manage-item nav-item dropdown">
                                <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Manage Transactions</a>
                                <ul class="admin-manage-item_list dropdown-menu">
                                    <li><a href="admin.php?ctrl=historyTransaction">View History</a><//li>
                                </ul>
                            </li>

                            <li class="admin-manage-item nav-item dropdown">
                                <a class="admin-manage-item_btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Hello admin</a>
                                <ul class="admin-manage-item_list dropdown-menu">
                                    <li><a href="admin.php?ctrl=logout">Log out</a><//li>
                                </ul>
                            </li>
                        </ul>';
                ?>
            </nav>

                <?php
                    $url = $_SERVER['REQUEST_URI'];
                    if (strpos($url,'mode=') == true)
                        echo '<div class="main">';
                    else
                        echo '<main class="bg-white">';
                    require_once('controllers/admin-controller.php');
                    $adminController = new AdminController();

                    if (strpos($url,'ctrl=') == true){                       // Nếu url có chứa 'ctrl=' thì hiển thị sản phẩm tương ứng
                        $ctrl = $_GET['ctrl'];
                        switch ($ctrl) {
                            case 'user':
                                $adminController->View($ctrl);
                                break;
                            case 'product':
                                if (strpos($url,'act=') == true)
                                    $adminController->Edit($ctrl, $_GET['act']);
                                else 
                                    $adminController->View($ctrl);
                                break;
                            case 'blog':
                                if (strpos($url,'act=') == true)
                                    $adminController->Edit($ctrl, $_GET['act']);
                                else 
                                    $adminController->View($ctrl);
                                break;
                            case 'historyTransaction':
                                $adminController->View($ctrl);
                                break;
                            case 'home':
                                break;
                            case 'logout':
                                unset($_SESSION['usernameAdmin']);
                                unset($_SESSION['url']);
                                header("Location: admin.php?mode=login");
                                break;
                        }
                    }

                    if (strpos($url,'mode=') == true){
                        echo ' <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
                            <div class="grid wide-m">
                                <div class="row container-fluid ">
                                    <div class="col-md-0 col-lg-4 company__info">
                                        <h1 class="company__name">Organic Food</h1>
                                        <div class="company__logo" style="background-image:url('.'assets/img/logo.png'.')">
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
                                                        <!-- display msg when failed!! -->
                                                        <span class="msg">display msg when failed!!</span>
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
                            </div>';
                    } 

                    if (!isset($_SESSION['usernameAdmin']))
                    {
                        if (!isset($_SESSION['url']) || strpos($url, $_SESSION['url']) == false)
                        {
                            $_SESSION['url'] = "admin.php?mode=login";
                            header("Location: admin.php?mode=login");
                        }
                        else if (strpos($url, $_SESSION['url']) == true)
                        {
                            if (isset($_POST['login-btn-admin']))
                            {
                                echo '123';
                                if ($_POST['Account'] == "admin" && $_POST['Password'] == "admin")
                                {
                                    $_SESSION['usernameAdmin'] = 1;
                                    header("Location: admin.php");
                                }
                                else
                                    echo 'Your account is incorrect!';           
                            }
                        }   
                    }
                    if (strpos($url,'mode=') == true)
                        echo '</div>';
                    else
                        echo '</main>';
                ?>
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