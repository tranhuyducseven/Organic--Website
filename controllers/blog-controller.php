<?php

class BlogController {
    public function InitBlogController(){
        require_once('models/blog-model.php');           
        require_once('views/blog-view.php');
    }

    public function getAllBlog(){
        $this->InitBlogController();
      
        $blogModel = new BlogModel();
        $blogs = $blogModel->getAllBlog();
        
        $blogView = new BlogView();
        $blogView->showAllBlog($blogs);
    }

    public function getOneBlog($id){
        $this->InitBlogController();
        
        $blogModel = new BlogModel();
        $blog = $blogModel->getOneBlog($id);

        $blogView = new BlogView();
        $blogView->showOneBlog($blog);
    }

    public function getAllBlog_homepage(){
        $this->InitBlogController();
        
        $blogModel = new BlogModel();
        $blogs = $blogModel->getAllBlog_homepage();

        $blogView = new BlogView();
        $blogView->getAllBlog_homepage($blogs);
    }

    public function countProductNumber() {
        $this->InitBlogController();

        $blogModel = new BlogModel();
        $numOfProduct = $blogModel->countProductNumber();

        return $numOfProduct;
    }

    public function getAllBlog_userpage($numPage){
        $this->InitBlogController();
        $blogModel = new BlogModel();
        if (isset($_GET['search'])) {
            $blogs = $blogModel->search($_GET['search']);
        }
        else if (isset($_GET['tag'])){
            $blogs = $blogModel->tag($_GET['tag']);
        }
        else $blogs = $blogModel->getAllBlog_userpage($numPage);

        $blogView = new BlogView();
        $blogView->showAllBlog($blogs);
    }

    public function showTag(){
        $this->InitBlogController();
        $blogModel = new BlogModel();
        $blogView = new BlogView();
        $tags = $blogModel->getAllTag();
        
        $blogView->showAllTag($tags);
    }
}

?>