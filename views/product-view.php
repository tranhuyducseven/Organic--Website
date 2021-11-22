<!-- product-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class ProductView{
  public function showAllProduct($products){
    $item = 1;
    foreach ($products as $product):
    echo '<div class="
            col-xl-4 col-sm-6 col-xl-offset-1 col-sm-offset-1 col-12
            organic-item-col
          ">
                    <div class="organic-card">
                        <div class="organic-item">
                            <div class="organic-item-front">
                                <img class="organic-item-front_img" src="'. $product['Image'] .'" alt="Product image" style="width: 100%" />
                                <div class="organic-item-front_text">
                                    <p class="organic-item-front_name">'. $product['Name'] .'</p>
                                    <p class="organic-item-front_price">$'. $product['Price'] .'Kg</p>
                                </div>
                            </div>
                            <div class="organic-item-back" style="
                  background-image: url("'. $product['Image'] .'");
                ">
                                <div class="organic-item-back_overlay">
                                    <div class="organic-item-back_text">
                                        <a class="organic-item-back_name" href="#">'. $product['Name'] .'</a
                    >
                    <p class="organic-item-back_price">$'. $product['Price'] .'Kg</p>
                  </div>
                  <div
                    class="
                      organic-item-buttons
                      d-flex
                      justify-content-center
                    "
                  >
                    <div class="organic-item-button">
                      <button
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#QuickView'. $product['ID'] .'"
                      >
                        <i class="far fa-eye"></i>
                      </button>
                    </div>
                    <div class="organic-item-button">
                      <button><i class="far fa-heart"></i></button>
                    </div>
                  </div>
                  <div
                    class="organic-item-add_to_cart justify-content-center"
                  >
                      <form method="post">
                        <button
                          type="button"
                          onclick="addToCart('. $product['ID'] .', 1);"
                        >
                          Add To Cart
                        </button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="QuickView'. $product['ID'] .'">
            <div
              class="
                organic-item-modal
                modal-dialog
                modal-dialog-centered
                modal-dialog-scrollable
                modal-lg
              "
            >
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div
                      class="
                        col-lg-6 col-sm-12 col-12
                        organic-item-modal-col_1
                      "
                    >
                      <img
                        class="organic-item-modal_img"
                        src="'. $product['Image'] .'"
                        alt="Product image"
                        style="width: 100%"
                      />
                    </div>

                    <div
                      class="
                        col-lg-6 col-sm-12 col-12
                        organic-item-modal-col_2
                      "
                    >
                      <div class="organic-item-modal_right">
                        <h2>'. $product['Name'] .'</h2>
                        <div class="organic-item-modal_rating">
                          <p class="organic-rating-stars">
                            <i class="material-icons">star_rate</i
                            ><i class="material-icons">star_rate</i
                            ><i class="material-icons">star_rate</i
                            ><i class="material-icons">star_rate</i
                            ><i class="material-icons">star_rate</i>
                          </p>
                          <p class="organic-rating-count">
                            (1 customer review)
                          </p>
                        </div>
                        <p class="organic-item-modal_price">$'. $product['Price'] .'Kg</p>
                        <p class="organic-item-modal_descr">'. $product['Description'] .'</p>
                        <form action="" method="post" class="d-flex">
                          <input
                            type="number"
                            class="organic-item-modal_qty"
                            name="qty"
                            value="1"
                            inputmode="numeric"
                          />
                          <button class="organic-item-modal_cart"
                          onclick="addToCart('. $product['ID'] .', '. -1 * $item .');"
                          >
                            ADD TO CART
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>';
        $item++;
    endforeach;
  }

    public function showAllProduct_homepage($products){
      foreach ($products as $product):
        echo '<div class="col m-3 p-cpn-item-3rd ">
                <div class="p-cpn-item-3rd-front ">
                    <img class="p-cpn-item-3rd-front__img " src="'. $product['Image'] .'" alt=" " />
                      <span class="p-cpn-item__break ">
                                <span></span>
                            </span>
                            <h1 class="p-cpn-item-3rd-front__name ">
                            '. $product['Name'] .'
                            </h1>
                            <h3 class="p-cpn-item-3rd-front__price ">
                                $'. $product['Price'] .'
                            </h3>
                        </div>
                        <div class="p-cpn-item-3rd-back " style="background-image: url("'. $product['Image'] .'"); ">
                            <div class="p-cpn-item-3rd-back__overlay ">
                                <div class="p-cpn-item-3rd__buttons-group ">
                                    <a class="p-cpn-item-3rd__button "><i class="far fa-eye p-cpn-item-3rd__button-icon "></i></a>
                                    <a class="p-cpn-item-3rd__button "><i class="far fa-heart p-cpn-item-3rd__button-icon "></i></a>
                                </div>
                                <h1 class="p-cpn-item-3rd-back__name ">
                                '. $product['Name'] .'
                                </h1>
                                <h3 class="p-cpn-item-3rd-back__price ">
                                    $'. $product['Price'] .'
                                </h3>
                                <a class="add-to-cart-btn " href="shop.php">Add To Cart</a>
                            </div>
                        </div>
          </div>';
      endforeach;
    }

    public function showOneProduct($product){
        echo $product['ID'];
        echo '<br>';
        echo $product['Image'];
        echo '<br>';
        echo $product['Name'];
        echo '<br>';
        echo $product['Price'];
        echo '<br>';
        echo $product['Description'];
        echo '<br>';
    }

    public function showAllProduct_adminpage($products){
        echo '<table style="border-collapse: collapse;width: 100%;">';
        echo '<tr>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">ID</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Image</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Price</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Description</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Hot</th>
        <th style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">Change information</th>
        </tr>';
        foreach ($products as $product):
            echo '<tr>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $product['ID'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $product['Image'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $product['Name'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $product['Price'] .'</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $product['Description'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $product['Hot'] . '</td>';
            echo '<td style = "border: 1px solid #dddddd; text-align: left; padding: 8px;">
                    <form method="post"> 
                        <p><button name="toggleHot" type="submit" value="' . $product['ID'] . '">Toggle Hot</button></p>
                        <p><button name="editInfo" type="submit" value="' . $product['ID'] . '">Edit</button></p>
                        <p><button name="deleteInfo" type="submit" value="' . $product['ID'] . '">Delete</button></p>
                    </form>
                  </td>';
            echo '</tr>';
        endforeach;
        echo '</table>';
    }

    public function showFormProduct_adminpage($action){
        if ($action == "addnew")
        {
            echo '<form method="post" action="">
            <p><input name="Image" type="text" placeholder="Image"></p>
            <p><input name="Name" type="text" placeholder="Name"></p>
            <p><input name="Price" type="text" placeholder="Price"></p>
            <p><input name="Description" type="text" placeholder="Description"></p>
            <p><button name="submit" type="submit"> Save </button> </p>
            </form>';
        }
        else if ($action == "edit")
        {
            echo '<form method="post" action="">
            <p><input name="Image" type="text" placeholder="Image" value="'. $_SESSION['Image'] .'"</p>
            <p><input name="Name" type="text" placeholder="Name" value="'. $_SESSION['Name'] .'"</p>
            <p><input name="Price" type="text" placeholder="Price" value="'. $_SESSION['Price'] .'"</p>
            <p><input name="Description" type="text" placeholder="Description" value="'. $_SESSION['Description'] .'"</p>
            <p><button name="submit" type="submit"> Save </button> </p>
            </form>';
        }
    }

    public function alertResultPopUp($ctrl, $result) {
        if ($result == true)
        {
            echo '<script>
                    var result = confirm("Successfully");
                    if (result)
                        location.href = "admin.php?ctrl='. $ctrl .'";
                    else
                        location.href = "admin.php?ctrl='. $ctrl .'";
                  </script>';
        }
        else
        {
            echo '<script>
                    alert("Failed");
                  </script>';
        }
    }

    public function showCartModal($products)
    {
        foreach ($products as $product):
        /*
            echo $product['ID'];
            echo '<br>';
            echo $product['Image'];
            echo '<br>';
            echo $product['Name'];
            echo '<br>';
            echo $product['Price'];
            echo '<br>';
            echo $product['Description'];
            echo '<br>';
        */
          echo '<li class="d-flex">
                  <div class="organic-shopping-product_img">
                      <img src="'. $product['Image'] .'" />
                  </div>
                  <div class="organic-shopping-product_text">
                      <h3>'. $product['Name'] .'</h3>
                      <span>'. $product['quantity'] .' &#215; $'. $product['Price'] .'Kg</span>
                  </div>
                  <div class="organic-shopping-product_remove">
                      <button type="button"> 
                        <i class="material-icons">highlight_off</i>
                      </button>
                  </div>
                </li>';
        endforeach;
    }
}

?>