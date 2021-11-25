<!-- product-view.php sẽ render ra phần lõi nội dung, frontend sẽ sửa thêm phần này -->

<?php

class ProductView{
  public function showAllProduct($products){
    $item = 1;
    foreach ($products as $product):
    echo '<div class="
            col-xl-4 col-sm-6  col-12
            organic-item-col
          ">
                    <div class="organic-card">
                        <div class="organic-item">
                            <div class="organic-item-front">
                                <img class="organic-item-front_img" src="'. $product['Image'] .'" alt="Product image" style="width: 100%" />
                                <div class="organic-item-front_text">
                                    <p class="organic-item-front_name">'. $product['Name'] .'</p>
                                    <p class="organic-item-front_price">$'. $product['Price'] .' Kg</p>
                                </div>
                            </div>
                            <div class="organic-item-back" style="
                  background-image: url('. $product["Image"] .');
                ">
                                <div class="organic-item-back_overlay">
                                    <div class="organic-item-back_text">
                                        <a class="organic-item-back_name" href="#">'. $product['Name'] .'</a
                    >
                    <p class="organic-item-back_price">$'. $product['Price'] .' Kg</p>
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
                        <p class="organic-item-modal_price">$'. $product['Price'] .' Kg</p>
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
              <div class="p-cpn-item-3rd-back " style="background-image: url('. $product["Image"] .');">
                  <div class="p-cpn-item-3rd-back__overlay ">
                      <div class="p-cpn-item-3rd__buttons-group">
                          <a class="p-cpn-item-3rd__button "><i class="far fa-eye p-cpn-item-3rd__button-icon "></i></a>
                          <a class="p-cpn-item-3rd__button "><i class="far fa-heart p-cpn-item-3rd__button-icon "></i></a>
                      </div>
                      <h1 class="p-cpn-item-3rd-back__name ">
                      '. $product['Name'] .'
                      </h1>
                      <h3 class="p-cpn-item-3rd-back__price ">
                          $'. $product['Price'] .'
                      </h3>
                      <a class="add-to-cart-btn " href="# ">Add To Cart</a>
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
        $output = "";
        $output .= '<h1 class="admin-view-product">View Product <i class="far fa-eye"></i></h1>;
                      <table>
                        <tr>
                          <th>ID</th>
                          <th>IMAGE</th>
                          <th>NAME</th>
                          <th>PRICE</th>
                          <th>DESCRIPTION</th>
                          <th>HOT</th>
                          <th>TAG</th>
                          <th>OPERATION</th>
                        </tr>';
        foreach ($products as $product):
            $output .= '<tr>
                          <td class="admin-product-ID">' . $product['ID'] . '</td>
                          <td class="admin-product-img">
                              <img src="' . $product['Image'] . '" alt="">
                          </td>
                          <td class="admin-product-name">'. $product['Name'] . '</td>
                          <td class="admin-product-price">'. $product['Price'] .'</td>
                          <td class="admin-product-descr">' . $product['Description'] . '</td>
                          <td class="admin-product-hot">' . (($product['Hot'] == 1)? "HOT": "UNHOT") . '</td>
                          <td class="admin-product-tag">' . $product['Tag'] . '</td>
                          <td>
                                  <form method="post" class="admin-product-btn-group"> 
                                      <button name="toggleHot" type="submit" value="' . $product['ID'] . '">TOGGLE HOT</button>
                                      <button name="editInfo" type="submit" value="' . $product['ID'] . '">EDIT</button>
                                      <button name="deleteInfo" type="submit" value="' . $product['ID'] . '">DELETE</button>
                                  </form>
                                </td>
                        </tr>';
        endforeach;
        $output .=    '</table>';
        return $output;
    }

    public function showFormProduct_adminpage($action){
        $output = "";
        if ($action == "addnew")
        {
            $output .= '<h1 class="admin-add-product">Add Product <i class="material-icons">library_add</i></h1>
                          <form method="post" action="" class="add-product-form">
                          <div class="add-product-info row">
                            <label for="add-product-img" class="col-3">IMAGE LINK</label>
                            <input id="add-product-img" class="col-9" name="Image" type="url">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-name" class="col-3">NAME</label>
                            <input id="add-product-name" class="col-9" name="Name" type="text">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-price" class="col-3">PRICE</label>
                            <input id="add-product-price" class="col-9" name="Price" type="number" step="any" min="0">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-tag" class="col-3">TAG</label>
                            <input id="add-product-tag" class="col-9" name="Tag">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-descr" class="col-3">DESCRIPTION</label>
                            <textarea id="add-product-descr" class="col-9" name="Description"></textarea>
                          </div>
                          <div class="add-product-info row">
                            <button class="offset-3" name="submit" type="submit">SAVE</button>
                          </div>
                        </form>';
        }
        else if ($action == "edit")
        {
            $output .= '<h1 class="admin-add-product">Edit Product <i class="fas fa-edit edit-icon"></i></h1>
                        <form method="post" action="" class="add-product-form">
                          <div class="add-product-info row">
                            <label for="add-product-img" class="col-3">IMAGE LINK</label>
                            <input id="add-product-img" class="col-9" name="Image" type="url" value="'. $_SESSION['Image'] .'">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-name" class="col-3">NAME</label>
                            <input id="add-product-name" class="col-9" name="Name" type="text" value="'. $_SESSION['Name'] .'">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-price" class="col-3">PRICE</label>
                            <input id="add-product-price" class="col-9" name="Price" type="number" step="any" min="0" value="'. $_SESSION['Price'] .'">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-tag" class="col-3">TAG</label>
                            <input id="add-product-tag" class="col-9" name="Tag" value="'. $_SESSION['Tag'] .'">
                          </div>
                          <div class="add-product-info row">
                            <label for="add-product-descr" class="col-3">DESCRIPTION</label>
                            <textarea id="add-product-descr" class="col-9" name="Description">'. $_SESSION['Description'] .'</textarea>
                          </div>
                          <div class="add-product-info row">
                            <button class="offset-3" name="submit" type="submit">SAVE</button>
                          </div>
                        </form>';
        }
        return $output;
    }

    public function alertResultPopUp($ctrl, $result) {
        $output = "";
        if ($result == true)
        {
            $output .= '<script>
                          var result = confirm("Successfully");
                          if (result)
                              location.href = "admin.php?ctrl='. $ctrl .'";
                          else
                              location.href = "admin.php?ctrl='. $ctrl .'";
                        </script>';
        }
        else
        {
            $output .= '<script>
                          alert("Failed");
                        </script>';
        }
        return $output;
    }

    public function showCartModal($products)
    {
        foreach ($products as $product):
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

    public function showAllTag($tags){
      foreach ($tags as $tag):
        echo '<a class="tag-cloud" href="shop.php?tag='. $tag .'">'. $tag .'</a>';
      endforeach;
    }

    public function showTagFooter($tags){
      foreach ($tags as $tag):
        echo '<li>
                <a href="shop.php?tag='. $tag .'">'. $tag .'</a>
            </li>';
      endforeach;
    }
}

?>