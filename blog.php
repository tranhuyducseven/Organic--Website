<?php
  session_start();
  if (!isset($_SESSION['current_page_blog']))
    $_SESSION['current_page_blog'] = 1;
  require_once('controllers/blog-controller.php');
  $blogController = new BlogController(); // Nếu không thì hiển thị toàn bộ danh sách
  $maxPageNumber = $blogController->countProductNumber() / 3 + 1;

  function generatePageNumber()
  {
    echo '<li><a class="current" href="blog.php?page='. $_SESSION['current_page_blog'] .'">'. $_SESSION['current_page_blog'] .'</a></li>';
  }

  function decreasePageNumber()
  {
    if ($_SESSION['current_page_blog'] > 1)
      $_SESSION['current_page_blog']--;
  }

  function increasePageNumber()
  {
    if ($_SESSION['current_page_blog'] < $GLOBALS['maxPageNumber'] - 1)
      $_SESSION['current_page_blog']++;
  }

  if (isset($_GET['act']))
  {
    if ($_GET['act'] == 'left')
    {
      decreasePageNumber();
      header("Location: blog.php?page=". $_SESSION['current_page_blog']);
    }
    else if ($_GET['act'] == 'right')
    {
      increasePageNumber();
      header("Location: blog.php?page=". $_SESSION['current_page_blog']);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="./assets/css/base.css" />
    <link rel="stylesheet" href="./assets/css/blog.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Organic - Blogs</title>
</head>

<body>
    <!-- #############HEADER######### -->
    <?php require_once("./views/header.php") ?>
    <!-- #############MAIN######### -->
    <div class="main">
        <!--page-title-->
        <div class="page-title pd-150-0" style="background-image:url('./assets/img/bgr-title-page.jpg');">
            <div class="grid wide-m">
                <div class="container-fluid">
                    <div class="page-title-inner">
                        <h1 class="page-title__name">Blog</h1>
                        <div class="page-title__dir">
                            <ul class="page-title__dir-list">
                                <li class="page-title__dir-item">
                                    <a href="./index.php" class="page-title__dir-link">Home</a>
                                </li>
                                <span> - </span>
                                <li class="page-title__dir-item">
                                Blog
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--main blog -->
        <div class="container main-blog">
            <div class="row ">
                <div class="organic-blog__wrapper col-xl-8 col-lg-8 col-sm-12 col-12">
                    <?php
                        $blogController->getAllBlog_userpage($_SESSION['current_page_blog']);
                    ?>
                    <nav class="organic-pagination">
                        <ul class="organic-page-numbers justify-content-center">
                            <li>
                                <?php 
                                    if (!isset($_GET['search']) && !isset($_GET['tag']))
                                    echo '<a href="blog.php?act=left"><i class="fas fa-angle-double-left"></i></a>';
                                ?>
                            </li>
                                <?php
                                if (!isset($_GET['search']) && !isset($_GET['tag']))
                                    generatePageNumber();
                                ?>
                            <li>
                                <?php 
                                    if (!isset($_GET['search']) && !isset($_GET['tag']))
                                    echo '<a href="blog.php?act=right"><i class="fas fa-angle-double-right"></i></a>';
                                ?>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="organic-filter-panel col-xl-4 col-lg-4 col-sm-12 col-12">
                    <div class="organic-filter-search">
                        <h2 class="organic-filter-search_heading text-left">Search Here</h2>
                        <form class="organic-filter-search_form d-flex" method="get">
                            <input class="organic-filter-search_input" type="text" placeholder="Search Here" name="search"/>
                            <button class="organic-filter-search_btn" type="submit">
                                <i class="material-icons"></i>
                            </button>
                        </form>
                    </div>
                    <div class="organic-filter-group">
                        <h2 class="organic-filter-group_heading text-left">Tags</h2>
                        <div class="organic-filter-group_wrapper">
                            <?php 
                                $blogController->showTag();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end main-->
    </div>
    <!-- #############FOOTER######### -->
    <?php require_once("./views/footer.php") ?>
    <?php require_once("./views/canvas.php") ?>
    <script src="./assets/js/cart.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>    
    <script>
    $(document).ready(function() {
        $('#rightnav__user').on("click", function() {
            $('#rightnav__user-menu').toggle();
        })
    })
    
    </script>
</body>

</html>