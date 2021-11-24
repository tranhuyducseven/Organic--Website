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
    <link rel="stylesheet" href="./assets/css/order.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Organic - Purchase order</title>
</head>

<body>
    <script>
        function display(){
            $.ajax({
                url: "services/order-service.php",
                success: function(data) {
                    var historyInfo = JSON.parse(data);
                    document.getElementsByClassName("user-name")[0].innerHTML = historyInfo['Username'];
                    document.getElementsByClassName("user-email")[0].innerHTML = historyInfo['Email'];
                    document.getElementById("output").src = historyInfo['Avatar'];
                    var output = "";
                    var cnt = 1;
                    for (var key in historyInfo['history']) {
                        output += '<tr>'+
                                    '<th scope="row">'+ cnt +'</th>'+
                                    '<td class="data-cell"><span>'+ historyInfo['history'][key].Name_product +'</span></td>'+
                                    '<td class="data-cell"><img src="'+ historyInfo['history'][key].Image +'" alt=""></td>'+
                                    '<td class="data-cell"> <span>$'+ historyInfo['history'][key].Price +'</span></td>'+
                                    '<td class="data-cell"><span>'+ historyInfo['history'][key].Quantity +'</span></td>'+
                                    '<td class="data-cell"><span>$'+ historyInfo['history'][key].Total +'</span></td>'+
                                    '<td class="data-cell"><span>'+ historyInfo['history'][key].Day +'</span></td>'+
                                '</tr>';
                        cnt++;
                    }
                    document.getElementById("chovaoday").innerHTML = output;
                    document.getElementsByClassName("order-counter")[0].innerHTML = cnt-1;
                }  
            });
        }
        display();
    </script>
    <?php require_once("./views/header.php") ?>
    <div class="main">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="profile-pic">
                            <img src="" id="output" width="200" />
                        </div>
                        <br>
                        <div class="profile-text">
                            <span class="font-weight-bold user-name">Tran Huy Duc </span>
                            <br>
                            <span class="text-black-50 user-email">huyduc@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Purchase order (<span class="order-counter">0</span>)</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-ssm-12 col-md-12">
                                <!--#####Load table####-->
                                <div id="load-data">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col"><span>NO</span></th>
                                                <th scope="col"><span>NAME</span></th>
                                                <th scope="col"><span>PRODUCT</span></th>
                                                <th scope="col"><span>PRICE</span></th>
                                                <th scope="col"><span>QUANTITY</span></th>
                                                <th scope="col"><span>TOTAL</span></th>
                                                <th scope="col"><span>DAY</span></th>
                                            </tr>
                                        </thead>
                                        <tbody id="chovaoday">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid ">
        <div class="organic-footer-content row ">
            <div class="col-xl-4 col-md-6 col-12 ">
                <div class="organic-footer-col ">
                    <div class="organic-footer-logo ">
                        <a href="# "><img src="./assets/img/logo.png " /></a>
                    </div>
                    <p class="organic-footer-paragraph ">
                        Take a moment to enjoy in our all time favorite and the bestseller in its inche Craft Beer, a WordPress theme for you<br /><br /> Orgus is a clean and modern WordPress theme designed specifically for industry
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12 ">
                <div class="organic-footer-col ">
                    <div class="organic-footer-heading ">
                        <h3 class="organic-footer-heading_text ">Quick Links</h3>
                        <span class="organic-footer-heading_icon ">
                            <span></span>
                        </span>
                    </div>
                    <ul class="organic-footer-list_quick ">
                        <li>
                            <a href="# ">Our Projects</a>
                        </li>
                        <li>
                            <a href="# ">Orgus Farmers</a>
                        </li>
                        <li>
                            <a href="# ">About Us</a>
                        </li>
                        <li>
                            <a href="# ">Upcoming Events</a>
                        </li>
                        <li>
                            <a href="# ">Our Services</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12 ">
                <div class="organic-footer-col ">
                    <div class="organic-footer-heading ">
                        <h3 class="organic-footer-heading_text ">Products</h3>
                        <span class="organic-footer-heading_icon ">
                            <span></span>
                        </span>
                    </div>
                    <ul class="organic-footer-list_product ">
                        <li>
                            <a href="# ">Organic Fruits</a>
                        </li>
                        <li>
                            <a href="# ">Fresh Vegetables</a>
                        </li>
                        <li>
                            <a href="# ">Fresh Meats</a>
                        </li>
                        <li>
                            <a href="# ">Other Products</a>
                        </li>
                        <li>
                            <a href="# ">Organic Foods</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-12 ">
                <div class="organic-footer-col ">
                    <div class="organic-footer-heading ">
                        <h3 class="organic-footer-heading_text ">Contact</h3>
                        <span class="organic-footer-heading_icon ">
                            <span></span>
                        </span>
                    </div>
                    <ul class="organic-footer-list_contact ">
                        <li>
                            <p class="contact_info ">Phone:</p>
                            <a href="# ">+ 00 568 945 679</a>
                        </li>
                        <li>
                            <p class="contact_info ">Email:</p>
                            <a href="# ">orgus@gmail.com</a>
                        </li>
                        <li>
                            <p class="contact_info ">Website:</p>
                            <a href="# ">www.orgusinfo.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="organic-footer-further row ">
            <div class="col-xl-6 col-md-6 col-12 ">
                <div class="organic-footer-col_bottom ">
                    <p>
                        <span>Orgus</span> - Copyright 2021. With love by
                        <span>CMSSuperHeros</span>
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-12 ">
                <div class="organic-footer-col_bottom ">
                    <ul>
                        <li>
                            <a href="# ">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="# ">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="# ">Setting & Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
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