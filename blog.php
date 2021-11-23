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
    <link type="text/css" rel="stylesheet" href="assets/css/shop.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Blogs</title>
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
    <footer class="container-fluid">
        <div class="organic-footer-content row">
            <div class="col-xl-4 col-md-6 col-12">
                <div class="organic-footer-col">
                    <div class="organic-footer-logo">
                        <a href="#"><img src="./assets/img/logo.png" /></a>
                    </div>
                    <p class="organic-footer-paragraph">
                        Take a moment to enjoy in our all time favorite and the bestseller in its inche Craft Beer, a WordPress theme for you<br /><br /> Orgus is a clean and modern WordPress theme designed specifically for industry
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="organic-footer-col">
                    <div class="organic-footer-heading">
                        <h3 class="organic-footer-heading_text">Quick Links</h3>
                        <span class="organic-footer-heading_icon">
                            <span></span>
                        </span>
                    </div>
                    <ul class="organic-footer-list_quick">
                        <li>
                            <a href="#">Our Projects</a>
                        </li>
                        <li>
                            <a href="#">Orgus Farmers</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Upcoming Events</a>
                        </li>
                        <li>
                            <a href="#">Our Services</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="organic-footer-col">
                    <div class="organic-footer-heading">
                        <h3 class="organic-footer-heading_text">Products</h3>
                        <span class="organic-footer-heading_icon">
                            <span></span>
                        </span>
                    </div>
                    <ul class="organic-footer-list_product">
                        <li>
                            <a href="#">Organic Fruits</a>
                        </li>
                        <li>
                            <a href="#">Fresh Vegetables</a>
                        </li>
                        <li>
                            <a href="#">Fresh Meats</a>
                        </li>
                        <li>
                            <a href="#">Other Products</a>
                        </li>
                        <li>
                            <a href="#">Organic Foods</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-12">
                <div class="organic-footer-col">
                    <div class="organic-footer-heading">
                        <h3 class="organic-footer-heading_text">Contact</h3>
                        <span class="organic-footer-heading_icon">
                            <span></span>
                        </span>
                    </div>
                    <ul class="organic-footer-list_contact">
                        <li>
                            <p class="contact_info">Phone:</p>
                            <a href="#">+ 00 568 945 679</a>
                        </li>
                        <li>
                            <p class="contact_info">Email:</p>
                            <a href="#">orgus@gmail.com</a>
                        </li>
                        <li>
                            <p class="contact_info">Website:</p>
                            <a href="#">www.orgusinfo.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="organic-footer-further row">
            <div class="col-xl-6 col-md-6 col-12">
                <div class="organic-footer-col_bottom">
                    <p>
                        <span>Orgus</span> - Copyright 2021. With love by
                        <span>CMSSuperHeros</span>
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-12">
                <div class="organic-footer-col_bottom">
                    <ul>
                        <li>
                            <a href="#">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Setting & Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php require_once("./views/canvas.php") ?>
    <script src="./assets/js/cart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js "></script>
    <script>
    $(document).ready(function() {
        $('#rightnav__user').on("click", function() {
            $('#rightnav__user-menu').toggle();
        })
    })
    $(".carousel ").owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        }
    });
    </script>
</body>

</html>