<!-- File product.php có thể thay thế bằng file product.html, gọi mã php bên dưới để render ra phần lõi từ product-view.php, fontend sẽ bổ sung hoặc chỉnh sửa lại file này -->

<?php
    $url = $_SERVER['REQUEST_URI'];
    require_once('../controllers/product-controller.php');
    $productController = new ProductController();

    if (strpos($url,'id=') == true){                       // Nếu url có chứa 'id=' thì hiển thị sản phẩm tương ứng
        $id = $_GET['id'];
        $productController->getOneProduct($id);
    }
    else {                                                 // Nếu không thì hiển thị toàn bộ danh sách
        $productController->getAllProduct();
    }
?>