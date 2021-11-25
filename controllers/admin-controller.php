<?php
    class AdminController{
        public function InitAdminController(){
            require_once('models/user-model.php');  
            require_once('views/user-view.php');
            require_once('models/product-model.php');
            require_once('views/product-view.php');
            require_once('models/blog-model.php'); 
            require_once('views/blog-view.php');
            require_once('models/historyTransaction-model.php');           
            require_once('views/historyTransaction-view.php');
        }

        public function View($ctrl){
            $this->InitAdminController();
            $output = "";
            switch ($ctrl) {
                case 'user':
                    $url = $_SERVER['REQUEST_URI'];
                    $userView = new UserView();
                    $userModel = new UserModel();

                    if (isset($_GET['confirm'])) {
                        if ($_GET['confirm'] == 'true'){                          
                            $username = $_GET['username'];
                            $userModel->deleteOneUser($username);
                        }
                    }
                    
                    if (isset($_POST['ban'])){
                        $username = $_GET['username'];
                        $userModel->banOneUser($username);
                    }
                    else if (isset($_POST['unban'])){
                        $username = $_GET['username'];
                        $userModel->unbanOneUser($username);
                    }
                    else if (isset($_POST['del'])){
                        $output .= $userView->confirmPopUp("Delete this user from database ?");
                    }
                    $users = $userModel->getAllUser();
                    $output .= $userView->showAllUser_adminpage($users); 
                    break;
                case 'product':
                    $productModel = new ProductModel();
                    $productView = new ProductView();

                    if (isset($_GET['confirm'])) {
                        if ($_GET['confirm'] == 'true'){                      
                            $action = "delete";
                            $arr = array();
                            $arr['ID'] = $_GET['deleteInfo'];
                            $result = $productModel->Edit($action, $arr);
                        }
                    }

                    if (isset($_POST['editInfo']))
                    {
                        $_SESSION['ID'] = $_POST['editInfo'];
                        $products = $productModel->getOneProduct($_POST['editInfo']);
                        $_SESSION['Image'] = $products['Image'];
                        $_SESSION['Name'] = $products['Name'];
                        $_SESSION['Price'] = $products['Price'];
                        $_SESSION['Description'] = $products['Description'];
                        $_SESSION['Tag'] = $products['Tag'];

                        $link = "admin.php?ctrl=product&act=edit";
                        header("Location: " . $link);
                    }
                    if (isset($_POST['deleteInfo']))
                    {   
                        $productView->confirmPopUp("Delete this product from database ?", $_POST['deleteInfo']);
                    }
                    if (isset($_POST['toggleHot'])){
                        $productModel->toggleHot($_POST['toggleHot']);
                    }
                    $products = $productModel->getAllProduct();
                    $output = $productView->showAllProduct_adminpage($products);
                    break;
                case 'blog':
                    $blogModel = new BlogModel();
                    $blogView = new BlogView();

                    if (isset($_GET['confirm'])) {
                        if ($_GET['confirm'] == 'true'){                      
                            $action = "delete";
                            $arr = array();
                            $arr['ID'] = $_GET['deleteInfo'];
                            $result = $blogModel->Edit($action, $arr);
                        }
                    }

                    if (isset($_POST['editInfo']))
                    {
                        $_SESSION['ID'] = $_POST['editInfo'];
                        $blog = $blogModel->getOneBlog($_POST['editInfo']);
                        $_SESSION['Image'] = $blog['Image'];
                        $_SESSION['Title'] = $blog['Title'];
                        $_SESSION['Content'] = $blog['Content'];
                        $_SESSION['Tag'] = $blog['Tag'];
                        $_SESSION['Description'] = $blog['Description'];

                        $link = "admin.php?ctrl=blog&act=edit";
                        header("Location: " . $link);
                    }
                    if (isset($_POST['deleteInfo']))
                    {
                        $blogView->confirmPopUp("Delete this blog from database ?", $_POST['deleteInfo']);
                    }

                    $blogs = $blogModel->getAllBlog();
                    $output = $blogView->showAllBlog_adminpage($blogs);
                    break;
                case 'historyTransaction':
                    $historyTransactionView = new HistoryTransactionView();       
                    $historyTransactionModel = new HistoryTransactionModel();
    
                    $historyTransactions = $historyTransactionModel->getAllHistoryTransaction();
                    $output = $historyTransactionView->showAllHistoryTransaction_adminpage($historyTransactions); 
                    break;
            }
            return $output;
        }

        public function Edit($ctrl, $action){
            $this->InitAdminController();
            $output = "";
            if ($ctrl == "product"){
                $productView = new ProductView();
                $output .= $productView->showFormProduct_adminpage($action);         
                $productModel = new ProductModel();
                if ($action == "addnew")
                {
                    $arr = array();
                    if (isset($_POST['submit'])){
                        $arr['Image'] = $_POST['Image'];
                        $arr['Name'] = $_POST['Name'];
                        $arr['Price'] = $_POST['Price'];
                        $arr['Description'] = $_POST['Description'];
                        $arr['Tag'] = $_POST['Tag'];
                    }
                }
                else if ($action == "edit")
                {        
                    $arr = array();
                    if (isset($_POST['submit'])){
                        $arr['ID'] = $_SESSION['ID'];
                        $arr['Image'] = $_POST['Image'];
                        $arr['Name'] = $_POST['Name'];
                        $arr['Price'] = $_POST['Price'];
                        $arr['Description'] = $_POST['Description'];
                        $arr['Tag'] = $_POST['Tag'];
                    }
                    $result = false;
                }
                if (sizeof($arr) != 0) {
                    $result = $productModel->Edit($action, $arr);
                    $output .= $productView->alertResultPopUp($ctrl, $result);
                }
            }
            else if ($ctrl == "blog"){
                $blogModel = new BlogModel();
                $blogView = new BlogView();
                $output .= $blogView->showFormBlog_adminpage($action);

                if ($action == "addnew")
                {
                    $arr = array();
                    if (isset($_POST['submit'])){
                        $arr['Image'] = $_POST['Image'];
                        $arr['Title'] = $_POST['Title'];
                        $arr['Content'] = $_POST['Content'];
                        $arr['Tag'] = $_POST['Tag'];
                        $arr['Description'] = $_POST['Description'];
                    }
                }
                else if ($action == "edit")
                {        
                    $arr = array();
                    if (isset($_POST['submit'])){
                        $arr['ID'] = $_SESSION['ID'];
                        $arr['Image'] = $_POST['Image'];
                        $arr['Title'] = $_POST['Title'];
                        $arr['Content'] = $_POST['Content'];
                        $arr['Tag'] = $_POST['Tag'];
                        $arr['Description'] = $_POST['Description'];
                    }
                }
                if (sizeof($arr) != 0)
                {
                    $result = $blogModel->Edit($action, $arr);
                    $output .= $blogView->alertResultPopUp($ctrl, $result);
                }
            }
            return $output;
        }
    }
?> 