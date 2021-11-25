<?php

class ProductController {
    public function InitProductController(){
        require_once('models/product-model.php');  
        require_once('views/product-view.php');
    }

    public function getAllProduct(){
        $this->InitProductController();

        $productModel = new ProductModel();
        $products = $productModel->getAllProduct();
        
        $productView = new ProductView();
        $productView->showAllProduct($products);
    }

    public function getOneProduct($id){
        $this->InitProductController();

        $productModel = new ProductModel();
        $product = $productModel->getOneProduct($id);

        $productView = new ProductView();
        $productView->showOneProduct($product);
    }

    public function countProductNumber() {
        $this->InitProductController();

        $productModel = new ProductModel();
        $numOfProduct = $productModel->countProductNumber();

        return $numOfProduct;
    }

    public function getAllProduct_userpage($numPage, $show){
        $this->InitProductController();
        $productModel = new ProductModel();
        if (isset($_GET['search'])) {
            $products = $productModel->search($_GET['search']);
        }
        else if (isset($_GET['tag'])){
            $products = $productModel->tag($_GET['tag']);
        }
        else $products = $productModel->getAllProduct_userpage($numPage);
        
        if ($show == 1){
            $productView = new ProductView();
            $productView->showAllProduct($products);
        }
        else return sizeof($products);
    }

    public function getAllProduct_homepage(){
        $this->InitProductController();
        $productModel = new ProductModel();
        $products = $productModel->getAllProduct_homepage();
        
        $productView = new ProductView();
        $productView->showAllProduct_homepage($products);
    }

    public function addtoCart($id, $quantity)
    {
        require_once('../models/product-model.php');  
        require_once('../views/product-view.php');
        $productModel = new ProductModel();
        $productView = new ProductView();
            
        $product = $productModel->getOneProduct($id);

        if(!empty($_SESSION['cartInfo']))
        {    
            //and if session cart same 
            if (isset($_SESSION['cartInfo'][$id]) == $id) {
                $_SESSION['cartInfo'][$id]['quantity'] += $quantity;
            } else { 
                //if not same put new storing
                $_SESSION['cartInfo'][$id] = array("Image" => $product['Image'], "Name" => $product['Name'], "Price" => $product['Price'], "ID" => $product['ID'], "quantity" => $quantity);
            }
        } else  {
            $_SESSION['cartInfo'] = array();
            $_SESSION['cartInfo'][$id] = array("Image" => $product['Image'], "Name" => $product['Name'], "Price" => $product['Price'], "ID" => $product['ID'], "quantity" => $quantity);
        }
    }

    public function removeToCart($id)
    {
        require_once('../models/product-model.php');  
        require_once('../views/product-view.php');
        $productModel = new ProductModel();
        $productView = new ProductView();

        if(!empty($_SESSION['cartInfo']))
        {    
            unset($_SESSION['cartInfo'][$id]);
        } 
    }

    public function showTag(){
        $this->InitProductController();
        $productModel = new ProductModel();
        $productView = new ProductView();
        $tags = $productModel->getAllTag();
        
        $productView->showAllTag($tags);
    }

    public function showTagFooter(){
        $this->InitProductController();
        $productModel = new ProductModel();
        $productView = new ProductView();
        $tags = $productModel->getAllTag();

        $productView->showTagFooter($tags);
    }
}

?>