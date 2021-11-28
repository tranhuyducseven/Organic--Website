<div id="#toast" class="container-fluid -toast"></div>
<footer class="container-fluid">
        <div class="organic-footer-content row">
            <div class="col-xl-4 col-md-6 col-12">
                <div class="organic-footer-col">
                    <div class="organic-footer-logo">
                        <a href="#"><img src="./assets/img/logo.png" /></a>
                    </div>
                    <p class="organic-footer-paragraph">
                        Orgus is a project made by HCMUT students.
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
                            <a href="./#2">Our Projects</a>
                        </li>
                        <li>
                            <a href="./#5">Orgus Farmers</a>
                        </li>
                        <li>
                            <a href="./#1">About Us</a>
                        </li>
                        <li>
                            <a href="./#8">Upcoming Events</a>
                        </li>
                        <li>
                            <a href="shop.php">Our Shop</a>
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
                        <?php
                            require_once("controllers/product-controller.php");
                            $productController = new ProductController;
                            $productController->showTagFooter();
                        ?>
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
                        <?php 
                            require_once("controllers/contact-controller.php");
                            $contactController = new ContactController;
                            $contactController->showTopContact_footer();
                        ?>
                        <li>
                            <p class="contact_info">Website:</p>
                            <a target="blank" href="http://www.organic.lovestoblog.com/">www.organic.lovestoblog.com</a>
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
                        <span>Dejavu</span>
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