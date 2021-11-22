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
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Lịch sử đơn hàng
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><a href="historyTransaction.php">Xem lịch sử</a></p>
                                <p><a href="historyTransaction.php?act=addnew">Thêm lịch sử</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <main class="col-9 bg-white mx-n2">
                <?php
                    $url = $_SERVER['REQUEST_URI'];
                    require_once('controllers/historyTransaction-controller.php');
                    $historyTransactionController = new HistoryTransactionController();
                    if (strpos($url,'act=') == true){ // Nếu url có chứa 'ctrl=' thì hiển thị sản phẩm tương ứng
                        $historyTransactionController->Edit();
                    }
                    else
                        $historyTransactionController->View();
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