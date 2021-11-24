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
                    if (historyInfo['Avatar'] == "")
                        historyInfo['Avatar'] = "./assets/img/vegetables.png";
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