<?php
    session_start();
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
        header("Location: index.php");
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
    <link rel="stylesheet" href="./assets/css/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="assets/css/shop.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Login</title>
</head>

<body>
    <script>
        function checkLogin(){
            var un = document.getElementsByClassName("form__input")[0].value;
            var pass = document.getElementsByClassName("form__input")[1].value;
            $.ajax({
                type: "POST",
                url: "services/login-service.php",
                data: { 
                    act: "login",
                    username: un,
                    password: pass 
                },
                success: function(data) {
                    if (data == ""){
                        window.location.href = "index.php";
                    }
                    document.getElementsByClassName("msg")[0].innerHTML = data;
                }  
            });
        }

        function checkSignUp(){
            var un = document.getElementsByClassName("form__input")[2].value;
            var em = document.getElementsByClassName("form__input")[3].value;
            var pn = document.getElementsByClassName("form__input")[4].value;
            var pass = document.getElementsByClassName("form__input")[5].value;
            $.ajax({
                type: "POST",
                url: "services/login-service.php",
                data: { 
                    act: "reg",
                    username: un,
                    email: em,
                    phone: pn,
                    password: pass
                },
                success: function(data) {
                    if (data == ""){
                        window.location.href = "index.php";
                    }
                    document.getElementsByClassName("msg")[1].innerHTML = data;
                }  
            });
        }
    </script>
    <!--#######HEADER##########-->
    <?php require_once("./views/header.php") ?>
    <!--#######MAIN##########-->
    <div class="main">
        <div class="grid wide-m">
            <div class="row container-fluid ">
                <div class="col-md-0 col-lg-4 company__info">
                    <h1 class="company__name">Organic Food</h1>
                    <div class="company__logo" style="background-image:url('./assets/img/header-logo.png')">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2 class="login_form__name">Log In</h2>
                        </div>
                        <div class="row">
                                <div class="row">
                                    <input type="text" name="username" id="username" class="form__input" placeholder="Username" value="">
                                </div>
                                <div class="row">
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Password" value="">
                                </div>
                                <div class="row">
                                    <!-- display msg when failed!! -->
                                    <span class="msg"></span>
                                </div>
                                <div class="row remember-group">
                                    <input type="checkbox" name="remember_me" id="remember_me" class="">
                                    <label for="remember_me">Remember Me!</label>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary login-btn" onclick="checkLogin();">
                                        Login
                                    </button>
                                </div>
                        </div>
                        <div class="row">
                            <p class="query">Don't have an account? <span id='register-btn'>Register Here</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign up modal-->
        <div id="modal" class="">
            <div class="modal__overlay"></div>
            <div class="modal__body">
                <!-- Modal register-->
                <div class="grid wide-m">
                    <div class="row modal__container">
                        <div class="col-md-0 col-lg-4 company__info">
                            <h1 class="company__name">Organic Food</h1>
                            <div class="company__logo" style="background-image:url('./assets/img/header-logo.png')">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 login_form ">
                            <div class="container-fluid">
                                <div class="row">
                                    <h2 class="login_form__name">Sign Up</h2>
                                </div>
                                <div class="row">

                                        <div class="row">
                                            <input type="text" name="username" id="username" class="form__input" placeholder="Chose your username" required>
                                        </div>
                                        <div class="row">
                                            <input type="email" name="email" id="email" class="form__input" placeholder="Email address" required>
                                        </div>
                                        <div class="row">
                                            <input type="number" name="phone" id="phone" class="form__input" placeholder="Phone number" required>
                                        </div>
                                        <div class="row">
                                            <input type="password" name="password" id="password" class="form__input" placeholder="Password" required>
                                            <span class="msg"></span>
                                        </div>
                                        <div class="row">
                                            <button class="btn btn-success login-btn" onclick="checkSignUp();">
                                                Sign Up
                                            </button>
                                        </div>
                                        <div class="row">
                                            <span class="col-md-3" id='back-btn'>Back to login</span>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("./views/canvas.php") ?>
    <script src="./assets/js/cart.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>
    <script>
    document.getElementById('register-btn').addEventListener("click", function() {
        document.getElementById('modal').style.display = "flex";
    })
    document.getElementById('back-btn').addEventListener("click", function() {
        document.getElementById('modal').style.display = "none";
    })
    </script>
</body>

</html>