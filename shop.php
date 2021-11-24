<?php
  session_start();
  if (!isset($_SESSION['current_page_shop']))
    $_SESSION['current_page_shop'] = 1;
  require_once('controllers/product-controller.php');
  $productController = new ProductController(); // Nếu không thì hiển thị toàn bộ danh sách
  $maxPageNumber = $productController->countProductNumber() / 9 + 1;

  function generatePageNumber()
  {
    echo '<li><a class="current" href="shop.php?page='. $_SESSION['current_page_shop'] .'">'. $_SESSION['current_page_shop'] .'</a></li>';
  }

  function decreasePageNumber()
  {
    if ($_SESSION['current_page_shop'] > 1)
      $_SESSION['current_page_shop']--;
  }

  function increasePageNumber()
  {
    if ($_SESSION['current_page_shop'] < $GLOBALS['maxPageNumber'] - 1)
      $_SESSION['current_page_shop']++;
  }

  if (isset($_GET['act']))
  {
    if ($_GET['act'] == 'left')
    {
      decreasePageNumber();
      header("Location: shop.php?page=". $_SESSION['current_page_shop']);
    }
    else if ($_GET['act'] == 'right')
    {
      increasePageNumber();
      header("Location: shop.php?page=". $_SESSION['current_page_shop']);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo.svg" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />    
    <link type="text/css" rel="stylesheet" href="assets/css/base.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/shop.css" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Organic - Shop</title>
</head>

<body>
    <?php require_once("./views/header.php") ?>
    <div class="container content-container">
        <div class="row content-row organic">
            <div class="organic-primary col-xl-8 col-lg-8 col-sm-12 col-12">
                <div class="organic-sort-bar d-flex">
                    <div class="organic-sort-bar_note">
                        <p class="organic-sort-bar_note">
                            <?php 
                                echo "Showing ";
                                if (!isset($_GET['search']) && !isset($_GET['tag'])){
                                    echo 9*$_SESSION['current_page_shop']-8;
                                    echo " - ";
                                    if ($_SESSION['current_page_shop']*9 <= $productController->countProductNumber())
                                        echo 9*$_SESSION['current_page_shop'];
                                    else echo $productController->countProductNumber(); 
                                    echo " of ";
                                }
                            ?> 
                            <?php 
                                if (!isset($_GET['search']) && !isset($_GET['tag'])){
                                    echo $productController->countProductNumber();
                                }
                                else echo $productController->getAllProduct_userpage($_SESSION['current_page_shop'], 0);
                            ?> 
                        results</p>
                    </div>
                    
                </div>
                <div class="organic-items row">
                  <?php
                    $productController->getAllProduct_userpage($_SESSION['current_page_shop'], 1);
                  ?>
                </div>
                <nav class="organic-pagination">
                  <ul class="organic-page-numbers justify-content-center">
                    <li>
                      <?php 
                        if (!isset($_GET['search']) && !isset($_GET['tag']))
                          echo '<a href="shop.php?act=left"><i class="fas fa-angle-double-left"></i></a>';
                      ?>
                    </li>
                    <?php
                      if (!isset($_GET['search']) && !isset($_GET['tag']))
                        generatePageNumber();
                    ?>
                    <li>
                      <?php 
                        if (!isset($_GET['search']) && !isset($_GET['tag']))
                          echo '<a href="shop.php?act=right"><i class="fas fa-angle-double-right"></i></a>';
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
                <i class="material-icons">search</i>
                    </button>
                    </form>
            </div>
          <div class="organic-filter-group">
            <h2 class="organic-filter-group_heading text-left">Tags</h2>
            <div class="organic-filter-group_wrapper">
                    <?php
                        $productController->showTag();
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
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


    <!------------------------------------------ BEGIN OFFCANVAS CART ------------------------------------------------>

    <?php require_once("./views/canvas.php") ?>

    <!------------------------------------------ END OFFCANVAS CART ------------------------------------------------>
    <script src="./assets/js/cart.js"></script>
    <script src="assets/js/select.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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