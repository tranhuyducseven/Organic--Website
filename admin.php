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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> </script> 
  </head>

  <body>
    <div class="container">
        <header class="row bg-info mt-1">Đầu trang</header>
        <div class="row noidung">       
            <aside class="col-3 bg-light"> 
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Quản lý khách hàng
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><a href="admin.php?ctrl=user">Thông tin khách hàng</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Quản lý sản phẩm
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><a href="admin.php?ctrl=product">Xem product</a></p>
                                <p><a href="admin.php?ctrl=product&act=addnew">Thêm product</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Quản lý bài viết
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><a href="admin.php?ctrl=blog">Xem blog</a></p>
                                <p><a href="admin.php?ctrl=blog&act=addnew">Thêm blog</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="col-9 bg-white mx-n2">
                <?php
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
                            case 'home':
                                break;
                        }
                    }
                ?>
            </main>
        </div>
        <footer class="row bg-dark mt-1 mb-2 text-warning text-center">Chân trang</footer>
    </div> 
    
    <style>
        body { background-color:khaki!important}
        header.row{ height: 120px}
        nav.row {height: 40px; line-height: 40px }
        footer.row { height: 60px;}
        div.noidung { min-height: 500px}
        div.noidung >main  { } 
    </style>
  </body>
</html>