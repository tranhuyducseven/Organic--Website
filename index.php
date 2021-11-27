<?php 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="./assets/css/base.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    
    <link rel="stylesheet" href="./assets/css/scrollbar.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Organic - Home</title>
</head>

<body>
    <!-- #############HEADER######### -->
    <?php require_once("./views/header.php") ?>
    <!-- #############MAIN######### -->
    <div class="main">
        <!--slogan-->
        <div id="0" class="page-slogan pd-150-0" style="
          background-color: #f4f4f4;background-image: url('./assets/img/home/background-slogan.jpg');">
            <div class="grid wide-m">
                <div class="container-fluid row gx-5">
                    <div class="
                col-ssm-12 col-sm-10 col-md-10 col-lg-10 col-xl-6
                page-slogan__content
              ">
                        <h1 class="page-slogan__heading">Fresh food</h1>
                        <h1 class="page-slogan__heading">
                            healthy
                            <span style="color: var(--primary-text-color)">life.</span>
                        </h1>
                        <p class="page-slogan__paragraph">
                            Nor again is there anyone who loves pursues desires obtain because occasionally circumstances.
                        </p>
                        <div class="page-slogan__btn">
                            <a class="page-slogan__btn-link " href="./contact.php">Contact me
                                <i class="fas fa-angle-double-right page-slogan__btn-link-icon"></i></a>
                        </div>
                    </div>
                    <div class="col-ssm-6 col-sm-6 col-md-8 col-lg-8 col-xl-6 page-slogan__img">
                        <img src="./assets/img/home/fruit-image.png" alt="fruit image" class="fruit-image__img" />
                    </div>
                </div>
            </div>
        </div>
        <!--ABOUT-->
        <div id="1" class="container-fluid about pd-150-0" style="background-color: var(--white-color)">
            <div class="grid wide-m row gx-5">
                <div class="col-ssm-12 col-sm-12 col-xl-5 about__img">
                    <img src="./assets/img/home/about-home.png" alt="" />
                </div>
                <div class="col-ssm-12  col-sm-12 col-xl-7">
                    <div class="row">
                        <div class="col about-description">
                            <h4 class="about-description__subheading">
                                Welcome to organic food company.
                            </h4>
                            <h1 class="about-description__heading">
                                Orgus give premium quality healthy and
                                <span> natural food.</span>
                            </h1>
                            <p class="about-description__paragraph">
                                Nor again is there anyone who loves or pursues orems desires to obtain pain ofe itself because pain, but because occasionally circumstances occur in and which toil and pain can procure him some great pleasure. To take a trivial example.
                            </p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="about-item__icon-wrapper">
                            <div class="overlay">
                                <i class="fab fa-pagelines about-item__icon"></i>
                            </div>
                        </div>
                        <div class="about-item__content">
                            <h1 class="about-item__title">Our Mission</h1>
                            <p class="about-item__paragraph">
                                Nor again is there anyone who loves or pursues desires to obtain paino pain, but because occasionally circumstances occur in which toil andp pleasure except to obtain some advantage from.
                            </p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="about-item__icon-wrapper">
                            <div class="overlay">
                                <i class="far fa-lemon about-item__icon"></i>
                            </div>
                        </div>
                        <div class="about-item__content">
                            <h1 class="about-item__title">Our Vision</h1>
                            <p class="about-item__paragraph">
                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        WHAT WE DO
        -->
        <div id="2" class="container-fluid p-cpn pd-150-0" style="background-image: url('./assets/img/home/p-cpn-1.png')">
            <div class="grid wide-m row gx-5">
                <div class="col">
                    <div class="p-cpn-subheading">
                        <div class="p-cpn-subheading__icon">
                            <img src="./assets/img/wheat.png" alt="">
                        </div>
                        <div class="p-cpn-subheading__text">
                            <h4>
                                Our Services</h>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid row gx-5">
                <div class="col">
                    <div class="p-cpn-heading">
                        <h1>
                            What we do?
                        </h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid row gx-5">
                <div class="col">
                    <div class="p-cpn-image">
                        <img src="./assets/img/home/img-ud-hd.png" alt="">
                    </div>
                </div>
            </div>
            <div class="grid wide-m row carousel owl-carousel">
                <div class="col">
                    <div class="p-cpn-item-1st">
                        <div class="p-cpn-item-1st__icon">
                            <img src="./assets/img/wwd-1.png" alt="" />
                        </div>
                        <div class="p-cpn-item-1st__content">
                            <h5 class="p-cpn-item-1st__title">
                                <a href="#"> Agriculture Product</a>
                            </h5>
                            <span class="p-cpn-item__break">
                                <span></span>
                            </span>
                            <p class="p-cpn-item-1st__paragraph">
                                Turnip greens yarrow ricebean rutabaga endive cauliflower sea lettuce kohlrabi amaranth.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-cpn-item-1st">
                        <div class="p-cpn-item-1st__icon">
                            <img src="./assets/img/wwd-2.png" alt="" />
                        </div>
                        <div class="p-cpn-item-1st__content">
                            <h5 class="p-cpn-item-1st__title">
                                <a href="#"> Organic Products</a>
                            </h5>
                            <span class="p-cpn-item__break">
                                <span></span>
                            </span>
                            <p class="p-cpn-item-1st__paragraph">
                                        Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery.                                    
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-cpn-item-1st">
                        <div class="p-cpn-item-1st__icon">
                            <img src="./assets/img/wwd-3.png" alt="" />
                        </div>
                        <div class="p-cpn-item-1st__content">
                            <h5 class="p-cpn-item-1st__title">
                                <a href="#"> Dairy Products</a>
                            </h5>
                            <span class="p-cpn-item__break">
                                <span></span>
                            </span>
                            <p class="p-cpn-item-1st__paragraph">
                                        Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-cpn-item-1st">
                        <div class="p-cpn-item-1st__icon">
                            <img src="./assets/img/wwd-4.png" alt="" />
                        </div>
                        <div class="p-cpn-item-1st__content">
                            <h5 class="p-cpn-item-1st__title">
                                <a href="#"> Fresh Fruites</a>
                            </h5>
                            <span class="p-cpn-item__break">
                                <span></span>
                            </span>
                            <p class="p-cpn-item-1st__paragraph">
                                        Water spinach arugula pea tatsoi aubergine spring onion bush tomato kale radicchio.
                            </p>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <!--BREAK-->
        <div id="4" class="page-break pd-150-0 " style="background-image: url('./assets/img/bgr-client-h1.jpg')">
            <div class=" page-break-list row">
                <div class=" col-ssm-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 page-break-item-1 ">
                    <div class="page-break-item-1__icon ">
                        <div class="page-break-item-1__icon-group ">
                            <img src="./assets/img/img-fc-car1.png " alt=" " class="page-break-item-1__icon-img1 " />
                            <img src="./assets/img/img-fc-gr-car1.png " alt=" " class="page-break-item-1__icon-img2 " />
                        </div>
                    </div>
                    <div class="page-break-item-1__content ">
                        <h1 class="page-break-item-1__content-heading ">
                            Natural Process
                        </h1>
                        <p class="page-break-item-1__content-paragraph ">
                            Dandelion cucumber earthnut pea peanut soko zucchini.
                        </p>
                    </div>
                </div>
                <div class="col-ssm-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 page-break-item-1 ">
                    <div class="page-break-item-1__icon ">
                        <div class="page-break-item-1__icon-group ">
                            <img src="./assets/img/img-fc-car2.png " alt=" " class="page-break-item-1__icon-img1 " />
                            <img src="./assets/img/img-fc-gr-car2.png " alt=" " class="page-break-item-1__icon-img2 " />
                        </div>
                    </div>
                    <div class="page-break-item-1__content ">
                        <h1 class="page-break-item-1__content-heading ">
                            High Quality Food
                        </h1>
                        <p class="page-break-item-1__content-paragraph ">
                            Combine old fashioned oats and wheat germ in a large bowl
                        </p>
                    </div>
                </div>
                <div class="col-ssm-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 page-break-item-1 ">
                    <div class="page-break-item-1__icon ">
                        <div class="page-break-item-1__icon-group ">
                            <img src="./assets/img/img-fc-car3.png " alt=" " class="page-break-item-1__icon-img1 " />
                            <img src="./assets/img/img-fc-gr-car3.png " alt=" " class="page-break-item-1__icon-img2 " />
                        </div>
                    </div>
                    <div class="page-break-item-1__content ">
                        <h1 class="page-break-item-1__content-heading ">
                            Best For Health
                        </h1>
                        <p class="page-break-item-1__content-paragraph ">
                           Gumbo beet greens corn soko endive gumbo gourd.
                        </p>
                    </div>
                </div>
                <div class="col-ssm-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3  page-break-item-1 ">
                    <div class="page-break-item-1__icon ">
                        <div class="page-break-item-1__icon-group ">
                            <img src="./assets/img/img-fc-car4.png " alt=" " class="page-break-item-1__icon-img1 " />
                            <img src="./assets/img/img-fc-gr-car4.png " alt=" " class="page-break-item-1__icon-img2 " />
                        </div>
                    </div>
                    <div class="page-break-item-1__content ">
                        <h1 class="page-break-item-1__content-heading ">
                            Grown by Nature
                        </h1>
                        <p class="page-break-item-1__content-paragraph ">
                           Bunya nuts black-eyed pea prairie turnip leek lentil.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Expert Farmers-->
        <div id="5" class="container-fluid p-cpn pd-150-0 " style="background-color: var(--white-color); ">
            <div class="grid wide-m row gx-5 ">
                <div class="col ">
                    <div class="p-cpn-subheading ">
                        <div class="p-cpn-subheading__icon ">
                            <img src="./assets/img/wheat.png " alt=" ">
                        </div>
                        <div class="p-cpn-subheading__text " style="background-color: var(--background-color) ">
                            <h4>
                                Team Members</h>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid row gx-5 ">
                <div class="col ">
                    <div class="p-cpn-heading ">
                        <h1>
                            Expert Farmers
                        </h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid row gx-5 ">
                <div class="col ">
                    <div class="p-cpn-image">
                        <img src="./assets/img/home/img-ud-hd.png" alt=" ">
                    </div>
                </div>
            </div>
            <div class="grid wide-m row carousel owl-carousel ">
                <div class="col ">
                    <div class="p-cpn-item-2nd ">
                        <img class="p-cpn-item-2nd__ava " src="https://scontent.fsgn6-1.fna.fbcdn.net/v/t1.6435-9/124693546_1080575599049011_1048264268143765157_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=174925&_nc_ohc=HEg_cEQLQUsAX9HGE5c&_nc_ht=scontent.fsgn6-1.fna&oh=b99ff241e5a78243c54b3b5c055b1fac&oe=61C3D2E7" alt=" " />
                        <span class="p-cpn-item__break ">
                            <span></span>
                        </span>
                        <h1 class="p-cpn-item-2nd__name ">
                            Trần Huy Đức
                        </h1>
                        <h3 class="p-cpn-item-2nd__career ">
                            Student
                        </h3>
                    </div>
                </div>
                <div class="col ">
                    <div class="p-cpn-item-2nd ">
                        <img class="p-cpn-item-2nd__ava " src="https://www.awn.com/sites/default/files/styles/large_featured/public/image/featured/1032868-abp-2017-celebrate-10-year-anniversary-dreamworks-animations-bee-movie.jpg?itok=_xA8HGWh" alt="" />
                        <span class="p-cpn-item__break "><span></span></span>
                        <h1 class="p-cpn-item-2nd__name ">
                            Phạm Ngọc Tân

                        </h1>
                        <h3 class="p-cpn-item-2nd__career ">
                            Student
                        </h3>
                    </div>
                </div>
                <div class="col ">
                    <div class="p-cpn-item-2nd ">
                        <img class="p-cpn-item-2nd__ava " src="https://scontent.fsgn6-2.fna.fbcdn.net/v/t1.6435-9/80194343_1104817576522824_136626233990447104_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=GzlVmSeJtyoAX8L6vxh&_nc_ht=scontent.fsgn6-2.fna&oh=28ad83c15777ace31d145be08ad8508f&oe=61C3BEFB" alt=" " />
                        <span class="p-cpn-item__break ">
                            <span></span>
                        </span>
                        <h1 class="p-cpn-item-2nd__name ">
                            Vũ Khánh Hưng 
                        </h1>
                        <h3 class="p-cpn-item-2nd__career ">
                            Student
                        </h3>
                    </div>
                </div>
                 <div class="col ">
                    <div class="p-cpn-item-2nd ">
                        <img class="p-cpn-item-2nd__ava" src="https://scontent.fdad3-5.fna.fbcdn.net/v/t1.6435-9/117819733_1226353787728108_459377324621918226_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=rocpn5oFZiIAX-pK4yx&tn=VkRRP8B3h1-Nl5uS&_nc_ht=scontent.fdad3-5.fna&oh=e7c1a2322857e49cee50fd963cf6cde4&oe=61C1FEED" alt=" " />
                        <span class="p-cpn-item__break ">
                            <span></span>
                        </span>
                        <h1 class="p-cpn-item-2nd__name ">
                            Nguyễn Phúc 

                        </h1>
                        <h3 class="p-cpn-item-2nd__career ">
                            Student
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!--Organic Product-->
        <div id="6" class="container-fluid p-cpn pd-150-0 " style="background-color: var(--background-color); ">
            <div class="grid wide-m row gx-5 ">
                <div class="col ">
                    <div class="p-cpn-subheading ">
                        <div class="p-cpn-subheading__icon ">
                            <img src="./assets/img/wheat.png " alt=" ">
                        </div>
                        <div class="p-cpn-subheading__text ">
                            <h4>
                                Some Products</h>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid row gx-5 ">
                <div class="col ">
                    <div class="p-cpn-heading ">
                        <h1>
                            Organic Products
                        </h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid row gx-5 ">
                <div class="col ">
                    <div class="p-cpn-image ">
                        <img src="./assets/img/home/img-ud-hd.png" alt=" ">
                    </div>
                </div>
            </div>
            <!--Carousel ITEM-->
            <div id="carousel-p-cpn-3rd ">
                <div class="grid wide-m row carousel owl-carousel ">
                    <?php
                        require_once('controllers/product-controller.php');
                        $productController = new ProductController();
                        $productController->getAllProduct_homepage();
                    ?>
                </div>
            </div>
    <!--BREAK-->
    <div id="7" class="page-break pd-150-0 " style="background-image: url( './assets/img/bgr-client-h1.jpg') ">
        <div class="grid wide-l row page-break-list ">
            <div class="col-ssm-12 col-sm-12 col-md-12 col-lg-5 c-20 page-break-item-2 ">
                <div class="page-break-item-2__icon ">
                    <img src="./assets/img/pbr-1.png " alt=" " />
                </div>
                <div class="page-break-item-2__content ">
                    <h1 class="page-break-item-2__content-counter ">895<span>M</span>
                    </h1>
                    <h2 class="page-break-item-2__content-subheading ">COMPLETE PROJECT
                    </h2>
                </div>
            </div>
            <div class="col-ssm-12 col-sm-12 col-md-12 col-lg-5 c-20 page-break-item-2 ">
                <div class="page-break-item-2__icon ">
                    <img src="./assets/img/pbr-2.png " alt=" " />
                </div>
                <div class="page-break-item-2__content ">
                    <h1 class="page-break-item-2__content-counter">790<span>+</span>
                    </h1>
                    <h2 class="page-break-item-2__content-subheading">AWARD WINNING
                    </h2>
                </div>
            </div>
            <div class="col-ssm-12 col-sm-12 col-md-12 col-lg-5 c-20 page-break-item-2 ">
                <div class="page-break-item-2__icon ">
                    <img src="./assets/img/pbr-3.png " alt=" " />
                </div>
                <div class="page-break-item-2__content ">
                    <h1 class="page-break-item-2__content-counter">205<span>K</span>
                    </h1>
                    <h2 class="page-break-item-2__content-subheading">PRODUCT ITEM
                    </h2>
                </div>
            </div>
            <div class="col-ssm-12 col-sm-12 col-md-12 col-lg-5 c-20 page-break-item-2 ">
                <div class="page-break-item-2__icon ">
                    <img src="./assets/img/pbr-4.png " alt=" " />
                </div>
                <div class="page-break-item-2__content ">
                    <h1 class="page-break-item-2__content-counter ">120<span>+</span>
                    </h1>
                    <h2 class="page-break-item-2__content-subheading ">
                        HAPPY CLIENTS
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!--Update of Organic-->
    <div id="8" class="container-fluid p-cpn pd-150-0 " style="background-color: var(--white-color); ">
        <div class="grid wide-m row gx-5 ">
            <div class="col ">
                <div class="p-cpn-subheading ">
                    <div class="p-cpn-subheading__icon ">
                        <img src="./assets/img/wheat.png " alt=" ">
                    </div>
                    <div class="p-cpn-subheading__text " style="background-color: var(--background-color) ">
                        <h4>
                            Latest New</h>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid row gx-5 ">
            <div class="col ">
                <div class="p-cpn-heading ">
                    <h1>
                        Update of Organic
                    </h1>
                </div>
            </div>
        </div>
        <div class="container-fluid row gx-5 ">
            <div class="col ">
                <div class="p-cpn-image ">
                    <img src="./assets/img/home/img-ud-hd.png " alt=" ">
                </div>
            </div>
        </div>
        <div class=" grid wide-m row carousel owl-carousel ">
            <?php
                require_once('controllers/blog-controller.php');
                $blogController = new BlogController();
                $blogController->getAllBlog_homepage();
            ?>
        </div>
    </div>
    </div>
    <!-- #############FOOTER######### -->
    <?php require_once("./views/footer.php") ?>
    <?php require_once("./views/scrollbar.php") ?>
    <?php require_once("./views/canvas.php") ?>
    <script src="./assets/js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js "></script>
    <script>
    
    $(document).ready(function() {
        $('#rightnav__user').on("click", function() {
            $('#rightnav__user-menu').toggle();
        });
    });
        
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
