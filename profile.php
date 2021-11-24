<?php 
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
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
    <link rel="stylesheet" href="./assets/css/profile.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <link type="text/css" rel="stylesheet" href="assets/css/shop.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Profile</title>
</head>

<body>
    <script>
        function editProfile(){
            var em = document.getElementsByClassName("form-control")[0].value;
            var pass = document.getElementsByClassName("form-control")[1].value;
            var pn = document.getElementsByClassName("form-control")[2].value;
            var al = document.getElementsByClassName("form-control")[3].value;
            $.ajax({
                type: "POST",
                url: "services/profile-service.php",
                data: { 
                    email: em,
                    password: pass,
                    phone: pn,
                    avatar: al
                },
                success: function(data) {
                    if (data == "true"){
                        document.getElementById("msg").innerHTML = "Update successfully!";
                    } else {
                        document.getElementById("msg").innerHTML = "Update failed!";
                    }
                    showProfile();
                }  
            });
        }

        function showProfile(){
            $.ajax({
                    url: "services/profile-service.php",
                    success: function(data) {
                        
                        if (data == "false"){
                            location.href = "login.php";
                        } else {
                            var userInfo = JSON.parse(data);
                            document.getElementsByClassName("user-name")[0].innerHTML = userInfo.Username;
                            document.getElementsByClassName("user-email")[0].innerHTML = userInfo.Email;
                            console.log(userInfo.Avatar);
                            if (userInfo.Avatar != "")
                                document.getElementById("output").src = userInfo.Avatar;
                            else document.getElementById("output").src = "./assets/img/vegetables.png";

                            document.getElementsByClassName("form-control")[0].value = userInfo.Email;
                            document.getElementsByClassName("form-control")[1].value = userInfo.Password;
                            document.getElementsByClassName("form-control")[2].value = userInfo.PhoneNumber;
                            document.getElementsByClassName("form-control")[3].value = userInfo.Avatar;
                            if (userInfo.PermissionComment == 1 || userInfo.PermissionComment == "1")
                                document.getElementsByClassName("form-control")[4].value = "You have the permission to comment.";
                            else
                                document.getElementsByClassName("form-control")[4].value = "You do not have the permission to comment.";
                        }
                    }  
                });
        }
        showProfile();
    </script>
    <?php require_once("./views/header.php") ?>
    <div class="main">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="profile-pic">
                            <label class="-label" for="file">
                            </label>
                            <img src="./assets/img/vegetables.png" id="output" width="200" />
                        </div>
                        <p id="msg"></p> <span class="font-weight-bold user-name">UserName</span><span class="text-black-50 user-email">something@something.something</span>
                    </div>
                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email" value=""></div>
                            <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="password" value=""></div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                            <div class="col-md-12"><label class="labels">Avatar Link</label><input type="text" class="form-control" placeholder="enter your avatar link" value=""></div>
                            <div class="col-md-12"><label class="labels ">Right to comment</label><input class="form-control right-cmt" type="text" value="You do not have permission to comment" readonly></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button active " type="button" onclick="editProfile();">Save Profile</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php require_once("./views/canvas.php") ?>
    <script src="./assets/js/cart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>
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