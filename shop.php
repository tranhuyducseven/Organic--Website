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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />    
    <link type="text/css" rel="stylesheet" href="assets/css/base.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/shop.css" />

    <link rel="stylesheet" href="./assets/css/scrollbar.css" />    
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Organic - Shop</title>
</head>

<body>
    <?php require_once("./views/header.php") ?>
    <div class="main">
        <div class="page-title pd-150-0" style="background-image: url('./assets/img/bgr-title-page.jpg');">
            <div class="grid wide-m">
                <div class="container-fluid">
                    <div class="page-title-inner">
                        <h1 class="page-title__name">Shop</h1>
                        <div class="page-title__dir">
                            <ul class="page-title__dir-list">
                                <li class="page-title__dir-item">
                                    <a href="./" class="page-title__dir-link">Home</a>
                                </li>
                                <span> - </span>
                                <li class="page-title__dir-item">Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <i class="fas fa-search"></i>
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
    
    <?php require_once("./views/footer.php") ?>
    <?php require_once("./views/scrollbar.php") ?>    
    <!------------------------------------------ BEGIN OFFCANVAS CART ------------------------------------------------>

    <?php require_once("./views/canvas.php") ?>

    <!------------------------------------------ END OFFCANVAS CART ------------------------------------------------>
    <script src="./assets/js/cart.js"></script>
    <script src="assets/js/select.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>    
    <script src="./assets/js/rightnav.js" ></script>
    <script src="./assets/js/toast.js" ></script>
</body>

</html>