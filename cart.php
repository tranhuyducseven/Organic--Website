<?php session_start(); ?>

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/vegetables.png" />
    <link type="text/css" rel="stylesheet" href="assets/css/base.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/cart.css" />
    <title>Organic - Cart</title>
</head>

<body>
    <script>
    
      function showCart_cartpage()
      {
        $.ajax({
            url: "services/product-service.php",
            success: function(data) {
                var output = '<tr>'+
                        '<th>NO.</th>'+
                        '<th>PRODUCT</th>'+
                        '<th>PRICE</th>'+
                        '<th>QUANTITY</th>'+
                        '<th></th>'+
                        '</tr>';
                if (data == "false"){
                    output +=   '<tr>'+
                                    '<td colspan="4" style = "border: 1px solid #dddddd; text-align: left; padding: 8px; text-align: center; width: 100%">'+
                                        'Your cart is empty'+
                                    '</td>'+
                                '</tr>';
                    document.getElementsByClassName("cart-table")[0].innerHTML = output;
                    return;
                }
                var cartInfo = JSON.parse(data);
                
                var numList = 0;
                var totalPrice = 0;
                for (var key in cartInfo) {
                    output += '<tr>'+
                                '<td class="cart-col-No">'+(numList+1)+'</td>' +
                                '<td class="d-flex cart-col-product">'+
                                    '<img src="'+ cartInfo[key].Image +'">'+
                                    '<p>'+ cartInfo[key].Name +'</p>'+
                                '</td>'+
                                '<td class="cart-col-price">$'+ cartInfo[key].Price +'</td>'+
                                '<td class="cart-col-quantity">'+ cartInfo[key].quantity +'</td>'+
                                '<td class="cart-col-remove">'+
                                    '<button class="cart-col-remove-large_screen" onclick="removetoCart_cartpage('+ cartInfo[key].ID +');">REMOVE</button>'+
                                    '<button type="button" class="cart-col-remove-small_screen" style="display: none">'+
                                        '<i class="material-icons">highlight_off</i>'+
                                    '</button>'+
                                '</td>'+
                            '</tr>';
                    numList++;
                    totalPrice += ((parseFloat(cartInfo[key].Price) * 100) * parseInt(cartInfo[key].quantity) / 100);
                }
                if (numList == 0)
                {
                    output +=   '<tr>'+
                                    '<td colspan="4" style = "border: 1px solid #dddddd; text-align: left; padding: 8px; text-align: center; width: 100%">'+
                                        'Your cart is empty'+
                                    '</td>'+
                                '</tr>';
                }
                document.getElementsByClassName("cart-table")[0].innerHTML = output;
                document.getElementsByClassName("cart-total-price")[0].innerHTML = "Total: $" + totalPrice.toFixed(2);
            }  
        });
      }

      function removetoCart_cartpage(id)
      {
        $.ajax({
            type: "POST",
            url: "services/product-service.php",
            data: { 
              idDel: id 
            },
            success: function(data) {
                showCart_cartpage();
            }  
        });
      }
      
      function payment(){
        var tmp = document.getElementsByClassName("cart-col-No");
        var userpanel = document.getElementsByClassName("rightnav__item-login-logout");
        if (userpanel.length != 0){
            alert("Please login before checkout!");
            location.href = "login.php";
        }
        else {
            if (tmp.length > 0){
                var res = confirm("Do you want to pay?")
                if (res){
                    $.ajax({
                        type: "POST",
                        url: "services/product-service.php",
                        data: { 
                            idPay: 1
                        },
                        success: function(data) {
                            alert("Payment successfully!");
                            location.href = "index.php";
                            showCart_cartpage();
                        }  
                    });
                }
            }
            else alert("Your cart is empty!");
        }
      }

    showCart_cartpage();

    </script>
    <?php require_once("./views/header.php") ?>
    <div class="main">
        <div class="page-title pd-150-0" style="      background-image: url('./assets/img/bgr-title-page.jpg');">
            <div class="grid wide-m">
                <div class="container-fluid">
                    <div class="page-title-inner">
                        <h1 class="page-title__name">Cart</h1>
                        <div class="page-title__dir">
                            <ul class="page-title__dir-list">
                                <li class="page-title__dir-item">
                                    <a href="./index.php" class="page-title__dir-link">Home</a>
                                </li>
                                <span> - </span>
                                <li class="page-title__dir-item">Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main cart -->
        <div class="container content-container">
            <div class="cart-container">
                <h1 class="text-center cart-heading">Your Cart <i class="fas fa-shopping-cart"></i></h1>
                <table class="cart-table">
                </table>
                <div class="cart-total">
                    <p class="cart-total-price"></p>
                    <p class="cart-btn-group">
                        <a href="shop.php">BROWSE SHOP</a>
                        <a onclick="payment();">CHECKOUT</a>
                    </p>
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
    <script src="assets/js/select.js"></script>
    <script src="./assets/js/cart.js"></script>
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