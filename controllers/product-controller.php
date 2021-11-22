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

    public function getAllProduct_userpage($numPage){
        $this->InitProductController();
        $productModel = new ProductModel();
        if (isset($_GET['search'])) {
            $products = $productModel->search($_GET['search']);
        }
        else $products = $productModel->getAllProduct_userpage($numPage);

        $productView = new ProductView();
        $productView->showAllProduct($products);
    }

    public function getAllProduct_homepage(){
        $this->InitProductController();
        $productModel = new ProductModel();
        $products = $productModel->getAllProduct_homepage();
        
        $productView = new ProductView();
        $productView->showAllProduct_homepage($products);
    }
}

?>