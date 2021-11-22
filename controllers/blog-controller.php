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
}

?>