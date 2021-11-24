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
    <link rel="stylesheet" href="./assets/css/blog.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Organic - Posts</title>
    <style>
        .scroll-bar.on{
        bottom: 100px;
        opacity: 1;
        visibility: visible; 

        }
        .scroll-bar{
        opacity: 0;
        bottom: 24px;
        visibility: hidden;
        position: fixed;        
        right: 15px;
        height: 50px;
        width: 50px;               
        overflow: hidden;
        outline: none;
        text-decoration: none;        
        line-height: 50px;
        text-align: center;
        background: linear-gradient(to right, #ff7e00 0%, #ffb63a 100%);
        -webkit-border-radius: 50px;
        -khtml-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        border-radius: 50px;
        color: #fff;
        font-size: 22px;      
        z-index: 99;
        transition: all 300ms linear 0ms;

        }
        .scroll-bar i{
            transition: all 100ms linear 0ms;
            display: inline-block;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            color: white;
            font-size: 22px;
            font-weight: 600;
        }
    </style>
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
                        <h1 class="page-title__name">Posts</h1>
                        <div class="page-title__dir">
                            <ul class="page-title__dir-list">
                                <li class="page-title__dir-item">
                                    <a href="./index.html" class="page-title__dir-link">Home</a>
                                </li>
                                <span> - </span>
                                <li class="page-title__dir-item">
                                    <a href="./blog.php" class="page-title__dir-link">Blog</a>
                                </li>
                                <span> - </span>
                                <li class="page-title__dir-item">Posts</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--main blog -->
        <div class="grid wide-m">
            <div class="organic-details container">
                <?php
                    require_once('./controllers/blog-controller.php');
                    $blogController = new BlogController();
                    $blogController->getOneBlog($_GET['id']);
                ?>
            </div>
        </div>
        <div class="organic-comment-block">
            <div class="grid wide-m">
                <div class="organic-comment container-fluid">
                    <h1 class="comments-title">
                    </h1>
                    <div class="organic-comment__wrapper">

                    </div>
                    <div class="organic-comment__addnew">
                        
                    </div>
                </div>
            </div>
        </div>
        <!--end main-->
        
    </div>
    <!-- #############FOOTER######### -->
    <?php require_once("./views/footer.php") ?>
    
    <a class="scroll-bar" href="#">
       <i class="fas fa-arrow-up"></i>
    </a>
    <script src="./assets/js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <script>
        $(document).ready(function() {
            $('#rightnav__user').on("click", function() {
                $('#rightnav__user-menu').toggle();
            })
            
            $(window).bind('scroll', function(){
                if($(this).scrollTop() > 350) 
                $(".scroll-bar").addClass("on");
                else
                    $(".scroll-bar").removeClass("on");
                });
        
        
        })        
    </script>

</body>

</html>