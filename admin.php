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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script> 
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

            <main class="bg-white">
                <?php
                    session_start();
                    $url = $_SERVER['REQUEST_URI'];
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
                        echo '<form method="post" action="">
                                <p><input name="Account" type="text" placeholder="Account"></p>
                                <p><input name="Password" type="password" placeholder="Password"></p>
                                <p><button name="submit" type="submit"> Login </button> </p>
                              </form>';
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
                            if (isset($_POST['submit']))
                            {
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
                ?>
            </main>
        </div>
    
    <style>
        nav.row {height: 40px; line-height: 40px }
        div.noidung { min-height: 500px}
        div.noidung >main  { } 
    </style>
  </body>
</html>