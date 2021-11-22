<!-- File blog.php có thể thay thế bằng file blog.html, gọi mã php bên dưới để render ra phần lõi từ blog-view.php, fontend sẽ bổ sung hoặc chỉnh sửa lại file này -->

<?php
    $url = $_SERVER['REQUEST_URI'];
    require_once('../controllers/blog-controller.php');
    $blogController = new BlogController();

    if (strpos($url,'id=') == true){                       // Nếu url có chứa 'id=' thì hiển thị sản phẩm tương ứng
        $id = $_GET['id'];
        $blogController->getOneBlog($id);
    }
    else {                                                 // Nếu không thì hiển thị toàn bộ danh sách
        $blogController->getAllBlog();
    }
?>